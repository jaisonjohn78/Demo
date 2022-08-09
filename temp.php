<?php

include './config.php';
include './function.php';

$fetch_chart = mysqli_query($con, "SELECT * FROM peracoin");
$chart_data = array();

while ($row = mysqli_fetch_array($fetch_chart)) {
	$chart_data[] = array(
		 intval($row['timestamp']),
		 intval($row['open']),
		 intval($row['high']),
		 intval($row['low']),
		 intval($row['close'])
	);
  $chart_datas = json_encode($chart_data);
}




?>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
    <script src="https://code.highcharts.com/stock/modules/data.js"></script>
    <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/stock/modules/hollowcandlestick.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <style>
      .highcharts-credits {
        display: none;
    }
    </style>


<div id="container"></div>
<?php



?>
<script>
  var json_encode = <?php echo $chart_datas; ?>;

Highcharts.getJSON('results.json' , function (data) {
  Highcharts.stockChart('container', {
    rangeSelector: {
      selected: 1
    },
    navigator: {
      series: {
        color: Highcharts.getOptions().colors[0]
      }
    },
    series: [{
      type: 'hollowcandlestick',
      name: 'Peracoin Price',
      data: data
    }]
  });
});
</script>
