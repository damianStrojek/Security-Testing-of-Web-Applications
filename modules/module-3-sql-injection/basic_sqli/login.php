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
      <a aria-label="Back to the Main website" href="./../../../index.html#third-module" class="waves-effect waves-dark teal-text"><i
      class="mdi-action-home small"></i><span>Main Site</span></a>
    </li>
    <li class="bold">
      <a aria-label="Back to the Theory section" href="./theory.html#vulnerable-websites" class="waves-effect waves-dark teal-text"><i
      class="mdi-action-info-outline small"></i><span>Theory</span></a>
    </li>
  </ul>
</nav>

<!-- Main Content-->
<main>
<?php
  $username = $_POST['uname'];
  $password = $_POST['passwd'];
  $myPDO = new PDO('sqlite:./basic_sqli.db');
  $query = "SELECT * FROM users WHERE login = '$username' AND password = '$password'";
  echo $query;
  echo "<br>";
  $result = $myPDO->query($query);
  echo "results";
  echo "<br>";
  foreach ($result as $row) {
    echo $row['login'];
    echo "<br>";
  }
?>
</main>
</body>
</html>