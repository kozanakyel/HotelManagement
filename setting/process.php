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


<?php
//new RESERVATION
 if (isset($_POST['selectroomno'])) {


   //echo $_POST['rooms'], $client_fetch['clientid'],$_SESSION['c_in_date'],$_SESSION['c_out_date'];
   if ($_SESSION['c_in_date'] < $_SESSION['c_out_date']) {
     $reser_ask=$conn->prepare("INSERT INTO reservation SET
            clientid=?,
            checkindate=?,
            checkoutdate=?,
            roomno=?");
     $reser_ask->execute(array(
       $_SESSION['client_id'], $_SESSION['c_in_date'], $_SESSION['c_out_date'], $_POST['rooms']
     ));
     $result=$reser_ask->rowCount();
     $update_t_price=$conn->prepare("UPDATE exist_res SET totalprice=daycount*price");
     $update_t_price->execute();
     if ($result==1) {
       header("Location:../userPage.php?status=addednewreservation");
       exit;
     }else {
       header("Location:../newreservation.php?status=failedreservation");
       exit;
     }
   }else {
     header("Location:../newreservation.php?status=dateconflict");
     exit;
   }


 }
?>


<?php
//update reservation
if (isset($_POST['u_selectroomno'])) {


  //echo $_SESSION['u_in_date'], $_SESSION['u_out_date'], $_POST['rooms'], $_SESSION["central_res"];

  if ($_SESSION['u_out_date'] > $_SESSION['u_in_date']) {
    $reser_ask=$conn->prepare("UPDATE reservation SET
           checkindate=?,
           checkoutdate=?,
           roomno=?
           WHERE reservationid=?");
    $reser_ask->execute(array(
      $_SESSION['u_in_date'], $_SESSION['u_out_date'], $_POST['rooms'], $_SESSION["central_res"]
    ));
    $result=$reser_ask->rowCount();
    $update_t_price=$conn->prepare("UPDATE exist_res SET totalprice=daycount*price");
    $update_t_price->execute();
    if ($result==1) {
      header("Location:../userPage.php?status=updatereservation");
      exit;
    }else {
      header("Location:../central.php?status=failed_u_reservation");
    }
  }else {
    header("Location:../central.php?status=dateconflict");
  }

}


//Update User Information
if (isset($_POST["save_client_update"])) {

  if ($_POST["client_password"] == $_POST["new_password"] and
      $_POST["re_password"] == $_POST["new_password"]) {
    $u_client=$conn->prepare("UPDATE client SET
      clientname=?,
      clientsurname=?,
      clientemail=?,
      clientphone=?
      WHERE clientid=?");
    $u_client->execute(array(
      $_POST["client_name"], $_POST["client_surname"], $_POST["client_email"], $_POST["client_phone"], $_SESSION["c_id"]
    ));
    $u_count=$u_client->rowCount();
    if ($u_count > 0) {
      $_SESSION['clientemail'] = $_POST["client_email"];
      $_SESSION['clientsurname'] = $_POST["client_surname"];
      $_SESSION['clientname'] = $_POST["client_name"];
      header("Location:../userPage.php?status=suc_update");
      exit;
    }
  }elseif($_POST["client_password"] != $_POST["new_password"]
      and $_POST["re_password"] == $_POST["new_password"]
      and strlen($_POST["re_password"]) > 5){
        $u_client=$conn->prepare("UPDATE client SET
          clientname=?,
          clientsurname=?,
          clientemail=?,
          clientphone=?,
          clientpassword=?
          WHERE clientid=?");
        $u_client->execute(array(
          $_POST["client_name"], $_POST["client_surname"], $_POST["client_email"], $_POST["client_phone"], md5($_POST["re_password"]) ,$_SESSION["c_id"]
        ));
        $u_count=$u_client->rowCount();
        if ($u_count > 0) {
          $_SESSION['clientemail'] = $_POST["client_email"];
          $_SESSION['clientsurname'] = $_POST["client_surname"];
          $_SESSION['clientname'] = $_POST["client_name"];
          header("Location:../userPage.php?status=suc_update");
          exit;
        }
  }elseif($_POST["re_password"] != $_POST["new_password"]){
    header("Location:../userPage.php?status=pass_nomatch");
    exit;
  }elseif(strlen($_POST["re_password"]) < 6){
    header("Location:../userPage.php?status=pass_must6");
    exit;
  }

}


?>
