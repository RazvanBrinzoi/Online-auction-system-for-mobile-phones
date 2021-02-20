<?php

$conn = mysqli_connect("localhost","root","","licitatie_online");

$anuntid = $_GET['ai'];
$sql = "DELETE FROM `anunt` WHERE `anunt`.`anuntid` = '$anuntid'";
$data = mysqli_query($conn,$sql);
if($data)
{
  echo '<script type="text/javascript"> alert("Data Updated") </script>';
  header("Location: Anunturi.php");
}
else
{
  echo '<script type="text/javascript"> alert("Data Not Updated") </script>';
  echo "Error updating record: ".mysqli_error($conn);
}

 ?>
 
