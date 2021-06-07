<?php require '../header/manheader.php';?>

      <div class="row w-100 text-dark">

        <div class="container">
          <hr>
          <h4 class="display-6 mr-10" style="font-weight:bold; color:black;">Reports</h1>
            <hr>
        </div>
        <div class="container">
          <h6 class="display-6 mr-5" style="color:black;">Monthly</h1>
            <hr>
        </div>

        <div class="d-flex">
          <div class="container row">
            <div class="p-2 ml-10">
              <div id="piechart">Montly salary for Rezervation</div>
              <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            </div>
          </div>
          <div class="container row">
            <div class="p-2"><canvas id="myChart" style="height:300px; width:300px"></canvas></div>
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
        ['Empty', 8],
        ['Full', 2],
        ['Reserved', 4]
      ]);

      // Optional; add a title and set the width and height of the chart
      var options = {
        'title': 'Montly Room situation',
        'width': 1000,
        'height': 1000
      };

      // Display the chart inside the <div> element with id="piechart"
      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
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

    new Chart("myChart", {
      type: "scatter",
      data: {
        datasets: [{
          pointRadius: 4,
          pointBackgroundColor: "rgb(0,0,255)",
          data: xyValues
        }]
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            ticks: {
              min: 40,
              max: 160
            }
          }],
          yAxes: [{
            ticks: {
              min: 6,
              max: 16
            }
          }],
        }
      }
    });
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
