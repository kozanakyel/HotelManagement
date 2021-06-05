<?php
ob_start();
session_start();
include 'setting/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Mazarin Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/f85b28bbc8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>

<nav class="navbar navbar-expand-lg">
  <a class="navbar-brand" href="homePage.php" style="color:white; font-size:36px; font-weight:bold;">KOZAN HOTEL</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars" style="color:white;"></i></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="homePage.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactPage.php">Contact</a>
      </li>
      <?php if (isset($_SESSION['clientemail'])){?>
      <li class="nav-item">
        <a class="nav-link" href="userPage.php"><?php echo $_SESSION['clientname'] . "   " . $_SESSION['clientsurname']; ?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>
      <?php } else{ ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="signin.php">Signin</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
