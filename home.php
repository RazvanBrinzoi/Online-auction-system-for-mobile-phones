<?php
session_start();

if(!empty($_SESSION['id']) && !empty($_SESSION['username'])){


?>

<!DOCTYPE html>
<html>
<head>
  <title>HOME</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>

<body>
  <div class="container">
   <h1 class="logo"></h1>
   <nav>
     <ul>
       <li><a href="adaugadate.php">AdaugaDate</a></li>
       <li><a href="adauganunt.php">AdaugaAnunturi</a></li>
       <li><a href="Anunturi.php">Anunturi</a></li>
       <li><a href="orase.php">Orase</a></li>
       <li><a href="curieri.php">Curieri</a></li>
       <li><a href="participanti.php">Participanti</a></li>
       <li><a href="vanzatori.php">Vanzatori</a></li>
       <li><a href="licitatii.php">Licitatii</a></li>
       <li><a href="topanunturi.php">TopAnunturi</a></li>
       <li><a href="toporase.php">TopOrase</a></li>
     </ul>
   </nav>
 </div>
  <a href="logout.php" class="ca">Logout</a>
</body>

</html>

<?php
}else{
  header("Location: index.php");
  exit();
}
?>
