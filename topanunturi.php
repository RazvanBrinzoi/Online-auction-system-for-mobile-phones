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
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","licitatie_online");
    if($conn -> connect_error){
      die("Connection failed:". $conn -> connect_error);
    }
    $sql = "SELECT AN.detalii, MAX(tarifactual) AS SumaLicitata FROM `anunt` AS AN GROUP BY AN.anuntid ORDER BY AN.tarifactual DESC LIMIT 3";
    $result = mysqli_query($conn,$sql);

    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["detalii"]. "</td><td>". $row["SumaLicitata"]. "</td></tr>";
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
