<?php 
if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])) { 
		session_start();
		$username=strip_tags($_POST['username']);
		htmlspecialchars($username);
		$username=trim($username);					//ALL SECURITY MEASURES
		$username=stripslashes($username);
		
		$password=strip_tags($_POST['password']);
		htmlspecialchars($password);
		$password=trim($password);					//ALL SECURITY MEASURES
		$password=stripslashes($password);
		
		

		$dbCon = mysqli_connect("localhost", "root",NULL,"userinfo");
		if (mysqli_connect_errno()){
			echo "CONNECTION FAILED";
			echo "<br>" + mysqli_connect_errno(); 
		}
		else{
			$Chksql = "SELECT `username`, `password` FROM `users` WHERE `username`= '$username' AND `password`='$password'" ;
			echo $username;
			echo $password;
			$mysqlbitChk= mysqli_query($dbCon,$Chksql);	
			if(mysqli_num_rows($mysqlbitChk) == 0){
				echo "Not found";
			}
			else{
				//change location successful login store user and password
				echo"Hello";
				//Search Radius
				//what category 
				header("Location: Searchpage.html");
			} 
 			
		
		}
}
else{
echo "FAILED"; 
}

?>