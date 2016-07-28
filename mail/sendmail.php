<?php
/* To send mail through PHP Mailer func using Google SMTP Server */

require_once('PHPMailer/PHPMailerAutoload.php');

//Create a new PHPMailer instance
function phpmailerfun($from, $reply, $name, $subject, $content, $to) {
	$mail = new PHPMailer;
	$mail->IsSMTP(); // enable SMTP
	//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 465; // or 587
	$mail->IsHTML(true);
	$mail->Username = "onlinemechanichub@gmail.com";
	$mail->Password = "maitreyi"; //Set who the message is to be sent from; sender's email address and name
	$mail->SetFrom($from, $name);  //Set an alternative reply-to address and username
	$mail->addReplyTo($reply, $name); //Set who the message is to be sent to
	$mail->addAddress($to, $name); //Set the subject line
	$mail->Subject = $subject;
	$mail->Body = $content;

	if ($mail->send()) {  //On successful sent message - return 1 else 0
    	return 1; } 
    else { return 0; }
    
} //func end

?>