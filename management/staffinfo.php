<?php require '../header/manheader.php';?>

<?php
  include '../setting/connection.php';

  $s_ask=$conn->prepare("SELECT * FROM staff");
  $s_ask->execute();
  $s_get=$s_ask->fetchAll();
?>

      <!-- for the table rooms menu-->
      <div class="row w-100 text-dark">


          <div class="container">
            <hr>
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Staffs</h1>
            <hr>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Staff Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">Surname</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Salary</th>
                  <th scope="col">Position</th>
                  <th scope="col">Start Date</th>
                </tr>
              </thead>
              <tbody>

                <?php

                foreach($s_get as $st){
                  echo "<tr>
                    <th scope='row'>" . $st["staffid"] . "</th>
                    <td>" . $st["staffname"] . "</td>";
                    echo "<td>" . $st['staffsurname'] . "</td>
                    <td>" . $st['staffphone'] . "</td>";
                    echo "<td>" . $st['salary'] . "</td>
                    <td>" . $st['position'] . "</td>
                    <td>" . $st['startdate'] . "</td>";

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
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Update Staff Info</h1>


  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

      <select name="staffs[]">
        <option value="" >Choose Staff</option>
        <?php foreach($s_get as $select){
          echo "<option value='" . $select['staffid'] . "'>". $select['staffid'] . "</option>";

        }?>
      </select>

      <input type="submit" name="selectstaff" value="Choose options">
  </form>

  <?php
  $selectedstaff;
    if(isset($_POST['selectstaff'])){
      if(!empty($_POST['staffs'])) {
        foreach($_POST['staffs'] as $selected){
          $selectedstaff = $selected;
        }
      } else {
        echo 'Please select the ROOM.';
      }
    }
    echo $selectedstaff;

    $staffarr = [];
    foreach ($s_get as $st) {
      if ($selectedstaff == $st['staffid']) {

        $staffarr = $st;
      }
    }
  ?>
              <hr>

              <form action="" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="roomno">Staff Id</label>
                    <input class="form-control" type="number" value="<?php echo $staffarr['staffid']; ?>" name="staffid">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="roomtype">Name</label>
                    <input type="text" class="form-control" value="<?php echo $staffarr['staffname']; ?>" name="staffname">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="floor">Surname</label>
                    <input type="text" class="form-control" value="<?php echo $staffarr['staffsurname']; ?>" name="staffsurname">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="description">Phone</label>
                    <input class="form-control" type="text" value="<?php echo $staffarr['staffphone']; ?>" name="staffphone">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="description">Salary</label>
                    <input class="form-control" type="number" value="<?php echo $staffarr['salary']; ?>" name="salary">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="description">Position</label>
                    <input class="form-control" type="text" value="<?php echo $staffarr['position']; ?>" name="position">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="description">Password</label>
                    <input class="form-control" type="text" value="<?php echo $staffarr['spassword']; ?>" name="spassword">
                  </div>
                </div>

                <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-primary" name="updatestaff">Confirm Update</button>
                </div>
              </form>
                <?php

                  if(isset($_POST['updatestaff'])){

                    $query = $conn->prepare("UPDATE staff SET
                          staffname = ?,
                            staffsurname = ?,
                              staffphone=?,
                              salary=?,
                              position=?,
                              spassword=?
                               WHERE staffid = ?
                    ");
                    $update = $query->execute(array(
                      $_POST['staffname'], $_POST['staffsurname'], $_POST['staffphone'], $_POST['salary'], $_POST['position'], md5($_POST['spassword']), $_POST['staffid']
                    ));
                  }

                ?>


          </div>
        </div>
      </div>

      <!--ADD a new staff-->

      <div class="row text-dark">
        <div class="col">
          <div class="form-group">
            <hr>
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Add Staff</h1>

              <hr>

              <form action="" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="roomno">Staff Id</label>
                    <input class="form-control" type="number" value="" name="staffid">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="roomtype">Name</label>
                    <input type="text" class="form-control" value="" name="staffname">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="floor">Surname</label>
                    <input type="text" class="form-control" value="" name="staffsurname">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="description">Phone</label>
                    <input class="form-control" type="text" value="" name="staffphone">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="description">Salary</label>
                    <input class="form-control" type="number" value="<" name="salary">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="description">Position</label>
                    <input class="form-control" type="text" value="" name="position">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="description">Password</label>
                    <input class="form-control" type="text" value="" name="spassword">
                  </div>
                </div>

                <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-primary" name="addstaff">Add Staff</button>
                </div>
              </form>
                <?php

                  if(isset($_POST['addstaff'])){
                    echo $_POST['staffname'], $_POST['staffsurname'], $_POST['staffphone'], $_POST['salary'], $_POST['position'], md5($_POST['spassword']), $_POST['staffid'];
                    $query = $conn->prepare("INSERT INTO staff SET
                      staffname = ?,
                        staffsurname = ?,
                          staffphone=?,
                          salary=?,
                          position=?,
                          spassword=?,
                           staffid = ?

                    ");
                    $insert = $query->execute(array(
                      $_POST['staffname'], $_POST['staffsurname'], $_POST['staffphone'], $_POST['salary'], $_POST['position'], md5($_POST['spassword']), $_POST['staffid']
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
