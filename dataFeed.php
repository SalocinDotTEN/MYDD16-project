<?php
header("Content-type: text/json");
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
echo json_encode($dataFeed);
?>