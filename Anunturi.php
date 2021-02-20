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
      <th>anuntid</th>
      <th>vanzatorid</th>
      <th>tarifactual</th>
      <th>detalii</th>
      <th>dataexpirare</th>
      <th>Stergere</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","licitatie_online");
    if($conn -> connect_error){
      die("Connection failed:". $conn -> connect_error);
    }
    $sql = "SELECT anuntid, vanzatorid, tarifactual, detalii, dataexpirare FROM `anunt`";
    $result = mysqli_query($conn,$sql);

    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["anuntid"]. "</td><td>". $row["vanzatorid"]. "</td><td>". $row["tarifactual"]. "</td><td>". $row["detalii"]. "</td><td>". $row["dataexpirare"]. "</td><td><a href='delete.php?ai=$row[anuntid]'>Delete</a></td></tr> ";
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
