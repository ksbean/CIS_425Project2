<?php
if (isset($_POST['submit'])) {
$choice=strip_tags($_POST['choicebtn']);
$first=strpos ($choice ," ");
$second=strpos ($choice ," ",$first+1);
$latlonar=explode (" " ,$choice);
$choice1=substr($choice,$second);
echo "<!DOCTYPE html>
<html>
  <head>
  <link rel='stylesheet' href='../Styles/IndexStyles.css'>
  </head>
  <body>
    <h3>$choice1</h3>
	<h3> Latitude: $latlonar[0], Longitude: $latlonar[1]</h3>
    <div id='map'></div>
	  <script>
      function initMap() {
        var uluru = {lat: {$latlonar[0]}, lng: {$latlonar[1]}};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
		  center:uluru,
          
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });

      }
    </script>
	<script async defer src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDT3D0049OCasuIhyeOzTHDuRRfppcMM74&callback=initMap'
  type='text/javascript'></script>
  </script>
  <form id='form1' class='Uform' name='form1' method='post' action='Index.html'>
        <button id='S1' class='sub' type='submit' name='submit' style='cursor: pointer;'>Search</button>

  </body>
</html>";
}
//AIzaSyDT3D0049OCasuIhyeOzTHDuRRfppcMM74
?>