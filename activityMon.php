<!DOCTYPE html>
<?php
$activityFeed = file_get_contents('http://smartapp.jios.org/actio/Api/getjsondata/activity/?c=*'); 
$feedArray = json_decode($activityFeed, true);
foreach ($feedArray['chartdata'] as $key => $value) {
	unset($value['id']);
	$feedArray[] = $value;
	unset($feedArray['chartdata'][$key]);
}
unset($feedArray['chartdata']);
$dataFeed = array_fill(0, 19, 0);
foreach ($feedArray as $perFeed) {
	$feedCache = array_values($perFeed);
	foreach ($feedCache as $cacheKey => $cacheVal) {
		$dataFeed[$cacheKey] += (int)$cacheVal;
	}
}
?>
<html lang="en">
<head>
	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<div id="historyGraph"></div>
	<!--  Scripts-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="js/init.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script>
	$(document).ready(function() {
		historyGraph = new Highcharts.Chart({
			chart: {
				renderTo: 'historyGraph',
				height: 600,
				type: 'bar'
 			// events: {
 				// load: requestData
 			// }
 		},
 		title: {
 			text: 'Activity Monitor'
 		},
 		xAxis: {
 			tickInterval: 1,
 			minorTickLength: 1,
 			minorTickInterval: 1,
 			categories: ['Sitting','Standing','Lying on back','Lying on right side','Ascending stairs','Descending stairs','Standing in an elevator still','Moving around in an elevator','Walking in a parking lot','Treadmill 4 km/h flat','Treadmill 15 deg inclined','Running on a treadmill with a speed of 8 km/h','Exercising on a stepper','exercising on a cross trainer','Exercise bike horizontal','Exercise bike vertical','Rowing','Jumping','Playing basketball']
 		},
 		yAxis: {
 			title: {
 				text: 'No. of Activities'
 			}
 		},
 		series: [{
 			name: 'Me',
 			// data: []
					// data: DataResult.random.data
					data: [<?php echo implode($dataFeed, ','); ?>]
				}]
			});
 	// setTimeout(historyGraph.redraw(), 3000);
 	// setTimeout("location.reload(true);", 3000);
 });
</script>

</body>
</html>
