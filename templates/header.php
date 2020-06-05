<?php 
  session_start();
  if($_SERVER['QUERY_STRING'] == 'noname') {
    // Unset ont thing
    unset($_SESSION['name']);
    // unset all
    session_unset();
  }  
  // Null coalescing
  $gender = $_COOKIE['gender'] ?? 'Unknown';
  $name = $_SESSION['name'] ?? 'Guest';

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pizza App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <style>
      .pizza-form {
        width: 600px;
        margin: 20px auto;
        padding: 10px;
      }
      .brand {
        background: #cbb09c !important;
      }
      .brand-text {
        color: #cbb09c !important;
      }
      form {
        max-width: 460px;
        margin: 20px auto;
        padding: 20px;
      }
      .pizza {
        width: 100px;
        margin: 40px auto -30px;
        display: block;
        position: relative;
        top: -30px;
      }
    </style>
</head>

<body class="grey lighten-4"> 
  <nav class="white z-depth-0">
    <div class="container">
      <a href="index.php" class="left brand-logo brand-text">Kung Fu Pizzas</a>
      <ul id="nav-mobile" class="right hide-on-smal-and-down">
        <li>Hello, <?php echo htmlspecialchars($name) ?></li>
        <li>(<?php echo $gender ?>)</li>
        <li><a href="newpizzaform.php" class="btn brand z-depth-0">Add a Pizza</a></li>
      </ul>
    </div>
  </nav>
    <!-- <nav class="navbar navbar-expand-lg navbar-light container">
        <a class="navbar-brand" href="#">Pizzas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link btn btn-lg btn-warning" href="#"> Add Pizza <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav> -->