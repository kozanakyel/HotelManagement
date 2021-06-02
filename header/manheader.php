<?php
ob_start();
session_start();
include '../setting/connection.php';

$s_ask=$conn->prepare("SELECT * FROM staff where staffid=?");
$s_ask->execute(array(
  $_SESSION['staffid']
));
$countstaff = $s_ask->rowCount();
$s_fetch = $s_ask->fetch(PDO::FETCH_ASSOC);

if ($countstaff == 0) {
  Header("Location:../management/loginmng.php?status=unauthlog");
}
/*
if (!isset($_SESSION['staffid'])) {
  // code...
}
*/

?>

<html lang="en">

<head>
  <title>Mazarin Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/f85b28bbc8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
  </script>


</head>

<body class="manage-page">
  <div class="d-flex">
    <div id="sidebar-container">
      <div class="logo">
        <h4 class="text-light font-weight-bold">Kozan Hotel</h4>
      </div>
      <div class="menu">
        <div class="container">
          <h6 class="text-light font-weight-bold">Staff: <?php echo $s_fetch['staffname'] . " " . $s_fetch['staffsurname']; ?></h6>
        </div>
        <a href="rooms.php" class="d-block text-light p-3"><i class="fas fa-person-booth mr-2"></i>Rooms</a>
        <a href="notification.php" class="d-block text-light p-3"><i class="fas fa-calendar-week mr-2"></i>Notification</a>

        <a href="reservation.php" class="d-block text-light p-3"><i class="fas fa-book-open mr-2"></i>Reservation</a>
        <a href="reports.php" class="d-block text-light p-3"><i class="fas fa-flag mr-2"></i>Reports</a>

        <?php
          if ($s_fetch['position']  == "manager") {
            echo "<a href='staffinfo.php' class='d-block text-light p-3'><i class='fas fa-pump-soap mr-2'></i>Staff Info</a>";
          }
        ?>
        <!--<a href="staffinfo.php" class="d-block text-light p-3"><i class="fas fa-pump-soap mr-2"></i>Staff Info</a>-->
        <a href="mlogout.php" class="d-block text-light p-3"><i class="fas fa-user-lock" style="margin-right:5px;"></i>Log Out</a>
      </div>
    </div>



    <div class="container w-100">

      <!-- for the dropdown menu-->
