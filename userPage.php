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
              <button id="makeReservation" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                Add New Reservation
              </button>

              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">New Reservation</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label for="checkin">Check-In</label>
                          <input type="date" class="form-control" id="checkin">
                        </div>
                        <div class="form-group">
                          <label for="checkout">Check-Out</label>
                          <input type="date" class="form-control" id="checkout">
                        </div>

                        <div class="form-group">
                          <label for="housekeeping">Room type</label>
                          <div>
                            <select class="form-control" id="housekeeping">
                              <option value="1">Deluxe</option>
                              <option value="2">Standart</option>
                              <option value="3">Family</option>
                              <option value="4">Family-lux</option>
                            </select>
                          </div>
                        </div>

                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-primary">Save Reservation</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="selectAll">
                    <label for="selectAll"></label>
                  </span>
                </th>
                <th>Name</th>
                <th>Email</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Guests</th>
                <th>Room type</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1">
                    <label for="checkbox1"></label>
                  </span>
                </td>
                <td>Thomas Hardy</td>
                <td>thomashardy@mail.com</td>
                <td>21-02-2022</td>
                <td>21-02-2022</td>
                <td>3</td>
                <td>Deluxe</td>
                <td>

                  <a href="#editReservationModal" class="edit" data-toggle="modal"><i class="fas fa-edit"></i></i></a>
                  <a href="#deleteReservationModal" class="delete" data-toggle="modal"><i class="fas fa-trash"></i></i></a>
                </td>
              </tr>


            </tbody>
          </table>
          <div class="clearfix">
            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
            <ul class="pagination">
              <li class="page-item disabled"><a href="#">Previous</a></li>
              <li class="page-item"><a href="#" class="page-link">1</a></li>
              <li class="page-item"><a href="#" class="page-link">2</a></li>
              <li class="page-item active"><a href="#" class="page-link">3</a></li>
              <li class="page-item"><a href="#" class="page-link">4</a></li>
              <li class="page-item"><a href="#" class="page-link">5</a></li>
              <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
          </div>
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
                  <button type="button" class="btn btn-primary"><a href="contactPage.html" style="color:white;">Contact Us</a></button>
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
