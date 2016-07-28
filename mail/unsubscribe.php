<?php
/* When the user clicks on Unsubscribe button on Notification mail sent through notification.php */
    session_start();
	include_once( '../omhconnection.php');

	if(isset($_SESSION['store']))
	{
		$email=$_SESSION['store']; //Session variable defined in notification.php
		$stmt = $mysqli->prepare("DELETE  FROM users WHERE email='$email' and verified='1'");
		if($stmt->execute())
		{
			echo "You have been successfully unsubscribed from the OMH service.";
		}
		else {echo "Statement not executed properly";}
		
	} 
	else {echo "Invalid Email ID!";}

    session_unset();
    session_destroy();
?>