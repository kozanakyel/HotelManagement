<?php

require '../header/manheader.php';?>

<?php
  include '../setting/connection.php';

  $contactask=$conn->prepare("SELECT * FROM contactmsg");
  $contactask->execute();
  $contactget=$contactask->fetchAll();
?>

      <!-- for the table rooms menu-->
      <div class="row text-dark">
        <div class="container">
          <hr>
          <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Contact Messages</h1>
          <hr>

          <?php if($_GET['status']=="successdeletecontact") {?>
          <div class="alert alert-success">
            <strong>Delete </strong>contact message from <?php echo $_SESSION["del_msg_email"]; ?>!
          </div>
          <?php } ?>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Email</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Phone</th>
                <th scope="col">Messages</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach($contactget as $contact){
              /*  echo "<tr>
                  <th scope='row'>" . $contact["cemail"] . "</th>
                  <td>" . $contact["cname"] . "</td>";

                echo "<td>" . $contact["csurname"] . "</td>";

                  echo "<td>" . $contact['cphone'] . "</td>
                  <td>" . $contact['cmsg'] . "</td>";
                  */

                  echo "<form action='' method='POST'><tr>
                    <th scope='row'><input hidden type='text' name='contact_email' value='". $contact["cemail"] ."'>" . $contact["cemail"] . "</th>
                    <td>" . $contact["cname"]  . "</td>
                    <td>" . $contact["csurname"] . "</td>
                    <td>" . $contact['cphone'] . "</td>
                    <td>" . $contact['cmsg'] . "</td>
                    <td><input type='submit' class='btn btn-danger' name='delete_comment' value='Delete'></td></tr></form></form>";
              }
              ?>

              <?php
              if (isset($_POST["delete_comment"])) {
                  $_SESSION["del_msg_email"] = $_POST["contact_email"];
                  $delete_con = $conn->prepare("DELETE FROM contactmsg WHERE cemail=?");
                  $delete_con->execute(array(
                    $_POST["contact_email"]
                  ));
                  $result_con=$delete_con->rowCount();
                  if ($result_con>0) {
                    header("Location:notification.php?status=successdeletecontact");
                    exit;
                  }else{
                    header("Location:notification.php?status=faileddeletecontact");
                    exit;
                  }


              }
              ?>

            </tbody>
          </table>
        </div>

        <!--COMMENTS -->
        <?php
          $com_ask=$conn->prepare("SELECT * FROM comment_info WHERE c_status=? ORDER BY c_date");
          $com_ask->execute(array(
            '0'
          ));
          $com_fetch=$com_ask->fetchAll();
        ?>
        <div class="container">
          <hr>
          <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Reservation Comments for Corresponding</h1>
          <hr>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ReservationId</th>
                <th scope="col">Comments&Request</th>
                <th scope="col">DateTime</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach($com_fetch as $comm){
                echo "<form action='' method='POST'><tr>
                  <th scope='row'><input hidden type='text' name='rsrid' value='". $comm["reservationid"] ."'>" . $comm["reservationid"] . "</th>
                  <td>" . $comm["c_content"] . "</td>
                  <td>" . $comm["c_date"] . "</td>
                  <td><input type='submit' class='btn btn-success' name='listoff' value='Correspond'></td></tr></form></form>";
              }
              ?>
              <?php
              if (isset($_POST["listoff"])) {
                $_SESSION["central_res"] = $_POST["rsrid"];
                header("Location:../central.php");
                exit;

              }
              ?>

            </tbody>
          </table>

        </div>

        <?php
        //historic Corresponding
          $com_ask_h=$conn->prepare("SELECT * FROM comment_info WHERE staffid IS NOT NULL
                ORDER BY c_date DESC");
          $com_ask_h->execute();
          $com_fetch_h=$com_ask_h->fetchAll();
        ?>
        <div class="container" >
          <hr>
          <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Corresponded Comments History</h1>
          <hr>
          <div class="" style="height: 500px;
                max-height: 500px;
                overflow: scroll;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ReservationId</th>
                      <th scope="col">Staff Id</th>
                      <th scope="col">Correspond</th>
                      <th scope="col">DateTime</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    foreach($com_fetch_h as $comm){
                      echo "<form action='' method='POST'><tr>
                        <th scope='row'><input hidden type='text' name='rsrid' value='". $comm["reservationid"] ."'>" . $comm["reservationid"] . "</th>
                        <td>" . $comm["staffid"] . "</td>
                        <td>" . $comm["c_content"] . "</td>
                        <td>" . $comm["c_date"] . "</td>
                        <td><input type='submit' class='btn btn-warning' name='listoff' value='See Messages'></td></tr></form></form>";
                    }
                    ?>
                    <?php
                    if (isset($_POST["listoff"])) {
                      $_SESSION["central_res"] = $_POST["rsrid"];
                      header("Location:../central.php");
                      exit;

                    }
                    ?>

                  </tbody>
                </table>

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
