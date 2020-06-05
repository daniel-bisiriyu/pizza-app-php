<?php 
    require('./config/dbconnect.php');
    // First checks if the form has been submitted and then Checks if we have received data
    // if (isset($_GET['submit'])) {
    //     echo $_GET['email'];
    //     echo $_GET['title'];
    //     echo $_GET['ingredients'];
    // }
    $email = $title = $ingredients = '';
    $form_errors = ['email'=>'', 'title'=>'', 'ingredients'=>''];
    // HTMLSPECIALCHARS PREVENTS XSS Attacks
    if (isset($_POST['submit'])) {
        // echo htmlspecialchars($_POST['email']);
        // echo htmlspecialchars($_POST['title']);
        // echo htmlspecialchars($_POST['ingredients']);
        
        // Check for form values
        if (empty($_POST['email'])) {
            $form_errors['email'] =  "An email is required <br />";
        } else {
            $email = $_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $form_errors['email'] = "Please enter a valid email address";
            }
            // echo htmlspecialchars($_POST['email']);
        }
        if (empty($_POST['title'])) {
            $form_errors['title'] =  "A title is required <br />";
        } else {
            // echo htmlspecialchars($_POST['title']);
            $title = $_POST['title'];
            if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
                $form_errors['title'] = "Title must be letters and spaces only <br />";
            }
        }
        if (empty($_POST['ingredients'])) {
            $form_errors['ingredients'] =  "At least one ingredient is required <br />";
        } else {
            // echo htmlspecialchars($_POST['ingredients']);
            $ingredients = $_POST['ingredients'];
            if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
                $form_errors['ingredients'] = "Ingredients must be a comma seperated list";
            }
        }
        // Cycles through the array and removes all elements that return false
        // So it basically removes all empty variables
        // If all the fields are empty, it returns an empty array that evaluates to false meaning that there is n error
        if (!array_filter($form_errors)) {
            // Prevent SQLInjection
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
            
            // Create sql
            $sql = "INSERT INTO pizzas(title, email, ingredients) VALUES('$title', '$email', '$ingredients')";
            // Save to db and check
            if(mysqli_query($conn, $sql)) {
                // success
                header('Location: index.php');
            } else {
                // error
                echo "Query error: " . mysqli_error($conn);
            }
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <?php include './templates/header.php' ?>

    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="white">
            <label>Your Email:</label>
            <input type="text" name="email" value="<?php  echo htmlspecialchars($email)?>">
            <p class="red-text"><?php echo $form_errors['email']; ?></p>
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php  echo htmlspecialchars($title)?>">
            <p class="red-text"><?php echo $form_errors['title']; ?></p>
            <label>Ingredients (comma, seperated):</label>
            <input type="text" name="ingredients" value="<?php  echo $ingredients?>">
            <p class="red-text"><?php echo $form_errors['ingredients']; ?></p>
            <div class="center">
                <input type="submit" name="submit" class="btn brand z-depth-0">
            </div>
        </form>
    </section>
    <!-- <form class="container pizza-form" action="newpizzaform.php" method="GET">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Pizza name</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="name" placeholder="pizza name">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Ingredients</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="ingredients" placeholder="pizza name">
        </div>
        <div class="form-check">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            Check me out
            </label>
        </div>
        <input type="submit" name="submit" class="btn btn-md btn-warning text-center">
    </form> -->

    <?php include('./templates/footer.php') ?>
</html>