<?php
session_start();
$dbCon = mysqli_connect("localhost", "root", "pa55word", "userinfo");
		if (mysqli_connect_errno()){
			echo "CONNECTION FAILED";
			echo "<br>" + mysqli_connect_errno(); 
		}
		else{
			if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])) { 
			$username=strip_tags($_POST['username']);
			htmlspecialchars($username);
			$username=trim($username);					//ALL SECURITY MEASURES
			$username=stripslashes($username);
			
			$password=strip_tags($_POST['password']);
			htmlspecialchars($password);
			$password=trim($password);					//ALL SECURITY MEASURES
			$password=stripslashes($password);
			if (isset($_POST['twone'])){
			$twen=1;
			$_SESSION['twen']=$twen;
			}
			else{
			$twen=0;
			$ins = "INSERT INTO `users`(`username`, `password`, `twentyone`) VALUES ('$username','$password','$twen')";
			$mysqlbit= mysqli_query($dbCon,$ins);
			}
			header("Location: Form.html");
		}
		}
?>
