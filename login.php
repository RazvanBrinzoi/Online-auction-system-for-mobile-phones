<?php
session_start();
include "db_conn.php";
if (!empty($_POST['uname']) && !empty($_POST['password'])){
// echo "string";
 function validate($data){
   $data= trim($data);
   $data= stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
 $uname= validate($_POST['uname']);
 $password= validate($_POST['password']);

 if(empty($uname)){
   header("Location: index.php?error=User Name is required");
   exit();
 }else if (empty($password)) {
   header("Location: index.php?error=Password is required");
   exit();
 }else{
   // hashing the password
  // $pass = md5($pass);
   $sql = "SELECT * FROM users WHERE username='$uname' AND password='$password'";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result)) {
     $row = mysqli_fetch_assoc($result);
     if($row['username'] === $uname && $row['password'] === $password)
     {
       //echo"Logged in";
       $_SESSION['username'] = $row['username'];
       $_SESSION['name'] = $row['name'];
       $_SESSION['id'] = $row['id'];
       header("Location: home.php");
       exit();
     }else{
       header("Location: index.php?error=Incorrect User name or password");
       exit();
     }
   }else{
     header("Location: index.php?error=Incorrect User name or password");
     exit();
   }
 }
}else{
  header("Location: index.php?error=User Name and Password is required");
  exit();
}
 ?>
