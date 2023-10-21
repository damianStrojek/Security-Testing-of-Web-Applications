<!DOCTYPE html>
<html lang="en">
<script src="script.js"></script>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Materialize - Compiled and minified CSS-->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/css/materialize.min.css" />
  <!-- Font Awesome Icon - CSS-->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
  <!-- Material Design Icons -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" />
  <!-- Custom Styles-->
  <link rel="stylesheet" href="./../../../assets/css/style.css" />
  <link rel="icon" href="./../../../assets/img/sqli.png" />
  <title>Basic SQLi</title>
</head>
<body onload="updateSQL()"></body>
  <main>
  <div style="width: 100%; overflow: hidden;">
    <?php
      $err_code = $_GET["error"];
      if ($err_code == 1) {
        echo "<h5 style='height: 20px; color: red; margin-left: 10px;'><b>Wrong username or password!</b></h5>";
      }
      else {
        echo "<h5 style='height: 20px'></h5>";
      }
    ?>
    <form action="login.php" method="post" style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px; border: 1px solid black; padding: 10px; border-radius: 5px;">
      <b>Login:</b> <input type="text" name="uname" id="uname" onkeyup="updateSQL()" onkeypress="updateSQL()"><br>
      <b>Password:</b> <input type="password" name="passwd" id="passwd" onkeyup="updateSQL()" onkeypress="updateSQL()"><br>
      <input type="submit" style="margin-top: 10px; color: white; background-color: #1b7e74; border: none; border-radius: 5px; padding: 5px;
      margin-left: auto; margin-right: auto; display: block;" value="Login">
    </form>
    <div style="margin-left: 20px;">
      <h5>The executed SQL querry will be:</h5>
      <p id="sql_1">
      </p>
    </div>
  </div>
  </main>
</body>
</html>
