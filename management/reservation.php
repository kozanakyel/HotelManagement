<?php require '../header/manheader.php';

  $reser_ask = $conn->prepare("SELECT r.*, c.clientname, c.clientsurname, c.clientemail,
      DATEDIFF(r.checkoutdate,r.checkindate) as daycount
      FROM reservation r
      LEFT JOIN client c
      ON c.clientid = r.clientid
      ORDER BY r.checkindate");

  $reser_ask->execute();
  $r_fetch=$reser_ask->fetchAll();

?>

      <!-- for the table rooms menu-->
      <div class="row text-dark">
        <div class="col ml-5">

          <hr>
          <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Reservations</h1>
          <hr>
          <table class="table">
  <thead class="thead-dark">
    <tr>

      <th scope="col">Reservation ID</th>
      <th scope="col">Room No</th>
      <th scope="col">Check In</th>
      <th scope="col">Check Out</th>
      <th scope="col">Customer Name</th>
      <th scope="col">Day Number</th>
      <th scope="col">Total Price</th>

    </tr>
  </thead>
  <tbody>

      <?php
      foreach ($r_fetch as $rsr) {
        echo "<form action='' method='POST'>
        <tr><th scope='row'><input hidden type='text' name='rsrid' value='". $rsr["reservationid"] ."'>". $rsr["reservationid"] ."</th>
        <td>". $rsr["roomno"] ."</td>
        <td>". $rsr["checkindate"] ."</td>
        <td>". $rsr["checkoutdate"] ."</td>
        <td>". $rsr["clientname"] . " " . $rsr["clientsurname"] ."</td>
        <td>". $rsr["daycount"] ."</td>
        <td>". $rsr["totalprice"] ."</td>
        <td><input type='submit' class='btn btn-danger' name='listoff' value='Go To'></td></tr></form>";
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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
