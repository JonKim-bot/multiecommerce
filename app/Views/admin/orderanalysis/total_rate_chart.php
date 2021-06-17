    <div id="piechart" style="width:  100%;height:500px"></div>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Hour', 'Total Number Of Orders'],
          <?php foreach($total_rate as $row){ ?>
             ["<?= $row['hour'] ?>", <?= $row['total'] ?>],
          <?php } ?>
        ]);

        var options = {
          title: 'Average Orders On each hours',
          pieStartAngle: 100,

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script> -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Hour", "Total Number Of Orders", { role: "style" } ],
        <?php foreach($total_rate as $row){ ?>
             ["<?= $row['hour'] ?>", <?= $row['total'] ?>,"#b87333"],
          <?php } ?>
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: 'Average Orders On each hours',

      };
      var chart = new google.visualization.ColumnChart(document.getElementById("piechart"));
      chart.draw(view, options);
  }
  </script>