<?php
//Connects to your Database 
$db_test = mysqli_connect("localhost", "xkelnren_test", "PwdTest", "xkelnren_test"); 
// mysql_select_db("database name") or die(mysql_error()); 

 //checks cookies to make sure they are logged in 
 if(isset($_COOKIE['XKels_cookie'])){ 

 	$username = $_COOKIE['XKels_cookie']; 
 	$pass = $_COOKIE['Xkels_key']; 
 	$check = mysqli_query($db_test, "SELECT * FROM users WHERE username = '$username'")or die(mysql_error()); 

 	while($info = mysqli_fetch_array( $check )){ 

		//if the cookie has the wrong password, they are taken to the login page 
 		if ($pass != $info['password']){
			header("Location: login.php"); 
 		}
		//otherwise they are shown the admin area
		else{
		
 			 echo "Admin Area<p>"; 
     echo "Your Content<p>"; 
     echo "<a href=logout.php>Logout</a>"; 
 		}
	}
}

 else{ //if the cookie does not exist, they are taken to the login screen 
	header("Location: login.php"); 
 }
 ?>
