<?php
ob_start();
session_start();
?>
<?php require 'header/header.php';
$clientask = $conn->prepare("SELECT * FROM client WHERE clientemail=?");
$clientask->execute(array(
  $_SESSION['clientemail']
));
$countclient= $clientask->rowCount();
$client_fetch = $clientask->fetch(PDO::FETCH_ASSOC);

$s_ask=$conn->prepare("SELECT * FROM staff where staffid=?");
$s_ask->execute(array(
  $_SESSION['staffid']
));
$countstaff = $s_ask->rowCount();
$s_fetch = $s_ask->fetch(PDO::FETCH_ASSOC);

if ($countclient == 0 && $countstaff == 0) {
  Header("Location:login.php?status=unauthlog");
}


$r_ask = $conn->prepare("SELECT * FROM exist_res WHERE reservationid=?");
$r_ask->execute(array(
  $_SESSION["central_res"]
));
$r_fetch = $r_ask->fetch(PDO::FETCH_ASSOC);

?>

        <div class="container">
          <form action="" method="POST">
              <div class="form-row">
                  <div class="container">
                      <h3>HELLO <?php echo $r_fetch["clientname"] . " " . $r_fetch["clientsurname"]; ?></h3>
                      <hr>
                      <h5>Your Reservation Id:  <?php echo $r_fetch["reservationid"]; ?></h5>
                      <hr>
                      <?php if($_GET['status']=="dateconflict") {?>
                      <div class="alert alert-danger">
                        <strong>FAIL!</strong> Check-out date must be bigger than Check-in!
                      </div>
                      <?php } ?>
                  </div>
                 </div>

                          <div class="form-row">
                              <div class="form-group col-md-2">
                                  <label>Check-In</label>
                                  <input name="u_checkin" class="form-control" type="date" value="<?php echo $r_fetch["checkindate"]; ?>">
                              </div>
                              <div class="form-group col-md-2" >
                                  <label>Check-Out</label>
                                  <input name="u_checkout" class="form-control" type="date" value="<?php echo $r_fetch["checkoutdate"]; ?>">
                              </div>
                              <div class="form-group col-md-2" >
                                  <label>Room No</label>
                                  <input readonly class="form-control" name="u_room" type="number" value="<?php echo $r_fetch["roomno"]; ?>">
                              </div>
                          </div>

                          <div class="form-row">
                              <div class="form-group col-md-2">
                                  <label>Total Price</label>
                                  <input readonly class="form-control" type="number" value="<?php echo $r_fetch["totalprice"]; ?>">
                              </div>
                              <div class="form-group col-md-2" >
                                <label>Room type</label>
                                 <select name="u_room_type" class="form-control">
                                 <option value="<?php echo $r_fetch["roomtype"]; ?>">
                                   <?php echo $r_fetch["roomtype"]; ?>
                                 </option>
                                   <option value="deluxe">Deluxe</option>
                                   <option value="standart">Standart</option>
                                   <option value="family">Family</option>
                                   <option value="family-lux">Family-lux</option>
                                 </select>
                              </div>
                          </div>

                          <div class="form-group col-md-2">
                              <div style="position:relative; left: 500px;" class="form-group col-md-2 ">
                                  <button name="u_res" type="submit" class="btn btn-success">Update</button>

                              </div>
                              <div style="position:relative; left: 500px;" class="form-group col-md-2 ">

                                  <button name="can_res" type="submit" class="btn btn-danger">Cancel</button>
                              </div>
                          </div>
                      </form>
        </div>
        <div class="container">
          <?php
          $d_none="form-row d-none";

          if (isset($_POST['u_res'])) {
            
            $_SESSION['u_in_date'] = $_POST['u_checkin'];
            $_SESSION['u_out_date'] = $_POST['u_checkout'];
            $_SESSION['client_id'] = $r_fetch['clientid'];

            $checkroom=$conn->prepare("CREATE VIEW not_available_rooms{$_SESSION['client_id']} AS
               SELECT * FROM reservation
               WHERE (? <= checkindate and checkoutdate >= ?)
               OR (? <= checkindate and checkoutdate <= ? and checkindate <= ?)
               OR (? >= checkindate and checkoutdate <= ? and checkoutdate >= ?)");
            $checkroom->execute(array(
               $_POST['u_checkin'], $_POST['u_checkout'], $_POST['u_checkin'], $_POST['u_checkout'], $_POST['u_checkout'], $_POST['u_checkin'], $_POST['u_checkout'], $_POST['u_checkin']
            ));
            $checkroom=$conn->prepare("SELECT r.roomno FROM room r
              WHERE NOT EXISTS (SELECT * FROM not_available_rooms{$_SESSION['client_id']} na WHERE na.roomno = r.roomno) AND r.roomtype=?");
            $checkroom->execute(array($_POST['u_room_type']));
            $roomgetava=$checkroom->fetchAll();
            $roomget=$roomgetava;
            try{
              $conn->exec("DROP VIEW not_available_rooms{$_SESSION['client_id']}");
            }catch(PDOException $e){
              echo "Could not delete table : " . $e->getMessage();
            }
            if (count($roomget)>0 ) {
              $d_none="form-row";
            }

            $typeget=$conn->prepare("SELECT * FROM roomprice WHERE roomtype=?");
            $typeget->execute(array(
              $_POST['u_room_type']
            ));
            $type_fetch=$typeget->fetch(PDO::FETCH_ASSOC);

          }
          ?>


          <form class="" action="setting/process.php" method="POST">
            <?php if(isset($_POST['u_res']) and count($roomget) == 0) {?>
            <div class="alert alert-danger">
              <strong>FAIL!</strong> Not any available room. Please choose another Room type!
            </div>
            <?php } ?>
            <div class="<?php echo $d_none?>">
                <div class="form-group col-md-2">
                  <div class="row-item featured-rooms">
                    <img src="img/room3.jpg" alt="" class="room-img">
                    <h5 class="room-name"><?php echo $type_fetch['roomtype'] ?></h5>
                    <span class="room-price"><?php echo $type_fetch['price'] . " $/Daily" ?></span>
                    <div class="room-rating">
                      <i class="fas fa-star rating"></i>
                      <i class="fas fa-star rating"></i>
                      <i class="fas fa-star rating"></i>
                      <i class="fas fa-star rating"></i>
                      <i class="fas fa-star-half rating"></i>
                    </div>
                    <select name="rooms" class="form-select">
                      <option value="<?php echo $_POST["u_room"] ?>" ><?php echo $_POST["u_room"] ?></option>
                      <?php foreach($roomget as $select){
                        echo "<option value='" . $select['roomno'] . "'>". $select['roomno'] . "</option>";

                      }?>
                    </select>

                    <button type="submit" class="btn btn-primary" name="u_selectroomno">Submit Reservation</button>
                  </div>
                </div>
            </div>
          </form>

        </div>

        <?php
        //CANCEL Reservation
        if (isset($_POST["can_res"])) {

          $cancel_comm = $conn->prepare("DELETE FROM comment_info
            WHERE reservationid=?");
          $cancel_comm->execute(array(
            $r_fetch["reservationid"]
          ));
          $cancel_res = $conn->prepare("DELETE FROM reservation WHERE reservationid=?");
          $cancel_res->execute(array(
            $r_fetch["reservationid"]
          ));
          $c_result = $cancel_res->rowCount();
          if ($c_result != 0) {
            header("Location:userPage.php?status=cancelres");
            exit;
          }else{
            header("Location:central.php?status=failedcancel");
            exit;
          }
        }
         ?>

        <hr>
        <?php
        //COMMENT PROCEUDRE
          $comm_ask=$conn->prepare("SELECT * FROM comment_info WHERE reservationid=?");
          $comm_ask->execute(array(
            $r_fetch["reservationid"]
          ));
          $comm_fetch=$comm_ask->fetchAll();

        ?>


        <div class="container">
            <h3>Comments:</h3>
            <hr>
            <?php
              if (count($comm_fetch) > 0) {
                foreach ($comm_fetch as $comment) {
                  if($comment["staffid"] == NULL){
                    echo "<div class='container'>
                    <label class='border border-primary' style='padding:15px; border-radius:25px;'>
                    <strong>" . $r_fetch["clientname"] . ": </strong>  " . $comment["c_content"] . "
                    </label>
                    </div>";
                  }else {
                    echo "<div class='container d-flex flex-row-reverse'>
                    <label class='border border-danger' style='padding:15px; border-radius:25px;'>
                    <strong style='color:red;'>Personal Id " . $comment["staffid"] . ": </strong>" . $comment["c_content"] . "
                    </label>
                    </div>";
                  }
                }
              }
             ?>
             <br><hr>
             <div class="container">
               <form class="" action="" method="post">
                 <label style="margin-left:50px;" for=""><b>Your Messages:</b></label>
                 <div class="form-group">

                   <textarea style="padding:10px;" name="s_comment" class="form-group" rows="8" cols="80"></textarea>
                 </div>
                 <div class="form-group">
                   <input type="submit" class="form-group btn btn-primary" name="correspond">
                 </div>
               </form>
               <?php
                if (isset($_POST["correspond"])) {
                  if($countstaff != 0){
                    $comm_ins=$conn->prepare("INSERT INTO comment_info SET
                        reservationid=?,
                        staffid=?,
                        c_content=?
                        ");
                    $comm_ins->execute(array(
                      $r_fetch["reservationid"], $s_fetch["staffid"], $_POST["s_comment"]
                    ));

                    $comm_u=$conn->prepare("UPDATE comment_info SET
                        c_status=?
                        WHERE reservationid=?");
                    $comm_u->execute(array(
                      '1', $r_fetch["reservationid"]
                    ));
                    $count_comm = $comm_ins->rowCount();
                    if ($count_comm != 0) {
                      header("Location:central.php?status=succescomment");
                      exit;
                    }else{
                      header("Location:central.php?status=failedcomment");
                      exit;
                    }
                  }
                    //if a client comment
                  if($countclient != 0){
                    $comm_ins=$conn->prepare("INSERT INTO comment_info SET
                        reservationid=?,
                        c_content=?
                        ");
                    $comm_ins->execute(array(
                      $r_fetch["reservationid"], $_POST["s_comment"]
                    ));

                    $count_comm = $comm_ins->rowCount();
                    if ($count_comm != 0) {
                      header("Location:central.php?status=succescomment");
                      exit;
                    }else{
                      header("Location:central.php?status=failedcomment");
                      exit;
                    }
                  }
                }
                ?>

             </div>


        </div>



<!-- Footer -->
<?php require 'footer/footer.php';?>
