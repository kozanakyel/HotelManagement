<html lang="en">

<head>
  <title>Mazarin Hotel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/f85b28bbc8.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
  </script>


</head>

<body class="manage-page">
  <div class="d-flex">
    <div id="sidebar-container">
      <div class="logo">
        <h4 class="text-light font-weight-bold">Kozan Hotel</h4>
      </div>
      <div class="menu">

      </div>
    </div>



    <div class="container w-100">


      <!-- for the table rooms menu-->
      <section class="container-fluid text-dark">
        <section class="row justify-content-center mr-5">
          <section class="col-12 col-sm-6 col-md-3">
            <h1 class="display-8" style="margin-top:80px;"><b>Login Management</b></h6>

              <?php if($_GET['status']=="no") {?>
              <div class="alert alert-danger">
                <strong>FAIL!</strong> Passwords or StaffID dont match!
              </div>
              <?php } ?>


            <form class="form-container" action="../setting/process.php" method="POST">
              <div class="form-group">
                <label for="">Staff ID:</label>
                <input type="number" required name="sid" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" required class="form-control" name="spassword">
              </div>

              <!--<button type="submit" class="btn btn-primary btn-block">Submit</button>-->
              <button name="log_staff" type="submit" class="btn btn-primary btn-block active">Submit</button>
            </form>


          </section>
        </section>

      </section>

    </div>
    </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
