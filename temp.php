<?php
 
$dataPoints = array( 
	array("x" => 1514485800000, "y" => array(54.15 ,54.55 ,53.65 ,53.85)),
	array("x" => 1514399400000, "y" => array(54.6 ,54.7 ,53.75 ,54.15)),
	array("x" => 1514313000000, "y" => array(55.4 ,55.5 ,54.05 ,54.85))
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    zoomEnabled: true,
    theme: "dark1",
    exportEnabled: true,
    exportFileName: "Peradot Price List",
    textColor: "black",
	title: {
		text: "PeraCoinPriceList"
	},
	subtitles: [{
		text: "Currency in USDT"
	}],
	axisX: {
        tickColor: "green",
		valueFormatString: "DD MMM"
	},
	axisY: {
        tickColor: "green",
		prefix: "$ "
	},
	data: [{
		type: "candlestick",
		xValueType: "dateTime",
		yValueFormatString: "#,$ ##0.00",
		xValueFormatString: "DD MMM",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}],

});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>