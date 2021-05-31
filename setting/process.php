<?php
ob_start();
session_start();
  include 'connection.php';
  //$hes = 2012;
  //echo md5($hes);

  //LOGIN A STAFF

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
    echo "do not any staff login maybe different process.... <br>";

  }


  //REGISTER A CLIENT

  if (isset($_POST['register_client'])) {
    echo "right there for register a client";

    $clientname =htmlspecialchars($_POST['clientname']);
    $clientsurname = htmlspecialchars($_POST['clientsurname']);
    $clientphone = htmlspecialchars($_POST['clientphone']);
    $clientemail = htmlspecialchars($_POST['clientemail']);
    $clientpassword = htmlspecialchars($_POST['clientpassword']);
    $repassword = htmlspecialchars($_POST['repassword']);

    if ($clientpassword == $repassword) {
      echo strlen($clientpassword), "<br>";

      if (strlen($clientpassword) >=6) {
        //starting save a client
        $clientask = $conn->prepare("SELECT * FROM client WHERE clientemail=?");
        $clientask->execute(array(
          $clientemail
        ));
        $result=$clientask->rowCount();
        //user is not exist!!

        if ($result==0) {

          $clientsave=$conn->prepare("INSERT INTO client SET
                clientname=?,
                clientsurname=?,
                clientphone=?,
                clientemail=?,
                clientpassword=?");

          $insert=$clientsave->execute(array(
            $clientname, $clientsurname, $clientphone, $clientemail, md5($clientpassword)
          ));
          if ($insert) {
            header("Location:../login.php?status=registersuccess");
            exit;
          }

        }else {
          header("Location:../signin.php?status=userexist");
          exit;
        }

      }else {
        header("Location:../signin.php?status=missingpass");
        exit;
      }

    }else {
      header("Location:../signin.php?status=passnomatch");
      exit;
    }

  }else{
    echo "wrong register.. <br>";
  }


  //LOGIN A CLIENT

  if (isset($_POST['login_client'])) {
    $clientemail = htmlspecialchars($_POST['clientemail']);
    $clientpassword = md5($_POST['clientpassword']);

    $clientask = $conn->prepare("SELECT * FROM client
      WHERE clientemail=? AND clientpassword=?");
    $clientask->execute(array(
      $clientemail, $clientpassword
    ));
  echo  $c_fetch = $clientask->fetch(PDO::FETCH_ASSOC);
  echo $c_fetch['clientname'];
    $result=$clientask->rowCount();

    if ($result==1) {
      $_SESSION['clientemail'] = $clientemail;
      $_SESSION['clientsurname'] = $c_fetch['clientsurname'];
      $_SESSION['clientname'] = $c_fetch['clientname'];
      header("Location:../homePage.php");
      exit;
    }else {
      header("Location:../login.php?status=failedlogin");
    }
  }
?>
