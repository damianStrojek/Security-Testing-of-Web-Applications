<!-- 

  Copyright (C) 2023 Damian Strojek, Patryk Sikora

  Security Testing Environment for Web Applications
  Realised as part of engineering degree for Gdansk University of Technology

-->
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
  <title>Advanced SQLi</title>
</head>
<body onload="updateSQLRegister()"></body>
  <main>
  <div style="width: 100%; overflow: hidden;">
    <?php
      $err_code = 0;
      if (isset($_GET["error"]))
        $err_code = $_GET["error"];
      if ($err_code == 1) {
        echo "<h5 style='height: 20px; color: red; margin-left: 10px;'><b>Error [1]: User already exists</b></h5>";
      }
      else if ($err_code == 2) {
        echo "<h5 style='height: 20px; color: red; margin-left: 10px;'><b>Error [2]: Registration failed</b></h5>";
      }
      else if ($err_code == 3) {
        $err_msg = "";
        if (isset($_GET["err_msg"]))
        {
          $err_msg = $_GET["err_msg"];
          echo "<h5 style='height: 20px; color: red; margin-left: 10px;'><b>Error [3]: " . $err_msg . "</b></h5>";
        }
      }
      else if ($err_code == 4) {
        echo "<h5 style='height: 20px; color: green; margin-left: 10px;'><b>Registration successful!</b></h5>";
      }
      else {
        echo "<h5 style='height: 20px'></h5>";
      }
    ?>
    <form action="register.php" method="post" style="margin-left: 10px; margin-top: 40px; margin-bottom: 10px; border: 1px solid black; padding: 10px; border-radius: 5px;">
      <b>Login:</b> <input type="text" name="uname" id="uname" onkeyup="updateSQLRegister()" onkeypress="updateSQLRegister()"><br>
      <b>Password:</b> <input type="password" name="passwd" id="passwd" onkeyup="updateSQLRegister()" onkeypress="updateSQLRegister()"><br>
      <b>First name:</b> <input type="text" name="fname" id="fname" onkeyup="updateSQLRegister()" onkeypress="updateSQLRegister()"><br>
      <b>Last name:</b> <input type="text" name="lname" id="lname" onkeyup="updateSQLRegister()" onkeypress="updateSQLRegister()"><br>
      <input type="submit" style="margin-top: 10px; color: white; background-color: #1b7e74; border: none; border-radius: 5px; padding: 5px;
      margin-left: auto; margin-right: auto; display: block;" value="Register">
    </form>
    <div style="margin-left: 20px;">
      <h5>The executed SQL querry will be:</h5>
      <p id="sql_2">
      </p>
    </div>
  </div>
  <!-- fixed button to go to login page, that says login -->
  <div class="fixed-action-btn" style="top: 10px; right: 10px;">
    <a class="btn-floating btn-large waves-effect waves-light" href="login_form.php">
      <i class="large mdi mdi-login"></i>
    </a>
  </main>
</body>
</html>
