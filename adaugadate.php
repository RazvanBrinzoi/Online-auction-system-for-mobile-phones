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
      <input type="text" name="idpers" placeholder="ID-ul persoanei careia adaugam"/><br/>
      <input type="text" name="orasid" placeholder="orasid"/><br/>
      <input type="text" name="email" placeholder="email"/><br/>
      <input type="text" name="contact" placeholder="contact"/><br/>
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
  $id = $_POST['idpers'];
  $query = "UPDATE `users` SET `orasid` = '$_POST[orasid]', `email` = '$_POST[email]', `telefon` = '$_POST[contact]' WHERE `users`.`id` = '$_POST[idpers]'";
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
