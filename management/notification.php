<?php require '../header/manheader.php';?>

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
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Email</th>
                <th scope="col">Surname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Messages</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $red = "red";
              $green = "green";
              foreach($contactget as $contact){
                echo "<tr>
                  <th scope='row'>" . $contact["cemail"] . "</th>
                  <td>" . $contact["cname"] . "</td>";

                echo "<td>" . $contact["csurname"] . "</td>";

                  echo "<td>" . $contact['cphone'] . "</td>
                  <td>" . $contact['cmsg'] . "</td>";

              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>



  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
