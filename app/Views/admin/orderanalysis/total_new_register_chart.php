
<div id="order_chart" style="width: 100%;500px"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Date', 'New Register'],
      <?php foreach($total_new_register as $row){ ?>
        ["<?= $row['created_at'] ?>", <?= $row['total'] ?>],
        <?php } ?>
    ]);

    var options = {
      title: 'New Register Member',
      curveType: 'function',
    };
    var chart = new google.visualization.LineChart(document.getElementById('order_chart'));

    chart.draw(data, options);
}
</script>
    