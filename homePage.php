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
    <form>
      <div class="form-row">
        <div class="form-group col-md-2">
          <label for="checkin">Check-In</label>
          <input type="date" class="form-control" id="checkin">
        </div>
        <div class="form-group col-md-2">
          <label for="checkout">Check-Out</label>
          <input type="date" class="form-control" id="checkout">
        </div>
        <div class="form-group col-md-2">
          <label for="adults-number">Adults</label>
          <input class="form-control" type="number" value="0" id="adults-number">
        </div>
        <div class="form-group col-md-2">
          <label for="child-number">Childs</label>
          <input class="form-control" type="number" value="0" id="childs-number">
        </div>

        <div class="form-group col-md-2">
          <label for="housekeeping">Room type</label>
          <div>
            <select class="form-control" id="housekeeping">
              <option value="1">Deluxe</option>
              <option value="2">Standart</option>
              <option value="3">Nightly</option>
            </select>
          </div>
        </div>

        <div class="form-group col-md-2">

          <button type="submit" class="btn btn-primary" style="margin-top:30px;"><a style="color:white;" href="signin.html">Book Now</a></button>
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
          <a class="btn btn-danger" href="signin.html" role="button">Book now
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
          <a class="btn btn-danger" href="signin.html" role="button">Book now
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
          <a class="btn btn-danger" href="signin.html" role="button">Book now
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
