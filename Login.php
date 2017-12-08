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
		
		

		$dbCon = mysqli_connect("localhost", "root","pa55word","userinfo");
		if (mysqli_connect_errno()){
			echo "CONNECTION FAILED";
			echo "<br>" + mysqli_connect_errno(); 
		}
		else{
			$Chksql = "SELECT `username`, `password` FROM `users` WHERE `username`= '$username' AND `password`='$password'" ;
			$mysqlbitChk= mysqli_query($dbCon,$Chksql);	
			if(mysqli_num_rows($mysqlbitChk) == 0){
				echo "Not found";
			}
			else{
				//change location successful login store user and password
				echo"Hello";
				//Search Radius
				//what category 
				$link = mysql_connect('localhost', 'root', 'pa55word');
				if (!$link) {
					die('Could not connect: ' . mysql_error());
				}
				if (!mysql_select_db('userinfo')) {
					die('Could not select database: ' . mysql_error());
				}
				$result = mysql_query("SELECT `twentyone` FROM `users` WHERE `username`= '$username' AND `password`='$password'");
				if (!$result) {
					die('Could not query:' . mysql_error());
				}
				if( mysql_result($result, 0)==0){ // outputs third employee's name
				mysql_close($link);
				header("Location: SearchpageN.html");
				}
				else{
					header("Location: Searchpage.html");
				}

							} 
							
						
						}
				}
				else{
				echo "FAILED"; 
				}

?>