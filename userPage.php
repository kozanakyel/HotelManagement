<?php
ob_start();
session_start();
require 'header/header.php';
echo $_SESSION['clientname'];

$clientask = $conn->prepare("SELECT * FROM client WHERE clientemail=?");
$clientask->execute(array(
  $_SESSION['clientemail']
));
echo $countclient= $clientask->rowCount();
$client_fetch = $clientask->fetch(PDO::FETCH_ASSOC);

if ($countclient == 0) {
  Header("Location:login.php?status=unauthlog");
}

$reser_ask = $conn->prepare("SELECT *,
    DATEDIFF(checkoutdate, checkindate) as daycount
    FROM reservation
    WHERE clientid=?");
$reser_ask->execute(array(
  $client_fetch["clientid"]
));
$r_fetch=$reser_ask->fetchAll();

?>

  <!--  Manage Reservations -->

  <div class="container">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2>Manage <b>Reservations</b></h2>
            </div>
            <div class="col-sm-6">

            <!--New Reservation modal for user hidden modalbox-->
              <a role="button" class="btn btn-success" href="central.php">
                Add New Reservation
              </a>

            </div>
          </div>

          <table class="table">
          <thead class="thead-dark">
          <tr>

          <th scope="col">Reservation ID</th>
          <th scope="col">Room No</th>
          <th scope="col">Check In</th>
          <th scope="col">Check Out</th>
          <th scope="col">Day Number</th>
          <th scope="col">Total Price</th>

          </tr>
          </thead>
          <tbody>

          <?php
          foreach ($r_fetch as $rsr) {
          echo "<form action='setting/process.php' method='POST'>
          <tr><th scope='row'><input hidden type='text' name='rsrid_c' value='". $rsr["reservationid"] ."'>". $rsr["reservationid"] ."</th>
          <td>". $rsr["roomno"] ."</td>
          <td>". $rsr["checkindate"] ."</td>
          <td>". $rsr["checkoutdate"] ."</td>
          <td>". $rsr["daycount"] ."</td>
          <td>". $rsr["totalprice"] ."</td>
          <td><input type='submit' class='btn btn-danger' name='listoff_c' value='Go To'></td></tr></form>";
          }

          ?>


          </tbody>
          </table>

        </div>
      </div>
    </div>

    <!--  user change profile -->
    <div class="container">
      <hr>
      <h4 class="display-6" style="font-weight:bold;">User Settings</h1>
        <hr>

        <div class="col">
          <div class="row">
            <div class="col mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="e-profile">
                    <div class="row">
                      <div class="col-12 col-sm-auto mb-3">
                        <div class="mx-auto" style="width: 140px;">
                          <div class="d-flex justify-content-center align-items-center rounded" style="height: 140px; background-color: rgb(233, 236, 239);">
                            <span style="color: rgb(166, 168, 170); font: bold 8pt Arial;">140x140</span>
                          </div>
                        </div>
                      </div>
                      <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                          <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap"><?php echo $client_fetch['clientname'] . " " . $client_fetch['clientsurname'] ?></h4>
                        </div>

                      </div>
                    </div>
                    <ul class="nav nav-tabs">
                      <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                    </ul>
                    <div class="tab-content pt-3">
                      <div class="tab-pane active">
                        <form class="form" novalidate="">
                          <div class="row">
                            <div class="col">
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="client_name" placeholder="John Smith" value="<?php echo $client_fetch['clientname'] ?>">
                                  </div>
                                </div>
                                <div class="col">
                                  <div class="form-group">
                                    <label>Surname</label>
                                    <input class="form-control" type="text" name="client_surname" placeholder="johnny.s" value="<?php echo $client_fetch['clientsurname'] ?>">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Email</label>
                                    <input name="client_email" class="form-control" type="email" value="<?php echo $client_fetch['clientemail'] ?>">
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>
                          <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                              <div class="mb-2"><b>Change Password</b></div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Current Password</label>
                                    <input class="form-control" type="password" placeholder="••••••">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>New Password</label>
                                    <input class="form-control" type="password" placeholder="••••••">
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <div class="form-group">
                                    <label>Confirm <span class="d-none d-xl-inline">Password</span></label>
                                    <input class="form-control" type="password" placeholder="••••••"></div>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col d-flex justify-content-end">
                              <button name="save_client_update" class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                          </div>
                        </form>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-3 mb-3">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="px-xl-3">
                    <button class="btn btn-block btn-secondary">
                      <i class="fa fa-sign-out"></i>
                      <span> <a style="color:white;" href="logout.php">Logout</a></span>
                    </button>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h6 class="card-title font-weight-bold">Support</h6>
                  <p class="card-text">Get fast, free help from our friendly assistants.</p>
                  <button type="button" class="btn btn-primary"><a href="contactPage.php" style="color:white;">Contact Us</a></button>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
  </div>
  </div>

  <!-- Footer -->
<?php require 'footer/footer.php';?>
