<?php
ob_start();
session_start();
require 'header/header.php';
$_SESSION['clientname'];

$clientask = $conn->prepare("SELECT * FROM client WHERE clientemail=?");
$clientask->execute(array(
  $_SESSION['clientemail']
));
$countclient= $clientask->rowCount();
$client_fetch = $clientask->fetch(PDO::FETCH_ASSOC);

if ($countclient == 0) {
  Header("Location:login.php?status=unauthlog");
}

if (isset($_POST['home_res_info'])) {
  //echo $_POST['checkindate'] . "<br>" . $_POST['checkoutdate'] . "<br>" . $_POST['home_type'];
}

?>

<div class="container">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <div class="form-row">
        <div class="container">
            <h3>HELLO <?php echo $client_fetch["clientname"] . " " . $client_fetch["clientsurname"]; ?></h3>
            <?php if($_GET['status']=="dateconflict") {?>
            <div class="alert alert-danger">
              <strong>FAIL!</strong> Check-out date must be bigger than Check-in!
            </div>
            <?php } ?>
            <hr>
        </div>
       </div>
     <div class="form-row">
         <div class="form-group col-md-2">
             <label for="guest-name">Name</label>
             <input name="c_name" class="form-control" readonly type="text" value="<?php echo $client_fetch['clientname']?>" id="c_name">
         </div>

         <div class="form-group col-md-2">
             <label for="checkin">Surname</label>
             <input name="c_surname" type="text" readonly value="<?php echo $client_fetch['clientsurname']?>" class="form-control" id="surname">
         </div>
         <div class="form-group col-md-2">
             <label for="checkout">Email</label>
             <input name="c_surname" type="email" readonly value="<?php echo $client_fetch['clientemail']?>" class="form-control" id="email">
         </div>
     </div>

     <div class="form-row">

         <div class="form-group col-md-2">
             <label for="room-number">Check-in</label>
             <input name="d_checkindate" class="form-control" value="<?php if (isset($_POST['home_res_info'])) {
               echo $_POST['checkindate'];
             }?>" type="date" id="">
         </div>
         <div class="form-group col-md-2">
             <label for="room-number">Check-out</label>
             <input name="d_checkoutdate" class="form-control" value="<?php if (isset($_POST['home_res_info'])) {
               echo $_POST['checkoutdate'];
             }?>" type="date" id="">
         </div>

         <div class="form-group col-md-2">
            <label for="room-type">Room type</label>
             <select name="d_room_type" class="form-control" id="room-type" >
             <option value="<?php if (isset($_POST['home_res_info'])) {
               echo $_POST['home_type'];
             }?>"><?php if (isset($_POST['home_res_info'])) {
               echo $_POST['home_type'];
             }?></option>
               <option value="deluxe">Deluxe</option>
               <option value="standart">Standart</option>
               <option value="family">Family</option>
               <option value="family-lux">Family-lux</option>
             </select>
         </div>
     </div>
     <div class="form-group col-md-2">
         <div style="position:relative; left: 500px;" class="form-group col-md-2 ">
             <button name="show_room" type="submit" class="btn btn-success">Show Available Rooms</button>
         </div>
     </div>
 </form>

 <?php
 $d_none="form-row d-none";

 if (isset($_POST['show_room'])) {
   $d_none="form-row";
   $_SESSION['c_in_date'] = $_POST['d_checkindate'];
   $_SESSION['c_out_date'] = $_POST['d_checkoutdate'];
   $_SESSION['client_id'] = $client_fetch['clientid'];

   $checkroom=$conn->prepare("CREATE VIEW not_available_rooms AS
      SELECT * FROM reservation
      WHERE (? <= checkindate and checkoutdate >= ?)
      OR (? <= checkindate and checkoutdate <= ? and checkindate <= ?)
      OR (? >= checkindate and checkoutdate <= ? and checkoutdate >= ?)");
   $checkroom->execute(array(
      $_POST['d_checkindate'], $_POST['d_checkoutdate'], $_POST['d_checkindate'], $_POST['d_checkoutdate'], $_POST['d_checkoutdate'], $_POST['d_checkindate'], $_POST['d_checkoutdate'], $_POST['d_checkindate']
   ));
   $checkroom=$conn->prepare("SELECT r.roomno FROM room r
     WHERE NOT EXISTS (SELECT * FROM not_available_rooms na WHERE na.roomno = r.roomno) AND r.roomtype=?");
   $checkroom->execute(array($_POST['d_room_type']));
   $roomgetava=$checkroom->fetchAll();
   $roomget=$roomgetava;
   try{
     $conn->exec("DROP VIEW not_available_rooms");
   }catch(PDOException $e){
     echo "Could not delete table : " . $e->getMessage();
   }
   foreach ($roomget as $room) {
     //echo $room['roomno'];
   };

   $typeget=$conn->prepare("SELECT * FROM roomprice WHERE roomtype=?");
   $typeget->execute(array(
     $_POST['d_room_type']
   ));
   $type_fetch=$typeget->fetch(PDO::FETCH_ASSOC);

 }
 ?>


 <form class="" action="setting/process.php" method="POST">

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
             <option value="" >Choose room</option>
             <?php foreach($roomget as $select){
               echo "<option value='" . $select['roomno'] . "'>". $select['roomno'] . "</option>";

             }?>
           </select>

           <button type="submit" class="btn btn-primary" name="selectroomno">Submit Reservation</button>
         </div>
       </div>
   </div>
 </form>
</div>





<!-- Footer -->
<?php require 'footer/footer.php';?>
