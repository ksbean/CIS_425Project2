<?php

session_start();
$bool=0;
$rad=htmlspecialchars($_POST['radius']);
$cat=htmlspecialchars($_POST['cat_select_val']);
//echo $cat;
// IDs your current location 
$locationinfo = file_get_contents("https://ip.briantafoya.com/json");
 $parsed_location=json_decode($locationinfo);
 $city = $parsed_location->{'geodata'}->{'city'}->{'names'}->{'en'};
 $Stateinfo=$parsed_location->{'geodata'}->{'subdivisions'};
 $state=$Stateinfo[0]->iso_code;
 $lt=$parsed_location->{'geodata'}->{'location'}->{'latitude'};
 $lg=$parsed_location->{'geodata'}->{'location'}->{'longitude'}; echo"<br>";

//get weather condition based on current city/state

$json_string = file_get_contents("http://api.wunderground.com/api/aaad4f04f43767be/geolookup/conditions/q/$state/$city.json");
$parsed_json = json_decode($json_string);
$location = $parsed_json->{'location'}->{'city'};
$temp_f = $parsed_json->{'current_observation'}->{'icon'}; //weather condition i.e. cloudy
$temps=(int)$parsed_json->{'current_observation'}->{'temp_f'}; //actual temp (in deg)
$chnce_of_rain=(int)$parsed_json->{'current_observation'}->{'precip_today_metric'}; //% chance of rain

echo "current temperature in {$location} is: {$temps}. Current Weather codition: {$temp_f} <br>";

 $locationinfo2 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lt,$lg&radius=$rad&key=AIzaSyCbaWdlPCEYRrqggKX4kE_OVwddK0h1BpY");
 $parsed_location2=json_decode($locationinfo2,true);
 //$dlt=$placeinfo[2]->{'geometry'}->{'location'}->{'lat'}; // save later when using dist. API 

$count=count($parsed_location2['results']); //counts how many places found within user's radius entry
//echo '<pre>' . print_r($parsed_location2, true) . '</pre>'; //see json file in array mode (testing purposes, rmv l8tr)

function det_weath($temp_f,$temps,$chnce_of_rain){
    
    if($temp_f=="partlycloudy")
    {
        if($temps > 70 && $chnce_of_rain <=50)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    else if($temp_f=="sunny")
    {
        if($temps > 70)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="chanceflurries")
    {
        if($temps > 32)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="chancerain")
    {
        if($temps > 70 && $chnce_of_rain <20)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    else if($temp_f=="chancesleet")
    {
        if($temps >= 32 && $chnce_of_rain < 20)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    else if($temp_f=="chancesnow")
    {
        if($temps > 32)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="chancestorms")
    {
        if($temps > 70 || $chnce_of_rain<20)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="clear")
    {
        if($temps > 70 || $chnce_of_rain <=50)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="cloudy")
    {
        if($temps > 70 || $chnce_of_rain <=50)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    else if($temp_f=="flurries")
    {
        if($temps > 32)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="fog")
    {
        if($temps > 70)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="hazy")
    {
        if($temps > 70  && $temps <=95 || $chnce_of_rain<=50)
        {
            return false;
        }
    
        else{
            return false;
        }
    }
    
    
    else if($temp_f=="mostlycloudy")
    {
        if($temps > 70 || $chnce_of_rain <=50)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="mostlysunny")
    {
        if($temps > 70 && $temps <=95 || $chnce_of_rain<=50)
        {
            return false;
        }
    
        else{
            //do something else that's warmer
        }
    }
    
    
    else if($temp_f=="partlysunny")
    {
        if($temps > 70 && $temps <=95 || $chnce_of_rain<50)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    else if($temp_f=="snow")
    {
        if($temps > 32)
        {
        return false;
        }
    
        else{
            //do something else that's warmerr
            return true;
    
        }
    }
    else if($temp_f=="sunny")
    {
        if($temps > 70 && $temps <=95 || $chnce_of_rain<=50)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    else if($temp_f=="tstorms")
    {
        if($temps > 70  && $chnce_of_rain <=50)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    else if($temp_f=="unkown")
    {
        if($temps > 70)
        {
            return false;
        }
    
        else{
            return true;
        }
    }
    
    }

for($i=0;$i<$count;$i++){
	$count2=count($parsed_location2['results'][$i]['types']);
	
	$name=$parsed_location2['results'][$i]['name'];
	
	for($j=0;$j<$count2;$j++){
		$type=$parsed_location2['results'][$i]['types'][$j]; //finds category type 
        //If conditions are bad skip outside entertainment
         

        if($type=="Restaurant" || $type=="restaurant" && det_weath( $temp_f,$temps,$chnce_of_rain)){
        
            echo" hit, bitch <br>";
            $bool=1;

        }
		if(strpos($cat,$type) && $bool==0){
			$lat=$parsed_location2['results'][$i]['geometry']['location']['lat'];
			$lon=$parsed_location2['results'][$i]['geometry']['location']['lng'];
			echo "{$name}, ";
			echo "{$type}<br>";
			echo "{$lat}, ";
			echo "{$lon} <br>";
			$distance = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$lt,$lg&destinations=$lat,$lon&key=AIzaSyAHh5z_t5ophKURSNuyjBsSywIQivotQOU");
            $parsed_distance=json_decode($distance,true);

            $dist=$parsed_distance['rows'][0]['elements'][0]['distance']['text'];  //print distance of place

            $dur=$parsed_distance['rows'][0]['elements'][0]['duration']['text'];  //print duration from current location 

            echo "{$dist}, {$dur} away. <br>";
			$bool=1;
        }
    
	}
	$bool=0;
}


?>