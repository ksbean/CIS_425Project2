<?php

session_start();
$bool=0;

$user=$_SESSION['username'];
$rad=htmlspecialchars($_POST['radius']);
$cat=htmlspecialchars($_POST['cat_select_val']);
$_SESSION['radius']=$rad;
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
echo "<header></header>";
echo "<body><h1 style=' text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;
	 text-align:center;
	 font-size:2em;'>Current temperature in {$location} is {$temps}.<br> Current weather condition is {$temp_f}</h1></body>";
	$_SESSION['city']=$location;
	$_SESSION['weather']=$temp_f;
	$_SESSION['state']=$state;
 $locationinfo2 = file_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lt,$lg&radius=$rad&key=AIzaSyCbaWdlPCEYRrqggKX4kE_OVwddK0h1BpY");
 $parsed_location2=json_decode($locationinfo2,true);
 //$dlt=$placeinfo[2]->{'geometry'}->{'location'}->{'lat'}; // save later when using dist. API 

$count=count($parsed_location2['results']); //counts how many places found within user's radius entry
//echo '<pre>' . print_r($parsed_location2, true) . '</pre>'; //see json file in array mode (testing purposes, rmv l8tr)

function det_weath($temp_f,$temps,$chnce_of_rain){
    
    if($temp_f=="partlycloudy"){
        if($temps > 70 && $chnce_of_rain <=50){
            return false;
        }
    
        else{
            return true;
        }
    }
    
    else if($temp_f=="sunny"){
        if($temps > 70){
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="chanceflurries"){
        if($temps > 32){
            return false;
        }
    
        else{
            return true;
        }
    }
    
    
    else if($temp_f=="chancerain"){
        if($temps > 70 && $chnce_of_rain <20){
            return false;
        }
    
        else{
            return true;
        }
    }
    else if($temp_f=="chancesleet"){
        if($temps >= 32 && $chnce_of_rain < 20){
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

echo"<link rel='stylesheet' href='../Styles/IndexStyles.css'>
<form id='form4' class='Uform' style='width: 70%; ' name='form4' method='post' action='display_location.php'><ul id='matchlist'>";
$notfound=0;
$ttl=0;


for($a=0;$a<$count;$a++){
    $total=count($parsed_location2['results'][$a]['types']);
    for($b=0;$b<$total;$b++){
        $ttl++;
    }
}

for($i=0;$i<$count;$i++)
{
	$count2=count($parsed_location2['results'][$i]['types']);
    
    $name=$parsed_location2['results'][$i]['name'];
	
	for($j=0;$j<$count2;$j++){
        $type=$parsed_location2['results'][$i]['types'][$j]; //finds category type 
        
        //If conditions are bad skip outside entertainment
       if($type=="park" || $type=="beach" || $type=='outside' && det_weath( $temp_f,$temps,$chnce_of_rain)){ 
            ;
            $bool=1;

        }
        //if not, list how many miles away/ duration to get to the place

		else if(strpos($cat,$type)!==false && $bool==0){ 
			$lat=$parsed_location2['results'][$i]['geometry']['location']['lat'];
			$lon=$parsed_location2['results'][$i]['geometry']['location']['lng'];
			echo"<input  type='radio' name='choicebtn' style='padding-left:0px;'class='choicebtn' value='{$lat} {$lon} {$name} {$type}' required>{$name}, {$type}</input>";
			$distance = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$lt,$lg&destinations=$lat,$lon&key=AIzaSyAHh5z_t5ophKURSNuyjBsSywIQivotQOU");
            $parsed_distance=json_decode($distance,true);

            $dist=$parsed_distance['rows'][0]['elements'][0]['distance']['text'];  //print distance of place

            $dur=$parsed_distance['rows'][0]['elements'][0]['duration']['text'];  //print duration from current location 

            echo "{$dist}, {$dur} away. <br>";
			$bool=1;
        }
        else if(strpos($cat,$type)===false) // if no place specified by the category filter  is found within the area 
        {
           // echo "No results found";
            $notfound++;
        }
    }

    $bool=0;
}

// no results found for any of the local places searched by the category type from the user
if($notfound==$ttl){
    echo"No results found, please choose a different category.";
}
else{
echo"<button id='S4' class='sub' type='submit' name='submit' style='cursor: pointer;'>Submit</button>";
echo"</ul> </form>";
}
?>

<!Doctype html> 
<head> <link rel="stylesheet" href="../Styles/IndexStyles.css"> </head> 
<footer> 
<button id="sub" type="button" onclick="goBack()">Go Back</button>

<script>
function goBack() {
    window.history.back();
}
</script>

</footer> 
</html> 