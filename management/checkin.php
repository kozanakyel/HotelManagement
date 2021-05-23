<?php require '../header/manheader.php';?>


      <!-- for the table rooms menu-->
      <div class="row text-dark">
        <div class="col">
          <div class="form-group">
            <hr>
            <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Check In</h1>
              <hr>
              <form>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="guest-name">Guest Name</label>
                    <input class="form-control" type="text" id="guest-number">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="checkin">Check-In</label>
                    <input type="date" class="form-control" id="checkin">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="checkout">Check-Out</label>
                    <input type="date" class="form-control" id="checkout">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="room-number">Room number</label>
                    <input class="form-control" type="number" value="100" id="room-number">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="adults-number">Adults</label>
                    <input class="form-control" type="number" value="0" id="adults-number">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="child-number">Childs</label>
                    <input class="form-control" type="number" value="0" id="childs-number">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="gender">Gender</label>
                    <input class="form-control" type="text" id="gender">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="payment">Payment Info</label>
                    <input class="form-control" type="text" id="payment">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="total-price">total Price</label>
                    <input class="form-control" type="number" value="0" id="total-price">
                  </div>
                </div>

                <div class="form-group col-md-2">
                  <button type="submit" class="btn btn-primary">Confirm Reservaton</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>


  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
