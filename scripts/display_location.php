<?php
	if (isset($_POST['submit'])) {
		session_start();
		$choice=strip_tags($_POST['choicebtn']);
		$first=strpos ($choice ," ");
		$second=strpos ($choice ," ",$first+1);
		$latlonar=explode (" " ,$choice);
		$choice1=substr($choice,$second);

		$user=$_SESSION['username'];
		$cat=$latlonar[sizeof($latlonar)-1];
		$rad=$_SESSION['radius'];
		$location=$_SESSION['city'];
		$weather=$_SESSION['weather'];
		$state=$_SESSION['state'];
		$dbCon = mysqli_connect("localhost", "root","pa55word","userinfo");
		if (mysqli_connect_errno()){
			echo "CONNECTION FAILED";
			echo "<br>" + mysqli_connect_errno(); 
		}
		else{	
			$Chksql = "INSERT INTO `searches`(`radius`, `category`, `username`, `state`, `city`, `weather`)
			VALUES ('$rad','$cat','$user','$state','$location','$weather')" ;
			$mysqlbitChk= mysqli_query($dbCon,$Chksql);
			echo "
				<!DOCTYPE html>
					<html>
						<head>
						<link rel='stylesheet' href='../Styles/MapStyles.css'>
						<style>
						   #map {
							height: 400px;
							width: 100%;
						   }
						</style>
					  </head>
					  <body>
						<h3>$choice1</h3>
						<div id='map'></div>
						<script>
						  function initMap() {
							var uluru = {lat: $latlonar[0], lng: $latlonar[1]};
							var map = new google.maps.Map(document.getElementById('map'), {
							  zoom: 15,
							  center: uluru
							});
							var marker = new google.maps.Marker({
							  position: uluru,
							  map: map
							});
						  }
						</script>
						<script async defer
						src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDT3D0049OCasuIhyeOzTHDuRRfppcMM74&callback=initMap'>
						</script>
					  </body>
					</html>";
			}
	}
	mysqli_close($dbCon);
	session_destroy();
?>

<!Doctype html> 
<head> 
<link rel="stylesheet" href="../Styles/IndexStyles.css">
</head>

<footer> 
<div> <button id="sub" type"button" onclick="window.location= '../Index.html'">Logout</button>  </div> 

</footer> 

</html> 