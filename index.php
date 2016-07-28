<?php

/* Email address Subscription code - Send activation link on mail
   Contact Us - Retrieve form data and store it in database
*/
    session_start();
    include_once( 'mail/sendmail.php');
    include_once('omhconnection.php');

    // 8888888888888888888888888 email subscription 888888888888888888888888888

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];

        if(empty($email)) {  //empty email address
            echo '<script type="text/javascript">  window.onload = function(){
                    alert("Please fill your email address."); }</script>'; 
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {  //Invalid email address format
                echo '<script type="text/javascript">  window.onload = function(){
                    alert("Your email address is not valid."); }</script>'; 
            }
        else {
            if((!$stmt1 = $mysqli->prepare("SELECT email,verified FROM users WHERE email = '$email'")))
            {
                echo "statement prepare problem";
            }
            if(!($stmt1->execute()))
            {
                echo "statement execution problem";
            }   
            $res1 = $stmt1->get_result();
            $num1= $res1->num_rows;

            if($num1 > 0){  //If email is in the database, check verified attribute.
                $row= $res1->fetch_array(MYSQLI_ASSOC);
                $c = $row['verified'];
                
                if($c == 0) {  
                    echo '<script type="text/javascript">  window.onload = function(){
                    alert("Email has already been sent to you. Please activate."); }</script>'; 
                    }
                else {
                    echo '<script type="text/javascript">  window.onload = function(){
                    alert("Your email has been already activated."); }</script>'; 
                    }
            }
            else {     // send the email verification link for new users

                $inbetween = "omh/src/";  //before mail/activate.php and after server name .. write inbetween names. End with slash  
                $verificationLink = "http://$_SERVER[SERVER_NAME]/".$inbetween."mail/activate.php";
                $_SESSION['store'] = $email;  //transferring the email through session variables to identify whose email to activate

                $query = "INSERT INTO users(email) VALUES('$email')";
                $stmt = $mysqli->prepare($query);
                $stmt->execute();
                 
                $htmlStr = "";
                $htmlStr .= "Hi " . $email . ",<br /><br />";
                 
                $htmlStr .= "Please click the button below to verify your subscription of Online Mechanic Hub Service.<br /><br /><br />";
                $htmlStr .= "<a href='{$verificationLink}' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
                 
                $htmlStr .= "Kind regards,<br />";
                $htmlStr .= "<a href='http://omh.com/'>Online Mechanic Hub</a><br />";
                 
                $body = $htmlStr;
                $name = "Online Mechanic Hub Email Service";
                $from = "no-reply@online-mechanic-hub.com";
                $subject = "Verification Link | Online Mechanic Hub | Subscription";
                $recipient_email = $email;
                
                // send email using php mailer library in sendmail.php
                if( phpmailerfun($from, $from, $name, $subject, $htmlStr, $recipient_email)){ 
                    echo '<script type="text/javascript">  window.onload = function(){
                    alert("A verification email has been sent to '.$email.' , please open your email inbox and click the verify button in the mail to activate."); 
                    }</script>'; 
      
                } //if end
            } //else end
        } // else if else end
    } //isset (submit of email subscription) end


    // 8888888888888888888888888 contact us 888888888888888888888888888

    if(isset($_POST['cbutton'])) {
    	$name = $_POST['name'];
    	$email = $_POST['email'];
    	$phone = $_POST['phone'];
    	$message = $_POST['message'];

        $query = "INSERT INTO contactus(name,email,phone,message) VALUES('$name','$email','$phone','$message')";
        $stmt = $mysqli->prepare($query);

        if ($stmt->execute()) {
        	echo '<script type="text/javascript">  window.onload = function(){
                    alert("Your message has been successfully recorded."); 
                    }</script>'; 
        }
    } // isset(cbutton)

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=320, height=device-height, target-densitydpi=medium-dpi" />

    <title>Online Mechanic Hub</title>   

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/style.css" >
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>

    <style>
     .navbar-custom {
    background-color:#ffae19;
    color:#000000;  
    border-radius:0;
	}

	.navbar-custom .navbar-nav > li > a {
    color:#fff;
	}

	.navbar-custom .navbar-nav > .active > a, .navbar-nav > .active > a:hover, .navbar-nav > .active > a:focus {
    color: #ffffff;
    background-color:transparent;
	}

	.navbar-custom .navbar-brand {
    color:#000000;
	}

    </style>

  </head>
  
  <body>
  
  
		<div class="row">
			<div class="col-md-12">
				<div class="foo" style="background-color:#25383C;">
					<ul class="fa-ul">
					<img src="images/wheel.gif" width="50" height="50">NLINE MECHANIC HUB</li>
					</ul>				
				</div>
	<!-- <p>	<img src="images/tyre.png" width="200" height="200"> Online Mechanic Hub </p> -->
			</div>
		</div>		
	
	<!-- CAROUSEL -->
    <div class="container-fluid" >
	<div class="row">
		<div class="col-md-12">		
			<div class="carousel slide" id="carousel-888387">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-888387" class="active"> 
					</li>
					<li data-slide-to="1" data-target="#carousel-888387" >
					</li>
					<li data-slide-to="2" data-target="#carousel-888387" 
					</li>
				</ol>
				
				<div class="carousel-inner">
					<div class="item">
						<img alt="Carousel Bootstrap First" src="images/q2.jpg" width="1270" height="300">
						
					</div>
					<div class="item active">
						<img alt="Carousel Bootstrap Second" src="images/banner1.jpg" width="1270" height="300">						
					</div>
					<div class="item">
						<img alt="Carousel Bootstrap Third" src="images/q1.jpg" width="1270" height="300">						
						</div>
					</div>
					
					
				</div> <a class="left carousel-control" href="#carousel-888387" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-888387" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>


<!-- IMAGES MENU -->
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                
                    <div class="col-md-6">
                        <a href="services/service.php"><img alt="Bootstrap Image Preview" src="images/im1.png" class="img-rounded"></a> <h4>Services</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="mechanics/mechanic.php"><img alt="Bootstrap Image Preview" src="images/im2.png" class="img-rounded"></a><h4>Mechanic</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="tips.php"><img alt="Bootstrap Image Preview" src="images/im4.png" class="img-rounded"></a><h4>Maintenance Tips</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="#mail"><img alt="Bootstrap Image Preview" src="images/im3.png" class="img-rounded"></a><h4>Mail Notifications</h4>
                    </div>
                </div>
            </div>

		
		<!-- NAVIGATION MENU -->

		<div class="col-md-6">
			<nav class="navbar navbar-custom" role="navigation">
				 <div class="navbar-header">
                     <a href="index.php"><img style="padding: 6px 4px 2px 5px;" src="images/home.png" width="45" height="45"/></a>          
                </div>				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					
						<li>
							<a href="about.php">About Us</a>
						</li>
						<li>
							<a href="#contact">Contact Us</a>
						</li>											
					</ul>
						</li>
					</ul>
					
					
				</div>
				
			</nav>
			<h2>
				Online Mechnanic Hub
			</h2>
			<p>
Online Mechanic Hub assists the commuter in spotting nearby mechanic shops/mechanics to mend his vehicle in need. Commuter location is traced and a list of mechanics along with their location.
<ul class="fa-ul">
<li><i class="fa-li fa fa-check-square"></i>Search by service - to choose a mechanic shop as per the service required by the vehicle’s owner.</li>
<li><i class="fa-li fa fa-check-square"></i>Search by area - to choose mechanic shops in a particular place.</li>
<li><i class="fa-li fa fa-check-square"></i>Users can also apply the price filter on the search results.</li>
<li><i class="fa-li fa fa-check-square"></i>Users can also enable Periodic Servicing notification to get timely notifications for vehicle servicing for better vehicle maintenance.</li>
</ul>
			</p>
			
		</div>
							
		</div>
	</div>
	<img src="images/contactus.jpg" class="img-responsive">	
	<div id="contact">	
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="Name" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" name = "cbutton" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
	
	</div>
	
	
		<div id="mail">	

	<img src="images/email.png" width="1270" height="300" class="img-responsive">
	<div class="row">		
        <div class="col-md-12">				
            <div class="well well-sm">				
				<legend class="text-center header">Get Email Updates</legend>
				<p>Subscribe to the Online Mechanic Hub Newsletter and get updates related to Car Services.</p>
				<p>By subscribing you get the Weekly updates and other resources available only to email subscribers: </p>

			<form class="navbar-form form-inline" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">				
					
					<div class="form-group">
						
				    <input id="email" name="email" type="text" placeholder="Email Address" class="form-control" style="width: 350px;">   
					<button type="submit" value = "Subscribe" id="submit" name="submit" class="btn btn-primary">Subscribe</button>
					</div>

					</form>
        </div>
	</div>
	</div>

	<div class="social-icons">  
	<div class="navbar-text pull-right"></div>
	<a href="#" class="btn azm-social azm-size-64 azm-circle azm-facebook"><i class="fa fa-facebook"></i></a>
	<a href="#" class="btn azm-social azm-size-64 azm-circle azm-google-plus"><i class="fa fa-google-plus"></i></a>
	<a href="#" class="btn azm-social azm-size-64 azm-circle azm-twitter"><i class="fa fa-twitter"></i></a>
  </div>
  </div>
	
	<hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->
	
      <!-- FOOTER -->
	   
        <footer>
	        <div class="container">
	            <div class="row">
                    <div class="col-sm-12 footer-copyright">
                    	<strong>&copy; 2016 Online Mechanic Hub, Inc.</strong>.
                    </div>
	            </div>
	        </div>
        </footer>
    	
</div>
	</div>

  </body>
</html>

