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
      <th>Detalii</th>
      <th>SumaLicitata</th>
      <th>FirmaCurierat</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","licitatie_online");
    if($conn -> connect_error){
      die("Connection failed:". $conn -> connect_error);
    }
    $sql = "SELECT AN.detalii, F.SumaFinala, C.NumeFirma FROM `anunt` AS AN INNER JOIN `finalizarelicitatie` AS F ON AN.anuntid = F.anuntid INNER JOIN `curier` AS C ON F.curierid = C.curierid";
    $result = mysqli_query($conn,$sql);

    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["detalii"]. "</td><td>". $row["SumaFinala"]. "</td><td>". $row["NumeFirma"]. "</td></tr>";
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
