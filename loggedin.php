<!DOCTYPE html>
<?php
// $activityFeed = file_get_contents('http://smartapp.jios.org/actio/Api/getjsondata/activity/?c=*'); 
// $feedArray = json_decode($activityFeed, true);
// foreach ($feedArray['chartdata'] as $key => $value) {
// 	unset($value['id']);
// 	$feedArray[] = $value;
// 	unset($feedArray['chartdata'][$key]);
// }
// unset($feedArray['chartdata']);
// $dataFeed = array_fill(0, 19, 0);
// foreach ($feedArray as $perFeed) {
// 	$feedCache = array_values($perFeed);
// 	foreach ($feedCache as $cacheKey => $cacheVal) {
// 		$dataFeed[$cacheKey] += (int)$cacheVal;
// 	}
// }
?>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
	<title>Actio -- The Best Posture</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
	<nav class="light-blue lighten-1" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Actio</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="loggedin.php">Dashboard</a></li>
				<li><a href="myprofile.html">My Profile</a></li>
				<li><a href="index.html">Logout</a></li>
			</ul>

			<ul id="nav-mobile" class="side-nav">
				<li><a href="loggedin.php">Dashboard</a></li>
				<li><a href="myprofile.html">My Profile</a></li>
				<li><a href="index.html">Logout</a></li>
			</ul>
			<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
		</div>
	</nav>
	<div class="section no-pad-bot" id="index-banner">
		<div class="container">
			<div class="row">
				Current Time: <span id="show-time"></span>
			</div>
			<div class="row">
				<div class="col s12 m6">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Posture Summary</span>
							<p id="curPosture"></p>
						</div>
					</div>
				</div>
				<div class="col s12 m6">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Suggested Posture</span>
							<p id="suggestPosture"></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12">
					<div class="card blue-grey darken-1">
						<div class="card-content white-text">
							<span class="card-title">Health Performance</span>
							<div class="row">
								<div class="col s12 m12">
									<div class="card accent-4 center-align" id="healthStatus"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="card" id="history-graph"></div>
			</div>
		</div>

		<footer class="page-footer orange">
			<div class="container">
				<div class="row">
					<div class="col l6 s12">
						<h5 class="white-text">About This</h5>
						<p class="grey-text text-lighten-4">Our service helps you achieve the correct posture.</p>
					</div>
					<div class="col l3 s12">
						<h5 class="white-text"></h5>
					</div>
					<div class="col l3 s12">
						<h5 class="white-text">Connect</h5>
						<ul>
							<li><a class="white-text" href="#!">Twitter</a></li>
							<li><a class="white-text" href="#!">Facebook</a></li>
							<li><a class="white-text" href="#!">LinkedIn</a></li>
							<li><a class="white-text" href="#!">Google Plus</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="footer-copyright">
				<div class="container">
					Skin by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
				</div>
			</div>
		</footer>


		<!--  Scripts-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://cdn.rawgit.com/tunnckoCore/randomorg-js/master/dist/randomorg-js.js"></script>
		<script>
		function startTime() {
			var today = new Date();
			var h = today.getHours();
			var m = today.getMinutes();
			var s = today.getSeconds();
			h = checkTime(h);
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('show-time').innerHTML =
			h + ":" + m + ":" + s;
			var t = setTimeout(startTime, 500);
		}
		function checkTime(i) {
			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
		}

		// function requestData(){
		// 	var JsonApi = new RandomJs();
		// 	var DataResult = JsonApi
		// 	.apikey('0a217628-d8cb-46df-80a3-27f411d67a16')
		// 	.method('generateIntegers')
		// 	.params({n:19,min:0,max:50})
		// 	.post(function(xhrOrError, stream, body) {
  //       //in browser:
  //       //first argument is xhr object
  //       //second argument is null
  //       //in node:
  //       //first argument is error object or null
  //       //second argument is stream
  //       console.log('==START==')
  //       console.log('==xhrOrError==')
  //       console.log(xhrOrError)
  //       console.log('==stream==')
  //       console.log(stream)
  //       console.log('==body==')
  //       console.log(body)
  //       console.log('==END==')
  //       return body.result.random.data;
  //   });
		// }

/**
 * Request data from the server, add it to the graph and set a timeout 
 * to request again
 */
 // function requestData() {
 // 	$.ajax({
 // 		url: 'dataFeed.php',
 // 		success: function(point) {
 // 			var series = historyGraph.series[0];
 //                shift = series.data.length > 20; // shift if the series is 
 //                                                 // longer than 20

 //            // add the point
 //            // historyGraph.series[0].addPoint(point, true, shift);
 //            historyGraph.series[0].setData(point, false);
 //            historyGraph.redraw();
 //            // call it again after one second
 //            setTimeout(requestData, 3000);
 //        },
 //        cache: false
 //    });
 // }
 function showGraph() {
 	$("#history-graph").load("activityMon.php");
 	setTimeout(showGraph, 3000);
 }
 $(document).ready(function() {
 	startTime();
 	var curPosture = ['Running', 'Walking', 'Cycling', 'Lying Down'];
 	var suggestPosture = ['Straight back', 'Heel to toe', 'Sit properly', 'Ensure proper sleep position'];
 	var randomPosture = Math.floor(Math.random() * curPosture.length);
 	var healthStatus = ['Good', 'Fair', 'Poor'];
 	var healthClass = ['green', 'yellow', 'red'];
 	var randomHealth = Math.floor(Math.random() * healthStatus.length);
 	$("#curPosture").text(curPosture[randomPosture]);
 	$("#suggestPosture").text(suggestPosture[randomPosture]);
 	$("#healthStatus").text(healthStatus[randomHealth]).addClass(healthClass[randomHealth]);
 	showGraph();
 	// historyGraph = new Highcharts.Chart({
 	// 	chart: {
 	// 		renderTo: 'history-graph',
 	// 		height: 600,
 	// 		type: 'bar'
 	// 		// events: {
 	// 			// load: requestData
 	// 		// }
 	// 	},
 	// 	title: {
 	// 		text: 'Activity Monitor'
 	// 	},
 	// 	xAxis: {
 	// 		tickInterval: 1,
 	// 		minorTickLength: 1,
 	// 		minorTickInterval: 1,
 	// 		categories: ['Sitting','Standing','Lying on back','Lying on right side','Ascending stairs','Descending stairs','Standing in an elevator still','Moving around in an elevator','Walking in a parking lot','Treadmill 4 km/h flat','Treadmill 15 deg inclined','Running on a treadmill with a speed of 8 km/h','Exercising on a stepper','exercising on a cross trainer','Exercise bike horizontal','Exercise bike vertical','Rowing','Jumping','Playing basketball']
 	// 	},
 	// 	yAxis: {
 	// 		title: {
 	// 			text: 'No. of Activities'
 	// 		}
 	// 	},
 	// 	series: [{
 	// 		name: 'Me',
 	// 		// data: []
		// 			// data: DataResult.random.data
		// 			data: [<?php //echo implode($dataFeed, ','); ?>]
		// 		}]
		// 	});
 	// setTimeout(historyGraph.redraw(), 3000);
 	// setTimeout("location.reload(true);", 3000);
 });
</script>

</body>
</html>
