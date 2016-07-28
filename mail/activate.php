<?php

/* Email activation code - After clicking the Verify button on activation mail */
    session_start();
	include_once( '../omhconnection.php');

	$msg='';
	$verified = '';
	if(isset($_SESSION['store'])) //email ID sent through session variable - store defined in index.php
	{
		$email=$_SESSION['store'];
		$query = "SELECT * FROM users WHERE email='$email'";
		$stmt = $mysqli->prepare($query);
		$stmt->execute();	
		$res = $stmt->get_result();
		$row = $res->fetch_array(MYSQLI_ASSOC);
		$verified = $row['verified'];
		$num = $res->num_rows;

		if($num == 1 && $verified == 0)
		{
			$query = "UPDATE users SET verified='1' WHERE email='$email'";
			$stmt = $mysqli->prepare($query);
			$stmt->execute();	
			$msg="Your account is activated"; 
		}
		else if($verified == 1)
		{	
			$msg ="Your account is already active, no need to activate again";
		}
        else {$msg = "Invalid Email ID1";}
        echo $msg;
    } 
    else {echo "Invalid email ID";}
?>