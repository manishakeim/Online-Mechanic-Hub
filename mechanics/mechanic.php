<!--  Mechanic page 
      Input : Tracking user location from GPS
      Script files used : map_script.js [main map func]
      Output : Mechanics list in table format (Name, Phone, [Area]) -->

<!DOCTYPE html>
<html>
    <head> 
    <title> Search Mechanics </title>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="map_script.js"></script> 
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />    
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" >


  	<script> 
   	$(window).load(function() {
        // Animate loader off screen
        $(".mapholder").fadeOut("slow");;
    });

    $(function(){
    $('a, button').click(function() {
        $(this).toggleClass('active');
    });
});
    </script>
 
    
    <style>
   
    .no-js #loader { display: none;  }

	.js #loader { display: block; position: absolute; left: 100px; top: 0; }

 	#mapholder {
 	margin: auto;
    width: 60%;
    border: 3px solid #73AD21;
    padding: 10px;
	}

    .map{
        padding-top: 100px;
    }

     body{
    background-image:url("../images/back1.jpg");
    background-repeat: no-repeat;   
    background-position: center center;
    background-attachment: fixed;
    background-size: cover;
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
    .centerize { 
    text-align: center;
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
                    <a href="../index.php"><img style="padding: 6px 4px 2px 5px;" src="../images/home.png" width="45" height="45"/></a>   
                </div>
                
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">                       
                        <li>
                            <a href="../services/service.php"><strong>Services</strong></a>
                        </li>
                        <li  class="active">
                            <a href="mechanic.php"><strong>Mechanic</strong></a>
                        </li>
                        <li>
                            <a href="../tips.php"><strong>Maintenance Tips</strong></a>
                        </li>
                         <li>
                            <a href="#myModal" role="button" data-toggle="modal"><strong>Contact Us</strong></a>
                        </li>                   
                </div>                
            </nav>                        
        </div>        
    </div>

        <h3 align="center"> This service is available to the users on the go, who are in need of immediate mechanics due to vehicle breakdown in remote area or place unknown to the driver.</h3>
        
        <h2 align="center" id="demo">Click the button to get your position: </h2>
        <div class="centerize">
        <button align="center" id="search" name="search" onclick="getLocation()"type="submit" class="btn btn-primary btn-lg">Search Mechanics</button>
         </br></br>
          <div id="mapholder" align="center"> </div> 
        <div id="address" name="address"></div>
        </div>

        <hr class="featurette-divider">
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
  
	</body>
</html>
