<?php 
    require('./config/dbconnect.php');
    if (isset($_POST['delete'])) {
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

        if (mysqli_query($conn, $sql)) {
            // succcess
            header('Location: index.php');
        } else {
            // error
            echo "Query error: " . mysqli_error($conn);
        }
    }

    if(isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        
        // make sql
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        // get the query result
        $result = mysqli_query($conn, $sql);
        // if ($result) {
        // Fetch result in array format
        $pizza = mysqli_fetch_assoc($result);

        // close connection
        mysqli_free_result($result);
        mysqli_close($conn);
        // }
        

    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <?php include './templates/header.php' ?>
    <div class="container center grey-text">
        <?php if ($pizza): ?>
            <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars($pizza['email']); ?></p>
            <p><?php echo htmlspecialchars($pizza['created_at']); ?></p>
            <h5>Ingredients:</h5>
            <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>

            <!-- Delete form -->
            <form action="singlepizza.php" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo htmlspecialchars($pizza['id']); ?>">
                <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
            </form>
        <?php else: ?>
            <h1>No Pizza Found</h1>
            <button class="btn brand z-depth-0">
                <a href="index.php">Back To Home!</a>
            </button>
        <?php endif; ?>
    </div>

    <?php include('./templates/footer.php') ?>
</html>