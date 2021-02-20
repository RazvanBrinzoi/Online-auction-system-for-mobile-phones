<!DOCTYPE html>
<html>
<head>
  <title>Anunturi</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      color: #588c7e;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
    }
    th {
      background-color: #588c7e;
      color: white;
    }
    tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
  <table>
    <tr>
      <th>Oras</th>
      <th>Judet</th>
      <th>NumeFirma</th>
      <th>contact</th>
      <th>email</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","licitatie_online");
    if($conn -> connect_error){
      die("Connection failed:". $conn -> connect_error);
    }
    $sql = "SELECT O.Nume AS Oras, O.Judet, C.NumeFirma, C.contact, C.email FROM orase AS O INNER JOIN orasecurierat AS OC ON O.orasid=OC.orasid INNER JOIN curier AS C ON C.curierid=OC.curierid";
    $result = mysqli_query($conn,$sql);

    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["Oras"]. "</td><td>". $row["Judet"]. "</td><td>". $row["NumeFirma"]. "</td><td>". $row["contact"]. "</td><td>". $row["email"]. "</td></tr> ";
      }
      echo "</table>";
    }else{
      echo "0 result";
    }

    $conn-> close();
     ?>
  </table>
</body>
</html>
