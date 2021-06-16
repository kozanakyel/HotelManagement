<?php require '../header/manheader.php';?>

      <div class="row w-100 text-dark">

        <div class="container">
          <hr>
          <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Monthly Reports</h4>
            <hr>
            <!-- Resrvation page-->
            <div class="container">
              <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="nameContact">Check In Date</label>
                    <input type="month" name="r_c_in" min="2019-03" value="2021-06" required class="form-control">
                  </div>

                </div>
                <div class="form-group col-md-3">
                  <button type="submit" name="get_r_dates" class="btn btn-primary">Get Report</button>
                </div>
              </form>

            <?php
              $d_none = "d-none";
              //GET RESERVATIONS
              if(isset($_POST['get_r_dates'])){
                $d_none = "";
                $checkin = $_POST["r_c_in"]."-01";
                $checkout = $_POST["r_c_in"]."-30";
                $reservations = $conn->prepare("SELECT * FROM exist_res
                    WHERE (? <= checkindate and checkoutdate <= ?)
                    OR (? <= checkindate and checkoutdate <= ? and checkindate <= ?)
                    OR (? >= checkindate and checkoutdate <= ? and checkoutdate >= ?)
                    OR (? >= checkindate and checkoutdate >= ?)");
               $reservations->execute(array(
                 $checkin, $checkout, $checkin,
                $checkout, $checkout, $checkin,
                 $checkout, $checkin, $checkin,
                 $checkout
               ));
               $reser_all = $reservations->fetchAll();
              }
              //STAFF SALARY
              $staffs = $conn->prepare("SELECT * FROM staff");
              $staffs->execute();
              $staff_all = $staffs->fetchAll();
              $monthly_expense = 0;
              foreach ($staff_all as $staff) {
                $monthly_expense += $staff["salary"];
              }

              //FOR CANCELLED APPROVED RESERVATION
              $cancelled = 0;
              $approved = 0;
              $monthly_revenue = 0;
              foreach ($reser_all as $reser) {
                if ($reser["resstatus"] == 1) {
                  $approved++;
                  $monthly_revenue += $reser["totalprice"];
                }
                if ($reser["resstatus"] == 0) {
                  $cancelled++;
                }
              }

              //for ROOMTYPES CHARTS
              $standart = 0;
              $deluxe = 0;
              $family = 0;
              $family_lux = 0;
              foreach ($reser_all as $reser) {
                if ($reser["roomtype"] == 'standart' and $reser["resstatus"] == 1) {
                  $standart++;
                }
                if ($reser["roomtype"] == 'deluxe' and $reser["resstatus"] == 1) {
                  $deluxe++;
                }
                if ($reser["roomtype"] == 'family' and $reser["resstatus"] == 1) {
                  $family++;
                }
                if ($reser["roomtype"] == 'family-lux' and $reser["resstatus"] == 1) {
                  $family_lux++;
                }
              }

            ?>

            </div>

            <hr>
        </div>

        <!-- charts begins-->
        <div class="container <?php echo $d_none; ?>">
          <div class="container">
            <hr>
            <h4 class="display-8 mr-10" style="font-weight:bold; color:black;">
                Report Date: <?php echo $checkin . " / " . $checkout; ?>
            </h4>
              <hr>
            <div class="card" style="width: 18rem;">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong class="font-weight-bold">Revenue: </strong><?php echo $monthly_revenue; ?> $</li>
                <li class="list-group-item"><strong class="font-weight-bold">Expense: </strong><?php echo $monthly_expense; ?> $</li>
                <li class="list-group-item"><strong class="font-weight-bold">Approved Reservation: </strong><?php echo $approved; ?></li>
                <li class="list-group-item"><strong class="font-weight-bold">Cancelled Reservation: </strong><?php echo $cancelled; ?></li>
              </ul>
            </div>

          </div>
            <div class="d-flex">
              <div class="container row">
                <div class="p-2">
                  <div id="reser_cancel">Montly salary for Rezervation</div>
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                </div>
              </div>
              <div class="container row">
                <div class="p-2">
                  <div id="revenu_expense">Montly salary for Rezervation</div>
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                </div>
              </div>
              <div class="container row">
                <div class="p-2">
                  <div id="room_types">Montly salary for Rezervation</div>
                  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                </div>

              </div>
            </div>

        </div>
      </div>

    </div>


  </div>


<!--  montly pie chart for rooms by GOOGLE api visziluation-->
  <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
      'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Revenue', <?php echo $monthly_revenue; ?>],
        ['Expense', <?php echo $monthly_expense; ?>]
      ]);

      // Optional; add a title and set the width and height of the chart
      var options = {
        'title': 'Revenue/Expense',
        'width': 300,
        'height': 300
      };

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('revenu_expense'));
      chart.draw(data, options);
    }
  </script>

  <!--  montly pie chart for rooms by GOOGLE api visziluation-->
    <script type="text/javascript">
      // Load google charts
      google.charts.load('current', {
        'packages': ['corechart']
      });
      google.charts.setOnLoadCallback(drawChart);

      // Draw the chart and set the chart values
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Approved', <?php echo $approved; ?>],
          ['Cancelled', <?php echo $cancelled; ?>]
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {
          'title': 'Reservation Approved/Cancelled',
          'width': 300,
          'height': 300
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('reser_cancel'));
        chart.draw(data, options);
      }
    </script>

    <!--  montly pie chart for rooms by GOOGLE api visziluation-->
      <script type="text/javascript">
        // Load google charts
        google.charts.load('current', {
          'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        // Draw the chart and set the chart values
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Standart', <?php echo $standart; ?>],
            ['Deluxe', <?php echo $deluxe; ?>],
            ['Family', <?php echo $family; ?>],
            ['Family-lux', <?php echo $family_lux; ?>]
          ]);

          // Optional; add a title and set the width and height of the chart
          var options = {
            'title': 'Reserved Room Types',
            'width': 300,
            'height': 300
          };

          // Display the chart inside the <div> element with id="piechart"
          var chart = new google.visualization.PieChart(document.getElementById('room_types'));
          chart.draw(data, options);
        }
      </script>

<!--  montly pie chart for rooms by CHART.JS api visziluation-->
  <script>
    var xyValues = [{
        x: 50,
        y: 7
      },
      {
        x: 60,
        y: 8
      },
      {
        x: 70,
        y: 8
      },
      {
        x: 80,
        y: 9
      },
      {
        x: 90,
        y: 9
      },
      {
        x: 100,
        y: 9
      },
      {
        x: 110,
        y: 10
      },
      {
        x: 120,
        y: 11
      },
      {
        x: 130,
        y: 14
      },
      {
        x: 140,
        y: 14
      },
      {
        x: 150,
        y: 15
      }
    ];
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
