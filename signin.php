<?php require 'header/header.php';?>


  <!-- login forms -->
  <section class="container-fluid">
    <section class="row justify-content-center mr-5">
      <section class="col-12 col-sm-6 col-md-3">
        <h1 class="display-6">Sign in</h6>
          <form class="form-container">
            <div class="form-group">
              <label for="nameLogin">Name</label>
              <input type="text" class="form-control" id="nameLogin">

            </div>
            <div class="form-group">
              <label for="lastNameLogin">Last Name</label>
              <input type="text" class="form-control" id="lastNameLogin" aria-describedby="emailHelp">

            </div>
            <div class="form-group">
              <label for="emailLogin">Email address</label>
              <input type="email" class="form-control" id="emailLogin" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="pwdLogin">Password</label>
              <input type="password" class="form-control" id="pwdLogin">
            </div>
            <div class="form-group">
              <label for="repwdLogin">RE-Password</label>
              <input type="password" class="form-control" id="repwdLogin">
            </div>

            <a href="login.php" class="badge badge-success">I'm registered</a>

            <a role="button" onclick="goUserPage()" type="submit" style="color:white;" class="btn btn-primary btn-block">Submit</a>
          </form>
      </section>
    </section>

  </section>


  <!-- Footer -->
<?php require 'footer/footer.php';?>
