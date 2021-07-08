
<div id="columnchart_values" style="width: 100%;"></div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {packages:['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Date', 'Sales'],
          <?php foreach($total_sales as $row){ ?>
            ["<?= $row['created_at'] ?>", <?= $row['total'] ?>],
            <?php } ?>
        ]);

        var options = {
          title: 'Sales',
          curveType: 'function',
        };
        var chart = new google.visualization.LineChart(document.getElementById('columnchart_values'));

        chart.draw(data, options);
    }
    </script>
        