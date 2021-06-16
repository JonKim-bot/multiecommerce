    <div id="piechart" style="width:  100%;height:500px"></div>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    </script>
