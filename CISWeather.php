<?php
  $locationinfo = file_get_contents("https://ip.briantafoya.com/json");
  $parsed_location=json_decode($locationinfo);
  $city = $parsed_location->{'geodata'}->{'city'}->{'names'}->{'en'};
  $Stateinfo=$parsed_location->{'geodata'}->{'subdivisions'};
  $state=$Stateinfo[0]->iso_code;
  $lt=$parsed_location->{'geodata'}->{'location'}->{'latitude'};
  $lg=$parsed_location->{'geodata'}->{'location'}->{'longitude'};
 
  $radius=500;
  $locationinfo2 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lt,$lg&radius=$radius&key=AIzaSyCbaWdlPCEYRrqggKX4kE_OVwddK0h1BpY");
  $parsed_location2=json_decode($locationinfo2);
  $placeinfo=$parsed_location2->{'results'};
  $dlt=$placeinfo[2]->{'geometry'}->{'location'}->{'lat'};
  $dlg=$placeinfo[2]->{'geometry'}->{'location'}->{'lng'};
  
  $json_string = file_get_contents("http://api.wunderground.com/api/aaad4f04f43767be/geolookup/conditions/q/$state/$city.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  //echo "Current temperature in ${location} is: ${temp_f}\n";

  $distance = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$dlt,$dlg&destinations=$lt,$lg&key=AIzaSyAHh5z_t5ophKURSNuyjBsSywIQivotQOU");
  $parsed_distance=json_decode($distance);
  //echo $distance;
  echo $locationinfo;
  
  
  
?>