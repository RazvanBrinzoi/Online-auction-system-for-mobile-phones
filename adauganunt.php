<!DOCTYPE html>
<html>
<head>
  <title>AdaugaDate</title>
  <style>
    body{
      background-color: whitesmoke;
    }
    input{
      width: 40%;
      height: 5%;
      border: 1px;
      border-radius: 05px;
      padding: 8px 15px 8px 15px;
      margin 10px 0px 15px 0px;
      box-shadow: 1px 1px 2px 1px grey;
    }
  </style>
</head>

<body>
  <center>
   <h1>Adaugare date</h1>
    <form action="" method="POST">
      <input type="text" name="vanzatorid" placeholder="id vanzator"/><br/>
      <input type="text" name="tarifactual" placeholder="tarifactual"/><br/>
      <input type="text" name="detalii" placeholder="detalii"/><br/>
      <input type="text" name="dataexpirare" placeholder="expirare: YYYY-MM-DD"/><br/>
      <input type="submit" name="update" value="ADAUGA DATE"/><br/>
      <input type="submit" name="home" value="HOME"/><br/>
    </form>
</body>

</html>

<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"licitatie_online");

if(isset($_POST['home']))
{
  header("Location: home.php");
}
if(isset($_POST['update']))
{
  
  $query = "INSERT INTO `anunt` (`vanzatorid`, `tarifactual`, `detalii`, `dataexpirare`) VALUES ('$_POST[vanzatorid]', '$_POST[tarifactual]', '$_POST[detalii]', '$_POST[dataexpirare]')";
  $query_run = mysqli_query($connection,$query);

  if($query_run)
  {
    echo '<script type="text/javascript"> alert("Data Updated") </script>';
  }
  else
  {
    echo '<script type="text/javascript"> alert("Data Not Updated") </script>';
    echo "Error updating record: ".mysqli_error($connection);
  }

}
?>
