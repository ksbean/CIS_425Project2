<?php
session_start();


// IDs your current location 
  $locationinfo = file_get_contents("https://ip.briantafoya.com/json");
 
  $parsed_location=json_decode($locationinfo);
  $_SESSION['psl']=$parsed_location;

  $city = $parsed_location->{'geodata'}->{'city'}->{'names'}->{'en'};
  $_SESSION['cit']=$city;

  $Stateinfo=$parsed_location->{'geodata'}->{'subdivisions'};

  $state=$Stateinfo[0]->iso_code;
  $_SESSION['state']=$state;

  $lt=$parsed_location->{'geodata'}->{'location'}->{'latitude'};

  $_SESSION['lat']=$lt;
 
  $lg=$parsed_location->{'geodata'}->{'location'}->{'longitude'}; echo"<br>";
  $_SESSION['long']=$lg;
  
  
//areas around you 

  $lg=$parsed_location->{'geodata'}->{'location'}->{'longitude'};
 
  $radius=500;
  $locationinfo2 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lt,$lg&radius=$radius&key=AIzaSyCbaWdlPCEYRrqggKX4kE_OVwddK0h1BpY");
  $parsed_location2=json_decode($locationinfo2,true);
  //$placeinfo=$parsed_location2->{'results'};
 // $types=$placeinfo->{'types'};
 //echo "<pre" .print_r($parsed_location2,true) . "</pre>";
// $types=$parsed_location2['results'][2]['types'][2]; 

 $count=count($parsed_location2); //takes count of array size from json file 
echo $count;

for($i=0;$i<$count;$i++)
{
  $type=$parsed_location2['results'][$i]['types'][0]; //finds category type 
  echo "$type <br>";
}



  //$dlt=$placeinfo[2]->{'geometry'}->{'location'}->{'lat'};

  
  
//temperature
  $json_string = file_get_contents("http://api.wunderground.com/api/aaad4f04f43767be/geolookup/conditions/q/$state/$city.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'location'}->{'city'};
  $temp_f = $parsed_json->{'current_observation'}->{'icon'};




 // echo "Current temperature in ${location} is: ${temp_f}";



/*direction dist.
  $distance = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$dlt,$dlg&destinations=$lt,$lg&key=AIzaSyAHh5z_t5ophKURSNuyjBsSywIQivotQOU");
  $parsed_distance=json_decode($distance);
  //echo $locationinfo;
 
  */
?>