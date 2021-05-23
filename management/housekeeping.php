<?php require '../header/manheader.php';?>


      <div class="row w-100 text-dark">

        <div class="form-group">
          <hr>
          <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Housekeeping</h1>
            <hr>
            <form>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">RoomNumber/Floor</th>
                    <th scope="col">Room type</th>
                    <th scope="col">Cleaner</th>
                    <th scope="col">HouseKeeping status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      <input class="form-control" type="number" value="100" id="room-number">
                    </th>
                    <td>
                      <input class="form-control" type="text" id="room-type">
                    </td>
                    <td>
                      <input class="form-control" type="text" id="cleaner">
                    </td>
                    <td>
                      <label for="housekeeping" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <select class="form-control" id="housekeeping">
                          <option value="1">clean</option>
                          <option value="2">dirty</option>
                          <option value="3">need to be clean again</option>

                        </select>
                      </div>
                    </td>
                  </tr>
                  <!--extra examples-->
                  <tr>
                    <th scope="row">
                      <input class="form-control" type="number" value="100" id="room-number">
                    </th>
                    <td>
                      <input class="form-control" type="text" id="room-type">
                    </td>
                    <td>
                      <input class="form-control" type="text" id="cleaner">
                    </td>
                    <td>
                      <label for="housekeeping" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <select class="form-control" id="housekeeping">
                          <option value="1">clean</option>
                          <option value="2">dirty</option>
                          <option value="3">need to be clean again</option>

                        </select>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <th scope="row">
                      <input class="form-control" type="number" value="100" id="room-number">
                    </th>
                    <td>
                      <input class="form-control" type="text" id="room-type">
                    </td>
                    <td>
                      <input class="form-control" type="text" id="cleaner">
                    </td>
                    <td>
                      <label for="housekeeping" class="col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                        <select class="form-control" id="housekeeping">
                          <option value="1">clean</option>
                          <option value="2">dirty</option>
                          <option value="3">need to be clean again</option>

                        </select>
                      </div>
                    </td>
                  </tr>

                  <!--extra examples finished-->

                </tbody>
              </table>


              <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary">save Changes</button>
              </div>
            </form>
        </div>


      </div>

    </div>


  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
