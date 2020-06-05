<?php 
    if (isset($_POST['submit'])) {

        // first arg = name, 2nd arg = value, 3rd = cookie expiration
        setcookie('gender', $_POST['gender'], time() + 86400)

        session_start();

        $_SESSION['name'] = $_POST['name'];

        header('Location: index.php')
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandbox</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="text" name="name" >
        <select name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <input type="submit" value="Submit" name="submit">
    </form>
    
</body>
</html>