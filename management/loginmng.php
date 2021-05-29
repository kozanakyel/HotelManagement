<?php require '../header/manheader.php';?>

      <!-- for the table rooms menu-->
      <section class="container-fluid text-dark">
        <section class="row justify-content-center mr-5">
          <section class="col-12 col-sm-6 col-md-3">
            <h1 class="display-6">Login Management</h6>


            <form class="form-container" action="../setting/process.php" method="POST">
              <div class="form-group">
                <label for="">Staff ID:</label>
                <input type="number" required name="sid" class="form-control">
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="password" required class="form-control" name="spassword" id="">
              </div>
              <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
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
