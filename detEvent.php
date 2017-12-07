<?php

session_start();

$rad=htmlspecialchars($_POST['radius']);
$cat=htmlspecialchars($_POST['cat']);

$_SESSION['rad']=$rad;
$_SESSION['cat']=$cat;


$state=$_SESSION['state'];
$city=$_SESSION['cit'];
$json_string = file_get_contents("http://api.wunderground.com/api/aaad4f04f43767be/geolookup/conditions/q/$state/$city.json");
$parsed_json = json_decode($json_string);
$location = $parsed_json->{'location'}->{'city'};
$temp_f = $parsed_json->{'current_observation'}->{'icon'};
$temps=(int)$parsed_json->{'current_observation'}->{'temp_f'};
$chnce_of_rain=(int)$parsed_json->{'current_observation'}->{'precip_metric_today'};

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
    if($temps > 32 &&)
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