<?php

 /* Send periodic notification after every 60 days. And delete unverified email after 7 days on click of subscription */
    session_start();
   	include_once('../omhconnection.php');
   	include_once('sendmail.php');
                 
    $name = "Online Mechanic Hub Email Service";
    $from = "no-reply@online-mechanic-hub.com";
    

    // 8888888888888888888888888888888 Delete who didn't activate their account within 7 days 88888888888888888888888888

    $query = "select * from users where verified='0'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();   
    $res = $stmt->get_result();
    $num = $res->num_rows;
    $subject = "Online Mechanic Hub | Activation link Expired";

    if($num > 0){
        while( $row= $res->fetch_array(MYSQLI_ASSOC)) {
            $c = $row['modified'];        //fetches  $timestamp = "2012-04-02 02:57:54"
            $email = $row['email'];
            $datetime = explode(" ",$c);
            $date = $datetime[0];            //$time = $datetime[1];
            echo  "\nUser date :" .$date;
                
            $currentDate = date("Y/m/d");
            echo "\tcurrent date : ".$currentDate;

            $date1 = $date;
            $date2 = $currentDate;
            
            $diff = abs(strtotime($date2) - strtotime($date1));
            $years = floor($diff / (365*60*60*24));
            $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
            $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

            printf("\t%d years, %d months, %d days\n", $years, $months, $days);  

            $message = "";
            $message = "Hello OMH subscriber, ";
            $message .= "<br/><br/>You did not activate your OMH subscription within 1 week. In order to avail OMH email service subscribe again.";
            $message .= "<br/><br/><br/><br/>". "Thank you. Have a nice day.<br/><br /><br />";
            $message .= "Kind regards,<br />";
            $message .= "<a href='http://omh.com/'>Online Mechanic Hub</a><br /><br /><br />";

            if($days == 7) {
                $query = "Delete from users where email='$email'";
                $stmt = $mysqli->prepare($query);
                $stmt->execute();
                $recipient_email = $email;
             
                // send email using php mailer library
                if(phpmailerfun($from, $from, $name, $subject, $message, $recipient_email)){
                   echo "\nNon-activation link removal email sent to <b>" . $recipient_email . "</b>";}
            } //if(days) end 
        } //while loop end
    } // if(num) end
    else {echo "No records to delete due to non-activation within 1 week.";}



    // 88888888888888888888888888888888888888888 Send Periodic notifications 88888888888888888888888888888888888888

   	$query = "select * from users where verified='1'";
   	$stmt = $mysqli->prepare($query);
	$stmt->execute();	
	$res = $stmt->get_result();
	$num = $res->num_rows;

    $subject = "Online Mechanic Hub | Service Reminder";  //For email

	if($num > 0){
        while( $row= $res->fetch_array(MYSQLI_ASSOC)) {
            $c = $row['modified'];        //fetches  $timestamp = "2012-04-02 02:57:54"
            $email = $row['email'];
			$datetime = explode(" ",$c);
			$date = $datetime[0];            //$time = $datetime[1];
			echo  "\nUser date :" .$date;
				
            $currentDate = date("Y/m/d");
            echo "\tcurrent date : ".$currentDate;

            $date1 = $date;
            $date2 = $currentDate;
            
			$diff = abs(strtotime($date2) - strtotime($date1));
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

			printf("\t%d years, %d months, %d days\n", $years, $months, $days);

		    $inbetween = "omh/src/";  //before mail/unsubscribe.php and after server name .. write inbetween names. End with slash  
			$link = "http://$_SERVER[SERVER_NAME]/".$inbetween."mail/unsubscribe.php"; 
            $_SESSION['store'] = $email;

			$message = "";
			$message = "Hello OMH user, ";
   		    $message .= "<br/><br/>Your monthly reminder for servicing of your vehicle has arrived. Please service your vehicle for proper maintenance.";
   		    $message .= "<br/><br/><br/><br/>". "Thank you. Have a nice day.<br/><br /><br />";
   		    $message .= "Kind regards,<br />";
    	    $message .= "<a href='http://omh.com/'>Online Mechanic Hub</a><br /><br /><br />";
			$message .= "<a href='{$link}'>Unsubscribe</a><br /><br /><br />";

			if($days%60 == 0) {
				$recipient_email = $email;
             
    		    // send email using php mailer library
    		    if(phpmailerfun($from, $from, $name, $subject, $message, $recipient_email)){
        		   echo "Monthly reminder sent to <b>" . $recipient_email . "</b>";}
			} //if(days) end 
        } //while loop end
    } // if(num) end
    else {echo "No notification date arrival for any user.";}

?>