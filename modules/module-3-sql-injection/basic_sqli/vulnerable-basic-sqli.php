<!-- 

  Copyright (C) 2023 Damian Strojek, Patryk Sikora

  Security Testing Environment for Web Applications
  Realised as part of engineering degree for Gdansk University of Technology

-->
<!DOCTYPE html>
<html lang="en">
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
<body>
<!-- Navigation Menu-->
<nav class="hide-on-small-only">
  <ul class="side-nav fixed section table-of-contents">
    <li class="logo">
      <a id="logo-container" aria-label="Navigate to the beginning of the page" href="#intro"
      class="brand-logo grey-blue-text">
      <img src="./../../../assets/img/sqli.png" class="img-responsive nav-pic" alt="avatar">
      </a>
    </li>
    <li class="bold">
      <a aria-label="Back to the Theory section" href="./../theory.html#vulnerable-websites" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-arrow-collapse-left small"></i><span>Go Back</span></a>
    </li>
  </ul>
</nav>

<!-- Main Content-->
<main>
  <h3 class="page-title white-text teal">Basic SQL Injection</h3>
  <div class="container flow-text">
    <p>
      This is a basic SQL Injection example. The goal is to log in as any user without knowing the password.<br>
      To achieve this, you need to use the SQL Injection technique.<br>
      Instead of normal username and password you can use the following:<br>
      <b>login:</b>  <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' OR ''='</span><br>
      <b>password:</b>  <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' OR ''='' LIMIT 1 OFFSET '0</span><br>
      This will cause to select first user from the database.
    </p>
  </div>
  <div>
    <embed type="text/html" src="login_form.php" width="50%" height="500px" style="display: block; margin-left: auto; margin-right: auto;">
  </div>
  <div class="container flow-text">
    <p>
      But what if you don't know the SQL that will be executed? What if you don't know if the input is vulnerable?<br>
      In the SQL query everything after the "<b>--</b>" is a comment.<br>
      You can try the following input to check if the application is vulnerable:<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' OR 1=1--</span><br>
      You can type it as a <b>login</b> and see what happens.
    </p>
  </div>
  <div>
    <embed type="text/html" src="login_form.php" width="50%" height="500px" style="display: block; margin-left: auto; margin-right: auto;">
  </div>
  <div class="container flow-text">
    <p>
      If we get any unexpected result that is not a typical behaviour we can assume that the application is probably vulnerable.<br>
    </p>
  </div>

  <!-- fixed things -->
  <!-- button go to reset_database.php with GET parameter that is the going back link -->
  <a href="./reset_database.php?location=vulnerable-basic-sqli.php">
  <div style="position: fixed; top: 200px; right: 10px; background-color: #ffd900; border: 2px solid black; border-radius: 2px;">
    
      <b style="margin: 5px; font-size: 20px;">RESET DATABASE</b>
      <?php
      // check error code from get
      $err_code = $_GET["error"];
      if ($err_code == 3) {
        echo "<br><b style='margin: 5px; font-size: 20px; color: red;'>reseting database failed</b>";
      }
      else if($err_code == 4) {
        echo "<br><b style='margin: 5px; font-size: 20px; color: green;'>reset database ok</b>";
      }
      ?>
    
  </div>
  </a>

</main>
</body>
</html>