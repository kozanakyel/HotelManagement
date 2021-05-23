<?php require 'header/header.php';?>


  <!-- login forms -->
  <section class="container-fluid">
    <section class="row justify-content-center mr-5">
      <section class="col-12 col-sm-6 col-md-3">
        <h1 class="display-6">Login</h6>
        <form class="form-container">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <a role="button" onclick="goUserPage()" type="submit" style="color:white;" class="btn btn-primary btn-block">Submit</a>
        </form>
      </section>
    </section>

  </section>


  <!-- Footer -->
<?php require 'footer/footer.php';?>
