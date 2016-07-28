<?php
/* Displays User location and Mechanic Table based on pincode fetched*/
	include_once('../omhconnection.php');

 	$postalcode = $_GET['name'];  //pincode fetched from map
 	$location = $_GET['name2'];  //user current location
 	
	if((!$stmt = $mysqli->prepare("SELECT DISTINCT AREA,DISTRICT FROM LOCATION WHERE PINCODE=$postalcode")))
	{
		echo "statement prepare problem";
	}
	if(!($stmt->execute()))
	{
		echo "statement execution problem";
	}	
	
	$res = $stmt->get_result();

	echo "</br></br><strong>Your current location is : " . $location. "</strong></br></br>";

	while($row = $res->fetch_array(MYSQLI_ASSOC))
	{
		$route=$row['AREA'];
        echo "<strong>Area :  </strong>" . $route;
        $array = array("Mechanic name","Phone no");
	    $query = "SELECT * FROM mechanics WHERE AREA = '$route' ";
        display($mysqli,$query,$array,2) ; 
    }

			
	//  ******************* function defintion - table display ***********************

	function display($mysqli, $query, $array, $limit) {  //limit : for loop no. of columns to display using mysqli_num ; 
		$stmt = $mysqli->prepare($query);                //array : column name headings
		$stmt->execute();	
		$res = $stmt->get_result();
	?>
		<table class="table table-striped" style = "border:1px solid black"><tr> 
	<?php foreach ($array as $value) {   //Column headings ?>
		    <th style="background-color:#36A0FF;color:white; text-align:center;">  <!-- class="table-striped" -->
			 <?php echo $value . "</th>";
		  }      //foreach loop end

	    while( $row = $res->fetch_array(MYSQLI_NUM) ){  ?>
		    <tr>
	       <?php for($i=0; $i<$limit; $i++) { ?>
			        <td style="border:1px solid black; background-color: white">
			        <?php echo $row[$i] . "</td>"; // column values - entire row 
			     } // for loop end 
		    echo "</tr>";
		}  //while loop end
		echo "</table> ";
	}  //function end*/

?> 
