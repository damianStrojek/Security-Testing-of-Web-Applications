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
  <title>SHELL SQLi</title>
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
      <a aria-label="Scenario" href="#start" class="waves-effect waves-dark teal-text">
        <i class="mdi mdi mdi-chart-timeline-variant-shimmer small"></i><span>Start</span></a>
    </li>
    <li class="bold">
      <a aria-label="Scenario" href="#sqlmap" class="waves-effect waves-dark teal-text">
        <i class="mdi mdi-database-search small"></i><span>SQLMAP</span></a>
    </li>
    <li class="bold">
      <a aria-label="Scenario" href="#shell_sqlmap" class="waves-effect waves-dark teal-text">
        <i class="mdi mdi-powershell small"></i><span>SHELL</span></a>
    </li>
    <li class="bold">
      <a aria-label="Scenario" href="#the_end" class="waves-effect waves-dark teal-text">
        <i class="mdi mdi-emoticon-sad small"></i><span>The end?</span></a>
    </li>
  </ul>
</nav>

<!-- Main Content-->
<main>
<section id="start" class="section scrollspy">
  <h3 class="page-title white-text teal">Start</h3>
  <div class="container flow-text">
    <p>
      Welcome to the last part of SQL Injection. In this module we will present 2 issues.<br>
      <hr/>
      One of them is an automatic tool for testing SQL Injection vulnerabilities.<br>
      So far, you have manually injected all SQL queries. But in practice, tools for automatic vulnerability testing are used much more often.<br>
      One of such tools is <b>SQLMAP</b>. The first part of this module will be devoted to this tool.<br>
      <hr/>
      The second part of this module will focus on how you can take control of the server quite easily by <b>placing our PHP script on the server</b>.<br>
      We hope that thanks to this exercise you will understand how important it is to protect yourself against SQL Injection - an attack that is so simple that it can cause a lot of damage, and yet this vulnerability is still found in web applications.<br>
    </p>
  </div>
</section>
<section id="sqlmap" class="section scrollspy">
  <h3 class="page-title white-text teal">SQLMAP</h3>
  <div class="container flow-text">
    <p>
      <div class="col s4 m2">
        <img alt="SQLMAP" src="/assets/img/sqlmap-logo.png" class="responsive-img" />
      </div>
      The SQLMAP tool can be downloaded from: <a href="https://sqlmap.org/" target="_blank">https://sqlmap.org/</a><br>
      <b>SQLMAP</b> is an open source penetration testing tool that automates the process of detecting and exploiting SQL injection flaws and taking over database servers.
      It is equipped with a powerful detection engine, many niche features for the best penetration tester and a wide range of switches, from downloading database fingerprints,
      through downloading data from a database, to accessing the base file system and executing commands in the operating system through out-of-band connections.<br>
      <hr/>
      SQLMAP has many options that you can check by typing in the console:<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">python3 sqlmap.py --help</code><br>
      In this exercise we will need the following options:<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--url=[URL]</code> - URL address to attack<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--threads=[N]</code> - number of threads<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--risk=[N]</code> - risk (1-3)<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--level=[N]</code> - level (1-5)<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--technique=[T]</code> - technique (default: BEUSTQ, UB - Union + Blind...)<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--batch</code> - batch mode (does not require interaction, uses default values)<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--forms</code> - check forms<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--all</code> - retrive everything<br>
      <hr/>
      Let's try SQLMAP on the prepared application below.<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">
      python3 sqlmap.py --url="http://127.0.0.1:2137/modules/module-3-sql-injection/shell_commands/search_products.php" --threads=10 --risk=3 --level=5 --technique="UB" --batch --forms --all</code><br>
      <hr/>
      <div>
        <embed type="text/html" src="search_products.php" width="100%" height="600px" style="display: block; margin-left: auto; margin-right: auto;">
      </div>
      <hr/>
      <img alt="SQLMAP_1" src="assets/img/1.png" class="responsive-img" /><br>
      SQLMAP found a <b>form</b> and started testing for vulnerabilities.<br>
      <img alt="SQLMAP_2" src="assets/img/2.png" class="responsive-img" /><br>
      It successively discovers more information about the database.<br>
      It turned out that one of the queries requires <b>4 columns</b>.<br>
      <img alt="SQLMAP_3" src="assets/img/3.png" class="responsive-img" /><br>
      The database is <b>SQLite</b>.<br>
      The operating system is <b>Linux Ubuntu</b>.<br>
      The web technology is <b>PHP</b>.<br>
      <img alt="SQLMAP_4" src="assets/img/4.png" class="responsive-img" /><br>
      It was also possible to read the contents of all tables.<br>
      <img alt="SQLMAP_5" src="assets/img/5.png" class="responsive-img" /><br>
      <img alt="SQLMAP_6" src="assets/img/6.png" class="responsive-img" /><br>
      <img alt="SQLMAP_7" src="assets/img/7.png" class="responsive-img" /><br>
      <img alt="SQLMAP_8" src="assets/img/8.png" class="responsive-img" /><br>
      <hr/>
      <b>SQLMAP</b> has many options, we encourage you to explore on your own.<br>
    </p>
  </div>
</section>
<section id="shell_sqlmap" class="section scrollspy">
    <h3 class="page-title white-text teal">Shell</h3>
    <div class="container flow-text">
    <p>
      The last part of our adventures with SQL Injection is devoted to <b>taking control of the server</b>.<br>
      <hr/>
      How to do it? We can use the <b>SQLMAP</b> tool we just learned about.<br>
      It has the <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">--os-shell</code> option, which allows you to run
      a system console on the server.<br>
      Unfortunately, we will not be able to do it this time, because the database used is <b>SQLite</b>, which is a simple database and has very limited capabilities,
      which paradoxically prevents us from taking control of the server.<br>
      <hr/>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">python3 sqlmap.py --url="http://127.0.0.1:2137/modules/module-3-sql-injection/shell_commands/search_products.php" --threads=10 --risk=3 --level=5 --technique="UB" --batch --forms --os-shell</code><br>
      <img alt="SQLMAP_9" src="assets/img/9.png" class="responsive-img" /><br>
      <hr/>
    </p>
  </div>
</section>
<section id="the_end" class="section scrollspy">
  <h3 class="page-title white-text teal">The End?</h3>
  <div class="container flow-text">
    <p>
      The end? Not yet.<br>
      What does taking over the server mean?<br>
      In general, we want to place a <b><i>backdoor</i></b> on the server.<br>
      This backdoor will be a PHP script that will execute system commands, commands that we will send to it using a browser.<br>
      SQL Injection allows us to place such a script on the server.<br>
      Let's look at the example:<br>
      <img alt="SQLMAP_10" src="assets/img/10.png" class="responsive-img" /><br>
      The above injection is designed to place a PHP script on the server that will execute system commands.<br>
      <hr/>
      For the purposes of this course, we have placed a PHP script on the server that will execute system commands.<br>
      You can try it out:<br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">pwd</code><br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">ls</code><br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">cat /etc/passwd</code><br>
      <code style="background-color: #ffd900; border: 2px solid black; border-radius: 2px;">whoami</code><br>
      ETC.<br>
    </p>
    <div>
      <embed type="text/html" src="cmd_php.php" width="60%" height="200px" style="display: block; margin-left: auto; margin-right: auto;">
    </div>
  </div>
</section>
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