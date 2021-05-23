<?php require 'header/header.php';?>


  <!-- Content and forms -->
  <div class="container">
    <h1 class="display-4">Contact</h1>
    <hr>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-sm">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe repudiandae nam nesciunt inventore, ipsum nobis unde beatae sunt exercitationem numquam, mollitia soluta molestias ea id consectetur harum dolore autem accusantium dicta quod
        eveniet nihil aliquam omnis pariatur. Culpa aut placeat necessitatibus unde odio, aliquid rem. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga voluptatum eaque asperiores quidem nostrum sunt ut aspernatur optio, odit, qui, eum
        animi doloribus consequatur officiis.
      </div>
      <div class="col-sm">
        <img src="img/mapscontact.jpeg" class="d-block w-60" height="300px;" width="300px;" alt="...">
      </div>
    </div>
    <p class="container" style="margin-top:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto eveniet quo deleniti quis, ut ipsam, totam reiciendis officia harum fuga.</p>
    <hr>
  </div>

  <!--Forms for content-->
  <div class="container">
    <form>
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="nameContact">Name</label>
          <input type="text" class="form-control" id="nameContact" placeholder="Name">
        </div>
        <div class="form-group col-md-4">
          <label for="lastNameContact">Last Name</label>
          <input type="text" class="form-control" id="lastNameContact" placeholder="LastName">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="emailContact">Email</label>
          <input type="email" class="form-control" id="emailContact" placeholder="Email">
        </div>
        <div class="form-group col-md-4">
          <label for="phoneContact">Phone</label>
          <input type="tel" class="form-control" id="phoneContact" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" placeholder="Phone Number">
        </div>

      </div>

      <div class="form-row">
        <div class="form-group col-md-8">
          <label for="messagecontact">Message</label>
          <textarea class="form-control" rows="5" id="messagecontact"></textarea>
        </div>
      </div>

      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>

  <div class="container">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro ratione, consectetur praesentium repellendus corrupti suscipit nam iste hic ipsa mollitia! Eligendi, corrupti, quis. Praesentium, esse.</p>
    <hr>
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <i class="fas fa-phone"></i>
        </div>
        <div class="col-sm">
          <a href="tel:+4733378901">+47 333 78 901</a>
        </div>
        <div class="col-sm">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="col-sm">
          <a href="mailto:kozanakyel@gmail.com">kozanakyel@gmail.com</a>
        </div>
      </div>
    </div>

  </div>


  <!-- Footer -->
  <?php require 'footer/footer.php';?>
