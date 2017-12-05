<?php
  $locationinfo = file_get_contents("https://ip.briantafoya.com/json");
  $parsed_location=json_decode($locationinfo);
  $city = $parsed_location->{'geodata'}->{'city'}->{'names'}->{'en'};
  $Stateinfo=$parsed_location->{'geodata'}->{'subdivisions'};
  $state=$Stateinfo[0]->iso_code;
  
  $json_string = file_get_contents("http://api.wunderground.com/api/aaad4f04f43767be/geolookup/conditions/q/$state/$city.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'temp_f'};
  echo "Current temperature in ${location} is: ${temp_f}\n";
  //echo $json_string;
 // echo $json_string;

 //tried a new commit 3;43
