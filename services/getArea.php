 <!--  getArea page 
      Purpose : Used alongwith Service page For dependent dropdown i.e. area dependent on district
      Input : District from URL (url/value = [district])
      Output : Fetches the area corresponding to the district selected and returns to service page -->

 <?php
    include_once("../omhconnection.php");

    $district = $_GET['value'];  //fetches district from url which is stored in value variable
    $value2 = 3;
    $value1 = 1;
    $query= "SELECT DISTINCT AREA, DISTRICT FROM  LOCATION where CATEGORY IN ($value1,$value2) and DISTRICT='$district'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
                
    if (!($res = $stmt->get_result())) {
        echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
    }

?>
<select name="area" id = "area" >
 <option>Select Area</option>
  <?php while($row = $res->fetch_array(MYSQLI_ASSOC)) { ?>
    <option value=<?php echo $row['AREA']?>><?php echo $row['AREA']?></option>
   <?php } ?>
</select>











































$_val = $_GET["c"];
if($_val=="-1")
{
    echo "failure";
    return 0;
}
else
{
    echo "<table border=1 width=50% cellpadding=0 cellspacing=0 >" ;
    echo "hello";
    echo        "<tr>";
    echo                $_val;
    echo            "</tr>";

                    $value1 = 1; $value2 = 3;
                    $sql = "SELECT * FROM  location where district = '$_val' and category IN ($value1,$value2) ";

                    $stmt = $mysqli->prepare($sql);
                    $stmt->execute();
                    $res = $stmt->get_result();

                    while( $row = $res->fetch_array(MYSQLI_ASSOC) ){
    echo            "<tr>";
    echo                "<td>";
    echo                     $row["area"] ;
    echo                "</td>";
    echo            "</tr>";
               
                            }
                        
               
    echo            "</table>";
}

?>