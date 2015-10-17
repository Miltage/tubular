<?php

$id = $_GET['id'];

$dur = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$id&key=AIzaSyAYEcNZotSnian0q-Lu-LQz8SJh0z4-6M0");

$duration =json_decode($dur, true);
foreach ($duration['items'] as $vidTime) {
   	$time = $vidTime['contentDetails']['duration'];
}

preg_match("/([0-9].?)(?=H)+/", $time, $matches);
$hours = count($matches)>1?$matches[0]:0;
preg_match("/([0-9].?)(?=M)+/", $time, $matches);
$minutes = count($matches)>1?$matches[0]:0;
preg_match("/([0-9].?)(?=S)+/", $time, $matches);
$seconds = count($matches)>1?$matches[0]:0;

$seconds += $hours*3600+$minutes*60;
echo $seconds;