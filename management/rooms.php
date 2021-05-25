<?php require '../header/manheader.php';?>

<?php
  include '../setting/connection.php';

  $roomask=$conn->prepare("SELECT r.*, rp.price FROM room r
    LEFT JOIN roomprice rp
    ON r.roomtype = rp.roomtype");
  $roomask->execute();
  $roomget=$roomask->fetchAll();
?>

      <!-- for the table rooms menu-->
      <div class="row w-100 text-dark">


          <div class="container">
            <hr>
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Rooms</h1>
            <hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Room No</th>
                  <th scope="col">Type</th>
                  <th scope="col">Status</th>
                  <th scope="col">Floor</th>
                  <th scope="col">Price/Daily</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $red = "red";
                $green = "green";
                foreach($roomget as $room){
                  echo "<tr>
                    <th scope='row'>" . $room["roomno"] . "</th>
                    <td>" . $room["roomtype"] . "</td>
                  ";

                    if($room['roomstatus'] == 0){
                      echo "<td style='background:" . $green . " ;color:white;'>EMPTY</td>";
                    }else{
                      echo "<td style='background:" . $red . ";color:white;'>FULL</td>";
                    }
                    echo "<td>" . $room['roomfloor'] . "</td>
                    <td>" . $room['price'] . "</td>";

                }
                ?>


              </tbody>
            </table>
          </div>

      </div>
      <!-- UPDATE A ROOM -->

      <div class="row text-dark">
        <div class="col">
          <div class="form-group">
            <hr>
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Update Room</h1>


  <form action="" method="post">

      <select name="rooms[]">
        <option value="" >Choose room</option>
        <?php foreach($roomget as $select){
          echo "<option value='" . $select['roomno'] . "'>". $select['roomno'] . "</option>";

        }?>
      </select>

      <input type="submit" name="selectroom" value="Choose options">
  </form>

  <?php
  $selectedroom;
    if(isset($_POST['selectroom'])){
      if(!empty($_POST['rooms'])) {
        foreach($_POST['rooms'] as $selected){
          $selectedroom = $selected;
        }
      } else {
        echo 'Please select the ROOM.';
      }
    }
    echo $selectedroom;

    $roomarr = [];
    foreach ($roomget as $room) {
      if ($selectedroom == $room['roomno']) {

        $roomarr = $room;
      }
    }
  ?>
              <hr>

              <form action="" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="roomno">Room Number</label>
                    <input class="form-control" type="number" value="<?php echo $roomarr['roomno']; ?>" name="roomno">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="roomtype">Room Type</label>
                    <input type="text" class="form-control" value="<?php echo $roomarr['roomtype']; ?>" name="roomtype">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="floor">Floor</label>
                    <input type="number" class="form-control" value="<?php echo $roomarr['roomfloor']; ?>" name="roomfloor">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" cols="60" rows="3" value="<?php echo $roomarr['description']; ?>" name="description">
                  </div>

                </div>

                <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-primary" name="updateroom">Confirm Update</button>
                </div>
              </form>
                <?php

                  if(isset($_POST['updateroom'])){

                    $query = $conn->prepare("UPDATE room SET
                          roomtype = ?,
                            roomfloor = ?,
                              description=? WHERE roomno = ?
                    ");
                    $update = $query->execute(array(
                      $_POST['roomtype'], $_POST['roomfloor'], $_POST['description'], $_POST['roomno']
                    ));
                  }

                ?>


          </div>
        </div>
      </div>

      <!--ADD a new room-->

      <div class="row text-dark">
        <div class="col">
          <div class="form-group">
            <hr>
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Add Room</h1>

              <hr>

              <form action="" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="roomno">Room Number</label>
                    <input class="form-control" type="number" value="" name="roomno">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="roomtype">Room Type</label>
                    <input type="text" class="form-control" value="" name="roomtype">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="floor">Floor</label>
                    <input type="number" class="form-control" value="" name="roomfloor">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="description">Description</label>
                    <input class="form-control" type="text" cols="60" rows="3" value="" name="description">
                  </div>

                </div>

                <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-primary" name="addroom">Add Room</button>
                </div>
              </form>
                <?php

                  if(isset($_POST['addroom'])){

                    $query = $conn->prepare("INSERT INTO room SET
                        roomno = ?,
                          roomtype = ?,
                            roomfloor = ?,
                              description=?,
                              roomstatus =?

                    ");
                    $insert = $query->execute(array(
                      $_POST['roomno'], $_POST['roomtype'], $_POST['roomfloor'], $_POST['description'], 0
                    ));
                  }

                ?>


          </div>
        </div>
      </div>

      <!--change Price-->

      <div class="row text-dark">
        <div class="col">
          <div class="form-group">
            <hr>
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Change Price</h1>

              <hr>

              <form action="" method="POST">
                <div class="form-row">
                  <?php

                  $roomask=$conn->prepare("SELECT * FROM roomprice");
                  $roomask->execute();
                  $roomget=$roomask->fetchAll();

                  foreach ($roomget as $room) {
                    echo "<div class='form-group col-md-2'>
                      <label for='standart'>" . $room['roomtype'] . "</label>
                      <input class='form-control' type='number' value='" . $room['price'] . "' name='". $room['roomtype'] ."'>
                    </div>";
                  }
                  ?>

                </div>

                <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-primary" name="changeprice">Change Price</button>
                </div>
              </form>
                <?php

                  if(isset($_POST['changeprice'])){

                    $query = $conn->prepare("UPDATE roomprice SET
                          price = ? WHERE roomtype = ?
                    ");
                    $update = $query->execute(array(
                      $_POST['standart'], "standart"
                    ));

                    $query = $conn->prepare("UPDATE roomprice SET
                          price = ? WHERE roomtype = ?
                    ");
                    $update = $query->execute(array(
                      $_POST['deluxe'], "deluxe"
                    ));

                    $query = $conn->prepare("UPDATE roomprice SET
                          price = ? WHERE roomtype = ?
                    ");
                    $update = $query->execute(array(
                      $_POST['family'], "family"
                    ));

                    $query = $conn->prepare("UPDATE roomprice SET
                          price = ? WHERE roomtype = ?
                    ");
                    $update = $query->execute(array(
                      $_POST['family-lux'], "family-lux"
                    ));
                  }

                ?>


          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
