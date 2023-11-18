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
      <a aria-label="Back to the Theory section" href="./../index.html#vulnerable-websites" class="waves-effect waves-dark teal-text">
        <i class="mdi mdi-arrow-collapse-left small"></i><span>Go Back</span></a>
    </li>
    <li class="bold">
      <a aria-label="Scenario" href="#getting_started" class="waves-effect waves-dark teal-text">
        <!-- <i class="mdi mdi-account-question small"></i><span>Getting Started</span></a> -->
        <i class="mdi mdi mdi-database-arrow-up-outline small"></i><span>Getting Started</span></a>
    </li>
    <li class="bold">
      <a aria-label="Easy Form" href="#what_now" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-table-question small"></i><span>App is vulnerable</span></a>
    </li>
    <li class="bold">
      <a aria-label="Intermediate Form" href="#injecting" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-database-edit-outline small"></i><span>Injecting the SQL</span></a>
    </li>
  </ul>
</nav>

<!-- Main Content-->
<main>
<section id="getting_started" class="section scrollspy">
  <h3 class="page-title white-text teal">Getting started</h3>
  <div class="container flow-text">
    <p>
      First of all we need to know if the application is vulnerable to SQL Injection.<br>
      But how to achive that? What if you don't know the SQL that will be executed?<br>
      Well, there is a simple trick: In the SQL query everything after the "<b>--</b>" is a comment.<br>
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
</section>
<section id="what_now" class="section scrollspy">
  <h3 class="page-title white-text teal">Application is vulnerable - what now?</h3>
  <div class="container flow-text">
    <p>
      Now that we know that the application is vulnerable we can try to exploit it.<br>
      But there is a little problem - we don't know the SQL query that will be executed.<br>
      The query depends on type of thing that the part of the application is responsible for.<br>
      If we are trying to log in, the query may look something like this:<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">
      SELECT * FROM users WHERE login = '$login' AND password = '$password'</span><br>
      or like this:<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">
      SELECT * FROM users WHERE login = '$login' AND password = MD5('$password') LIMIT 1</span><br>
      or something completely different.<br>
      Sometimes if the application is not written in the smartest way you can get the query from the error message.<br><br>
      In general you can try to inject different SQL queries to get some information about the database.<br>
      For example you can try inputing the following:<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' UNION SELECT 1--</span><br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' UNION SELECT 1,2--</span><br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' UNION SELECT 1,2,3--</span><br>
      etc.<br>
      to see how many columns are there in the table.<br>
    </p>
  </div>
</section>
<section id="injecting" class="section scrollspy">
  <h3 class="page-title white-text teal">Injecting the SQL</h3>
  <div class="container flow-text">
    <p>
      Let's do some fun stuff and become a hacker for a moment.<br>
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
      If that works, you can try to log in as any user you want just by changing the offset.<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' OR ''='' LIMIT 1 OFFSET '1</span><br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' OR ''='' LIMIT 1 OFFSET '2</span><br>
      etc.<br>
    </p>
  </div>

  <!-- fixed things -->
  <!-- button go to reset_database.php with GET parameter that is the going back link -->
  <a href="./reset_database.php?location=index.php">
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
<!-- jQuery-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- Materialize - Compiled and minified JavaScript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js"></script>
<script>
  // Materialize - Initializers
  $(document).ready(function () {
  $(".scrollspy").scrollSpy()
  // Initialize collapse button
  $(".button-collapse").sideNav({
    menuWidth: 190, // Default is 240
    edge: "left", // Choose the horizontal origin
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
  })
  })
</script>
</body>
</html>