<?php require 'header/header.php';?>


  <!-- login forms -->
  <section class="container-fluid">
    <section class="row justify-content-center mr-5">
      <section class="col-12 col-sm-6 col-md-3">
        <h1 class="display-6">Login</h6>
        <form class="form-container" action="setting/process.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="clientemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="clientpassword" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button name="login_client" type="submit" class="btn btn-primary btn-block active">Log In</button>
        </form>
      </section>
    </section>

  </section>


  <!-- Footer -->
<?php require 'footer/footer.php';?>
