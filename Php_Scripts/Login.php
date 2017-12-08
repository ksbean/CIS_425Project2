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
				$link = mysqli_connect("localhost","root","pa55word","userinfo");
				if (mysqli_connect_errno()){
					echo "CONNECTION FAILED";
					echo "<br>" + mysqli_connect_errno(); 
				}
				else{
					$result ="SELECT `twentyone` FROM `users` WHERE `username`= '$username' AND `password`='$password'";
					$mysqlbitChk=mysqli_query($link,$result);
					$row=$mysqlbitChk->fetch_assoc();
					if(mysqli_num_rows($mysqlbitChk)==0) //not found 
					{
						echo "not found";
						
					}
					else if($row["twentyone"]=="0") {
						header("Location: ../SearchpageN.html"); // 21 
					}

					else{
						header("Location: ../Searchpage.html"); 
					}
				}
			}
			mysqli_close();
		}
	}			
	else{
		echo "FAILED"; 
	}

?>