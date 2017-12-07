<?php

session_start();

$rad=htmlspecialchars($_POST['radius']);
$cat=htmlspecialchars($_POST['cat']);

$_SESSION['rad']=$rad;
$_SESSION['cat']=$cat;

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

echo "current temperature in {$location} is: {$temps} with weather condition as: {$temp_f} <br>";

 $locationinfo2 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lt,$lg&radius=$rad&key=AIzaSyCbaWdlPCEYRrqggKX4kE_OVwddK0h1BpY");
 $parsed_location2=json_decode($locationinfo2,true);
 //$dlt=$placeinfo[2]->{'geometry'}->{'location'}->{'lat'}; // save later when using dist. API 

$count=count($parsed_location2)-1; //takes count of array size from json file 
echo "$count <br>";

echo" <br>";
echo "<br>";

echo '<pre>' . print_r($parsed_location2, true) . '</pre>';
for($i=0;$i<$count;$i++)
{
 $type=$parsed_location2['results'][$i]['types'][0]; //finds category type 
 echo "$type <br>";
}




 
 

if($temp_f=="partlycloudy")
{
    if($temps > 70 && $chnce_of_rain <=50)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}

else if($temp_f=="sunny")
{
    if($temps > 70)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="chanceflurries")
{
    if($temps > 32)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="chancerain")
{
    if($temps > 70 && $chnce_of_rain <20)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="chancesleet")
{
    if($temps >= 32 && $chnce_of_rain < 20)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}

else if($temp_f=="chancesnow")
{
    if($temps > 32)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="chancestorms")
{
    if($temps > 70 && $chnce_of_rain<20)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="clear")
{
    if($temps > 70)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="cloudy")
{
    if($temps > 70 && $chnce_of_rain <=50)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="flurries")
{
    if($temps > 32)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="fog")
{
    if($temps > 70)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="hazy")
{
    if($temps > 70  && $temps <=95)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="mostlycloudy")
{
    if($temps > 70 && $chnce_of_rain <=50)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="mostlysunny")
{
    if($temps > 70 && $temps <=95)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="partlysunny")
{
    if($temps > 70 && $temps <=95)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}

else if($temp_f=="snow")
{
    if($temps > 32)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}


else if($temp_f=="sunny")
{
    if($temps > 70 && $temps <=95)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}

else if($temp_f=="tstorms")
{
    if($temps > 70  && $chnce_of_rain <=50)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}

else if($temp_f=="unkown")
{
    if($temps > 70)
    {
        //do outdoor shit 
    }

    else{
        //do something else that's warmer
    }
}

//using weather API to determine what place/thing to do based on location & radius

//weather API to determine temp & condition 

?>