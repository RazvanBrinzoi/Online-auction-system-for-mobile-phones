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
      <th>Nume</th>
      <th>SumaBani</th>
      <th>email</th>
      <th>telefon</th>
    </tr>
    <?php
    $conn = mysqli_connect("localhost","root","","licitatie_online");
    if($conn -> connect_error){
      die("Connection failed:". $conn -> connect_error);
    }
    $sql = "SELECT U.name AS Nume, PP.SumaBani, U.email, U.telefon FROM `users` AS U INNER JOIN `participapersoana` AS PP ON U.id = PP.id";
    $result = mysqli_query($conn,$sql);

    if($result-> num_rows > 0){
      while($row = $result-> fetch_assoc()){
        echo "<tr><td>". $row["Nume"]. "</td><td>". $row["SumaBani"]. "</td><td>". $row["email"]. "</td><td>". $row["telefon"]. "</td></tr>";
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
