<?php 
    require('./config/dbconnect.php');

    // Write query for all pizzzas
    // Selects all
    // $sql = 'SELECT * FROM pizzas'
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';
    // Make query and get results
    $result = mysqli_query($conn, $sql);
    // Fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

    // explode(',', $pizzas[0]['ingredients']);
    // print_r($pizzas)
?> 


<!DOCTYPE html>
<html lang="en">
    <?php include './templates/header.php' ?>
    <h4 class="center grey-text">Pizzas!</h4>
    <div class="container">
        <div class="row">
            <?php  foreach($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-dept-0">
                    <img src="./images/pizza.svg" class="pizza" alt="Pizza">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <!-- <ul> -->
                             <?php 
                                // $ingredients = explode(",", $pizza['ingredients']); 
                             ?>
                             <?php 
                                // foreach($ingredients as $ingredient) {    
                             ?>
                                <!-- <li> -->
                                <?php 
                                    // echo htmlspecialchars($ingredient); 
                                ?>
                                <!-- </li> -->
                             <?php 
                                // }
                             ?>
                            <!-- </ul> -->
                            <div>
                                <?php 
                                    echo htmlspecialchars($pizza['ingredients']);
                                ?>
                            </div>
                        </div>
                        <div class="card-action right-align">
                            <a href="singlepizza.php?id=<?php echo$pizza['id']; ?>" class="brand-text">More Info</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <?php include('./templates/footer.php') ?>
</html>