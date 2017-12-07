<?php
$app_key="ZJbGWj2dkmj7csbq";
$locationinfo = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&type=restaurant&keyword=cruise&key=AIzaSyCbaWdlPCEYRrqggKX4kE_OVwddK0h1BpY");
  $parsed_location=json_decode($locationinfo);
  //http://api.eventful.com/rest/
//ZJbGWj2dkmj7csbq
echo $locationinfo;
?>
