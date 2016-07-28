<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>About OMH</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
	

    <style>
	body{
	background-image:url("images/back1.jpg");
	background-repeat: no-repeat;	
	background-position: center center;
	background-attachment: fixed;
	background-size: cover;
	font-size:16px;
	line-height:26px;
	padding-left: 10px;
	padding-right:10px;
	}
	
	footer {
	padding: 25px 0;
	background: #25383C;
	text-align:center;	
    height: 50px;
    bottom: 0;
    width: 100%;
	color: #aaa;
	}
	
	blockquote {
  background: #FF4500;
  border-left: 10px solid #ccc;
  margin: 1.5em 10px;
  padding: 0.5em 10px;
  quotes: "\201C""\201D""\2018""\2019";
}
blockquote:before {
  color: #ccc;
  content: open-quote;
  font-size: 4em;
  line-height: 0.1em;
  margin-right: 0.25em;
  vertical-align: -0.4em;
}
blockquote p {
  display: inline;
}


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
  
      <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-custom" role="navigation">
				<div class="navbar-header">
						  <a href="index.php"><img style="padding: 6px 4px 2px 5px;" src="images/home.png" width="45" height="45"/></a>  
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">					
						<li class="active">
							<a href="about.php"><strong>About Us</strong></a>
						</li>
						<li>
							<a href="services/service.php"><strong>Services</strong></a>
						</li>
						<li>
							<a href="mechanics/mechanic.php"><strong>Mechanic</strong></a>
						</li>
						<li>
							<a href="tips.php"><strong>Maintenance Tips</strong></a>
						</li>
						<li>
							<a href="#myModal" data-toggle="modal"><strong>Contact Us</strong></a>
						</li>
						
					</ul>					
					
					</div>				
			</nav>						
		</div>		
	</div>

	<br>	
	
	<div class="container">
	    <div class="row">
	<h2 align="center"><strong>Online Mechnanic Hub</strong></h2>
	
	<h3>What is it about?</h3>
	<ul class="fa-ul">
<li><i class="fa-li fa fa-check-square"></i>Digital platform to connect mechanic shops around the city.</li>
<li><i class="fa-li fa fa-check-square"></i>Agglomeration of Mechanic shops availability at different places – even remote areas.</li>
<li><i class="fa-li fa fa-check-square"></i>Assists vehicle owners in the need of the hour.</li>
</ul>
		<blockquote>
		<p>Online Mechanic Hub assists the commuter in spotting nearby mechanic shops/mechanics to mend his vehicle in need. Commuter location is traced and a list of mechanics along with their location.
		</blockquote>
		
		<img align="center" src="images/a1.png" width="800" class="img-responsive center-block">
		<br>
		
		
		<div class="row">			
<ul class="fa-ul">
<li><i class="fa-li fa fa-check-square"></i>Search by service - to choose a mechanic shop as per the service required by the vehicle’s owner.</li>
<li><i class="fa-li fa fa-check-square"></i>Search by area - to choose mechanic shops in a particular place.</li>
<li><i class="fa-li fa fa-check-square"></i>Users can also apply the price filter on the search results.</li>
<li><i class="fa-li fa fa-check-square"></i>Users can also enable Periodic Servicing notification to get timely notifications for vehicle servicing for better vehicle maintenance.</li>
</ul>
			</p>
			
		<br>

	<div class="container">
  <div class="row">
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">We'd Love to Hear From You</h3>
      </div>
      <div class="modal-body">
        <form class="form-horizontal col-sm-12">
          <div class="form-group"><label>Name</label><input class="form-control required" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text"></div>
          <div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea></div>
          <div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
          <div class="form-group"><label>Phone</label><input class="form-control phone" placeholder="999-999-9999" data-placement="top" data-trigger="manual" data-content="Must be a valid phone number (999-999-9999)" type="text"></div>
          <div class="form-group"><button type="submit" class="btn btn-success pull-right">Send It!</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>
  </div>
</div>

  <br>
  </div>
  </div>
	
			
	<hr class="featurette-divider">
		
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>