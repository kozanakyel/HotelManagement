<?php
ob_start();
session_start();
  include 'connection.php';
  //$hes = 2012;
  //echo md5($hes);

  if (isset($_POST['log_staff'])) {
    $s_id = $_POST['sid'];
    $s_password = md5($_POST['spassword']);

/*
    $hes = "2012";
    $phes = md5($hes);
    $staffinsert = $conn->prepare("INSERT INTO staff SET
            staffid=?, staffname=?, staffsurname=?, staffphone=?, position=?, salary=?, spassword=?");
    $staffinsert ->execute(array(
      2012, "ahmet", "akyel", "458458458", "manager", 5700, $phes
    ));
*/

    $staffask = $conn->prepare("SELECT * FROM staff where staffid =? and spassword =?");
    $staffask ->execute(array(
      $s_id, $s_password
    ));

    echo $result = $staffask->rowCount();
    if ($result == 1) {

      $_SESSION['staffid'] = $s_id;
      header("Location:../management/notification.php");
      exit;

    }else {
      header("Location:../management/loginmng.php?status=no");
      exit;
    }


  }else {
    echo "no not confrimed";
  }
?>
