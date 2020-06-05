<?php 
// connect to database
    $conn = mysqli_connect('localhost', 'dan', 'olaleye97', 'pizzaapp');
    if(!$conn) {
        echo "Connection error: " . mysqli_connect_error();
    }

?>