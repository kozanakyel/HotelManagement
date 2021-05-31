<?php require 'header/header.php';?>


  <!-- login forms -->
  <section class="container-fluid">
    <section class="row justify-content-center mr-5">
      <section class="col-12 col-sm-6 col-md-3">
        <h1 class="display-6">Sign in</h6>

          <?php if($_GET['status']=="passnomatch") {?>
          <div class="alert alert-danger">
            <strong>FAIL!</strong> Passwords dont match!
          </div>
          <?php } ?>

          <?php if($_GET['status']=="missingpass") {?>
          <div class="alert alert-danger">
            <strong>FAIL!</strong> Password must be atleast 6 character!
          </div>
          <?php } ?>

          <?php if($_GET['status']=="userexist") {?>
          <div class="alert alert-danger">
            <strong>FAIL!</strong> User is exist!
          </div>
          <?php } ?>

          <?php if($_GET['status']=="regfail") {?>
          <div class="alert alert-danger">
            <strong>FAIL!</strong> registration failed!
          </div>
          <?php } ?>

          <form class="form-container" action="setting/process.php" method="POST">
            <div class="form-group">
              <label for="nameLogin">Name</label>
              <input type="text" class="form-control" id="nameLogin" name="clientname">

            </div>
            <div class="form-group">
              <label for="lastNameLogin">Last Name</label>
              <input type="text" class="form-control" id="lastNameLogin" name="clientsurname">

            </div>
            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="clientphone">
            </div>
            <div class="form-group">
              <label for="emailLogin">Email address</label>
              <input type="email" class="form-control" id="emailLogin" aria-describedby="emailHelp" name="clientemail">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="pwdLogin">Password</label>
              <input type="password" class="form-control" id="pwdLogin" name="clientpassword">
            </div>
            <div class="form-group">
              <label for="repwdLogin">RE-Password</label>
              <input type="password" class="form-control" id="repwdLogin" name="repassword">
            </div>

            <a href="login.php" class="badge badge-success">I'm registered</a>

            <button name="register_client" type="submit" class="btn btn-primary btn-block active">Register</button>
          </form>
      </section>
    </section>

  </section>


  <!-- Footer -->
<?php require 'footer/footer.php';?>
