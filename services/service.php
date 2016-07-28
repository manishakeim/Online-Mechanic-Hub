<!--  Services page 
      Input : Service, District, Area, Price
      Output : Service providers list in table format  -->

<!DOCTYPE html>
<html>
	<head>
		<title>Search Service Providers</title>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />	
	<link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" >
    <style>	
	body{
	background: url("../images/back1.jpg");			
	background-repeat: no-repeat;	
	background-position: center center;
	background-attachment: fixed;
	background-size: cover;
	font-size:14px;
	line-height:24px;
	-webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  	background-color:#333;
	}

	.footer {
	padding: 25px 0;
	background: #25383C;
	text-align:center;	
    height: 30px;
    bottom: 0;
    width: 100%;
	color: #aaa;
	}	

	.well {
    background: url(../images/transparent.png);
	margin-left:50px;
	border-color:black;
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

	<script>
		function getXMLHTTP() { //fuction to return the xml http object
		 var xmlhttp = false;	
			try { xmlhttp = new XMLHttpRequest(); }
			catch(e) {		
				try { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }
				catch(e){
					try{ xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); }
					catch(e1){ xmlhttp = false; }
				}
			}
		return xmlhttp;
        }


		function get_Area(myForm)
		{
			var index = myForm.districtgroup.selectedIndex;  //Index of the selected item
			var name = myForm.districtgroup.options[index].text;  //Display the text present in that particular index location
    		var strURL="getArea.php?value="+name;
    		var req = getXMLHTTP();  //User-defined func
   			if (req)
   			{
    			req.onreadystatechange = function() {
      				if (req.readyState == 4)
      				{	  // only if "OK"
	 					if (req.status == 200) {
	    					document.getElementById('areagroup').innerHTML=req.responseText; } 
	    				else { alert("There was a problem while using XMLHTTP:\n" + req.statusText); }
       				}
     			 }
    
   				req.open("POST", strURL, true);
   				req.send(null);
   			}
		}
	</script>
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
						<li class="active">
							<a href="service.php"><strong>Services</strong></a>
						</li>
						<li>
							<a href="../mechanics/mechanic.php"><strong>Mechanic</strong></a>
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

	<div class="row">
	<div class="col-md-12">
			<marquee behavior="scroll" direction="left">
				<img src="../images/logo/1.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/2.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/3.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/4.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/5.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/6.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/7.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/8.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/9.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/10.png" hspace="30" width="100" height="100" alt="4">
				<img src="../images/logo/11.png" hspace="30" width="100" height="100" alt="4">
			</marquee>
	
	</div>
	</div>

	    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<?php
			
			include_once('../omhconnection.php');

			// 88888888888888888888888888888888888 SERVICE RADIO BUTTONS 8888888888888888888888888888888888888888

			$stmt = $mysqli->prepare("SELECT * from service");
			$stmt->execute();
				
			if (!($res = $stmt->get_result())) {
    			echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
			}

			$numrows = $res->num_rows;
			$arr = array();  //for storing service names
			$arrc = array();  //for storing service codes
			while( $row = $res->fetch_array(MYSQLI_ASSOC) ) {
				array_push($arr,$row["SERVICE"]);
				array_push($arrc,$row["SERVICECODE"]);
			}
			

			echo "Select the services you would like to avail : ";
			echo "<br>";
			   for($i=0; $i< $numrows; $i++) { //checkbox
			       ?><input type="radio" name="servicegroup" value = <?php echo $arrc[$i] ?>> <?php echo $arr[$i] ?> <br> <?php
			   } //for loop end


			   echo "<br><br>";
			   ?>

			   Maximum Price : <input type="text" name="pricegroup" id="pricegroup">
			   <br><br>

			   <?php
			   //88888888888888888888888888888888 DISTRICT DROPDOWN BOX 88888888888888888888888888888888

			   $value1 = 1;
			   $value2 = 3;
			   $stmt = $mysqli->prepare("SELECT DISTINCT DISTRICT, PINCODE FROM LOCATION WHERE CATEGORY IN ($value1, $value2)");
			   $stmt->execute();
			   $res = $stmt->get_result();

			   echo "District"; ?>
			   <select name = "districtgroup" id = "districtgroup" onchange="get_Area(this.form)">
			   <option value = "Select District">Select District</option>
			   <?php 
			   while( $row = $res->fetch_array(MYSQLI_ASSOC) ){ ?>
			   		<option value = <?php echo $row['DISTRICT']?>> <?php echo $row['DISTRICT'] ?> </option>
			   		<?php
			   }

			   //****************** AREA DROPDOWN BOX ***********************

			   echo "</select><br><br> Area "; ?>

			   <select name = "areagroup" id = "areagroup"> <option value = "Select Area"> Select Area </option> </select> <br> <br>
			   <input type="submit" name = "search" value="Search" class="btn btn-primary"> <br> <br></form>


			   <?php 

				//******************************* DISPLAY TABLE ***********************

			   		if (isset($_POST['search'])) {
			   			if(empty($_POST['servicegroup']))  { echo "Select service first!"; }
			   			else if($_POST['districtgroup'] === "Select District") { echo "Please Select District"; }
			   			else if($_POST['areagroup'] === "Select Area") { echo "Please Select Area"; }
			   			else {
			   			$service = $_POST['servicegroup'];  //fetches (value) of the selected menu
						$district = $_POST['districtgroup'];
						$area = $_POST['areagroup'];
						$Maxp = $_POST['pricegroup'];

						if($Maxp == "") {$Maxp = 10000;}

						//Max and min prices for services
						$Minp = 100;
						//$Maxp = 1000; //fetch it from user
						$query = "SELECT * FROM SERVICINGSHOP WHERE DISTRICT='$district' AND AREA = '$area' AND SERVICECODE = '$service'AND PRICE >= $Minp AND PRICE <= $Maxp";
			   			$disp = array("Shop Name", "Phone", "Block", "Area", "District", "Price"); ?>
			   			
			   			<?php display($mysqli,$query,$disp,sizeof($disp)); //call to display func

			   		  } //else end
			   		} // isset func end




			   		  function display($mysqli, $query, $array, $limit) {  //limit : for loop no. of columns to display using mysqli_num ; 
						$stmt = $mysqli->prepare($query);                //array : column name headings
						$stmt->execute();	
						$res = $stmt->get_result();
				        ?>
						<table class = "table table-striped" style = "border:1px solid black"><tr> 
						<?php foreach ($array as $value) {   //Column headings ?>
				    		<th style="background-color:#36A0FF;color:white"> 
			        		<?php echo $value . "</th>";
		    	   			}      //foreach loop end

		    	   		if($res->num_rows > 0) {
						while( $row = $res->fetch_array(MYSQLI_NUM) ){  ?>
				    	<tr>
			        		<?php for($i=0; $i<$limit; $i++) { ?>
			                 <td style="border:1px solid black; background-color: white">
			                 <?php echo $row[$i] . "</td>"; // column values - entire row 
			               	} // for loop end 
							echo "</tr>";
						}  //while loop end
						echo "</table> ";
						}  //if end
						else {echo "The selected service is not available in the given location.";}
					   }   //func end

						?>

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
		  <div class="form-group"><label>E-Mail</label><input class="form-control email" placeholder="email@you.com (so that we can contact you)" data-placement="top" data-trigger="manual" data-content="Must be a valid e-mail address (user@gmail.com)" type="text"></div>
          <div class="form-group"><label>Phone</label><input class="form-control phone" placeholder="999-999-9999" data-placement="top" data-trigger="manual" data-content="Must be a valid phone number (999-999-9999)" type="text"></div>
          <div class="form-group"><label>Message</label><textarea class="form-control" placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea></div>
          
          <div class="form-group"><button type="submit" class="btn btn-success pull-right">Send It</button> <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p></div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>
    </div>
  </div>
</div>
</div>

  </div>


  <br>
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
	</body>
</html>

