<?php
ob_start();
session_start();
?>
<?php require 'header/header.php';?>

  <!-- slider for hotel -->
  <div id="sliderrooms" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#sliderrooms" data-slide-to="0" class="active"></li>
      <li data-target="#sliderrooms" data-slide-to="1"></li>
      <li data-target="#sliderrooms" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/room1.jpeg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/room2.jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/room3.jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#sliderrooms" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#sliderrooms" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- form check in -->
  <div class="form-group">

    <form method="POST" action="newreservation.php">
      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="checkin">Check-In</label>
          <input name="checkindate" type="date" class="form-control" id="checkin">
        </div>
        <div class="form-group col-md-2">
          <label for="checkout">Check-Out</label>
          <input name="checkoutdate" type="date" class="form-control" id="checkout">
        </div>


        <div class="form-group col-md-2">
          <label for="room-type">Room type</label>
          <div>

              <select name="home_type" class="form-control" id="room-type">
                <option value="deluxe">Deluxe</option>
                <option value="standart">Standart</option>
                <option value="family">Family</option>
                <option value="family-lux">Family-lux</option>
              </select>


          </div>
        </div>

        <div class="form-group col-md-2">
          <button name="home_res_info" type="submit" class="btn btn-primary" style="margin-top:30px;">Book Now</button>
        </div>
      </div>
    </form>
  </div>
<!-- room cards -->
  <section class="rooms">
    <div class="container">
      <h5 class="section-head">
        <span class="heading">Rooms</span>
        <span class="sub-heading">Types</span>
      </h5>
      <div class="row">
        <div class="row-item featured-rooms">
          <img src="img/room1.jpeg" alt="" class="room-img">
          <h5 class="room-name">Deluxe</h5>
          <span class="room-price">200$/Night</span>
          <div class="room-rating">
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star-half rating"></i>
          </div>
          <a class="btn btn-danger" href="newreservation.php" role="button">Book now
          </a>
        </div>

        <div class="row-item featured-rooms">
          <img src="img/room2.jpg" alt="" class="room-img">
          <h5 class="room-name">Standart</h5>
          <span class="room-price">200$/Night</span>
          <div class="room-rating">
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star-half rating"></i>
          </div>
          <a class="btn btn-danger" href="newreservation.php" role="button">Book now
          </a>
        </div>

        <div class="row-item featured-rooms">
          <img src="img/room3.jpg" alt="" class="room-img">
          <h5 class="room-name">Nightly</h5>
          <span class="room-price">200$/Night</span>
          <div class="room-rating">
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star-half rating"></i>
          </div>
          <a class="btn btn-danger" href="newreservation.php" role="button">Book now
          </a>
        </div>

        <div class="row-item featured-rooms">
          <img src="img/room3.jpg" alt="" class="room-img">
          <h5 class="room-name">Nightly</h5>
          <span class="room-price">200$/Night</span>
          <div class="room-rating">
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star rating"></i>
            <i class="fas fa-star-half rating"></i>
          </div>
          <a class="btn btn-danger" href="newreservation.php" role="button">Book now
          </a>
        </div>
      </div>

    </div>
  </section>

<!-- main content -->
<div class="container">
  <div class="row">
    <div class="col-sm">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe repudiandae nam nesciunt inventore, ipsum nobis unde beatae sunt exercitationem numquam, mollitia soluta molestias ea id consectetur harum dolore autem accusantium dicta quod eveniet nihil aliquam omnis pariatur. Culpa aut placeat necessitatibus unde odio, aliquid rem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatum eaque asperiores quidem nostrum sunt ut aspernatur optio, odit, qui, eum animi doloribus consequatur officiis.
    </div>
    <div class="col-sm">
      <img src="img/room1.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>

<div class="container" style="margin-top:40px;">
  <div class="row">

    <div class="col-sm">
      <img src="img/room2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="col-sm">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe repudiandae nam nesciunt inventore, ipsum nobis unde beatae sunt exercitationem numquam, mollitia soluta molestias ea id consectetur harum dolore autem accusantium dicta quod eveniet nihil aliquam omnis pariatur. Culpa aut placeat necessitatibus unde odio, aliquid rem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatum eaque asperiores quidem nostrum sunt ut aspernatur optio, odit, qui, eum animi doloribus consequatur officiis.
    </div>
  </div>
</div>


  <!-- Footer -->
  <?php require 'footer/footer.php';?>
