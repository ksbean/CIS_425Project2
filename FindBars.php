<?php
  $locationinfo = file_get_contents("https://ip.briantafoya.com/json");
  $parsed_location=json_decode($locationinfo);
  $city = $parsed_location->{'geodata'}->{'city'}->{'names'}->{'en'};
  $Stateinfo=$parsed_location->{'geodata'}->{'subdivisions'};
  $state=$Stateinfo[0]->iso_code;
  $lt=$parsed_location->{'geodata'}->{'location'}->{'latitude'};
  $lg=$parsed_location->{'geodata'}->{'location'}->{'longitude'};
  
  $locationinfo2 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lt,$lg&radius=500&key=AIzaSyCbaWdlPCEYRrqggKX4kE_OVwddK0h1BpY");
  $parsed_location2=json_decode($locationinfo2);
  $placeinfo=$parsed_location2->{'results'};
  $dlt=$placeinfo[1]->{'geometry'}->{'location'}->{'lat'};
  $dlg=$placeinfo[1]->{'geometry'}->{'location'}->{'lng'};
  


  $json_string = file_get_contents("http://api.wunderground.com/api/aaad4f04f43767be/geolookup/conditions/q/$state/$city.json");
  
  $distance = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$dlt,$dlg&destinations=$lt,$lg&key=AIzaSyAHh5z_t5ophKURSNuyjBsSywIQivotQOU");
  $parsed_distance=json_decode($distance);
  echo $distance;
?>