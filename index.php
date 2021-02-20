<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <form action="login.php" method="post">
    <h2 style="font-family:'Courier New'">LOGIN</h2>
    <?php if(!empty($_GET['error'])) { ?>
      <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <label style="font-family:'Courier New'">User name</label>
      <input type="text" name="uname" placeholder="User Name">
      <br><br>

      <label style="font-family:'Courier New'">Password</label>
      <input type="text" name="password" placeholder="Password">
      <br><br>

      <button type="submit" style="font-family:'Courier New'">LOGIN</button>
      <a href="signup.php" class="ca">Create an account</a>
  </form>
</body>
</html>
