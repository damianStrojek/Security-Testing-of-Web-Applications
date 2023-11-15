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
  <title>Advanced SQLi</title>
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
      <a aria-label="Back to the Theory section" href="./../theory.html#vulnerable-websites" class="waves-effect waves-dark teal-text">
        <i class="mdi mdi-arrow-collapse-left small"></i><span>Go Back</span></a>
    </li>
    <li class="bold">
      <a aria-label="Scenario" href="#getting_started" class="waves-effect waves-dark teal-text">
        <!-- <i class="mdi mdi-account-question small"></i><span>Getting Started</span></a> -->
        <i class="mdi mdi mdi-database-arrow-up-outline small"></i><span>Getting Started</span></a>
    </li>
    <li class="bold">
      <a aria-label="Easy Form" href="#is_it" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-table-question small"></i><span>Checking</span></a>
    </li>
    <li class="bold">
      <a aria-label="Intermediate Form" href="#injecting" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-database-edit-outline small"></i><span>Injecting</span></a>
    </li>
    <li class="bold">
      <a aria-label="Advanced Form" href="#problem" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-database-search small"></i><span>Deal</span></a>
  </ul>
</nav>

<!-- Main Content-->
<main>
<section id="getting_started" class="section scrollspy">
  <h3 class="page-title white-text teal">Getting started</h3>
  <div style="width: 70%;"><div class="container flow-text">
    <p>
      In this module we will use the application SQL Injection vulnerability to take control over the database.<br>
      Using SQL Injection vulnerability we can not only read information from the database, but we can also modify its content.<br>
      The most commonly used "tricks" in this case are primarily to append to the query:<br>
      <b>1.</b> <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">'; DROP TABLE users;--</span><br></span><br>
      <b>2.</b> <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">'; DROP DATABASE;--</span><br></span><br>
      <b>3.</b> <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">'; UPDATE users SET password = md5('1234');--</span><br></span><br>
      <b>etc.</b><br>
      Dzięki temu możemy wykonać dowolne zapytanie, które zmodyfikuje bazę danych, np. dodanie nowego użytkownika,
      zmiana haseł, usuwanie tabel lub całych baz danych.<br>
    </p>
  </div></div>
</section>
<section id="is_it" class="section scrollspy">
  <h3 class="page-title white-text teal">Is the app that much vulnerable?</h3>
  <div style="width: 70%;"><div class="container flow-text">
    <p>
      Well, it is always good to check if the app is that much vulnerable, if the "database user" that executes the queries has the database permissions to do what we want to do.<br>
      First thing we can try is the sleep function.<br>
      If the app is vulnerable, we can use the sleep function to delay the response from the server.<br>
      Let's try the following injection:<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">' OR SLEEP(3);--</span><br>
      <!-- NOT WORKING, TODO -->
      <h1> NIE DZIAŁA DLA SQLITE, trzeba jeszcze pomyśleć</h1>
    </p>
  </div>
  <div>
    <embed type="text/html" src="login_form.php" width="50%" height="700px" style="display: block; margin-left: auto; margin-right: auto;">
  </div></div>
</section>
<section id="injecting" class="section scrollspy">
  <h3 class="page-title white-text teal">Let's try our possibilities</h3>
  <div style="width: 70%;"><div class="container flow-text">
    <p>
      Let's try to experiment a little with the possibilities that SQL Injection vulnerability gives us.<br>
      In this case we can try to execute a query that will delete the users table.<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">'; DROP TABLE users;--</span><br>
    </p>
  </div>
  <div>
    <embed type="text/html" src="login_form.php" width="50%" height="700px" style="display: block; margin-left: auto; margin-right: auto;">
  </div></div>
  <div style="width: 70%;"><div class="container flow-text">
    <p>
      How about adding a new user?<br>
      A user that will have a lot of money?<br>
      How about an admin...<br>
      As you can see, the possibilities are endless.<br>
      Let's try to add a new user with the following injection:<br>
      <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">'; INSERT INTO users (login, password, total_money) VALUES ('dziq', '', 10000000);--</span><br>
    </p>
  </div>
  <div>
    <embed type="text/html" src="login_form.php" width="50%" height="700px" style="display: block; margin-left: auto; margin-right: auto;">
  </div></div>
</section>
<section id="problem" class="section scrollspy">
  <h3 class="page-title white-text teal">But there is the deal</h3>
  <div style="width: 70%;">
    <div class="container flow-text">
      <p>
        When we want to delete a table in the database, when we want to add a user, in general when we want to modify the contents of the database, we must know its <b>structure</b>.<br>
        The question is: how to do it?<br>
        The answer is: it depends.<br>
        <br>
        It depends on many things, among others on:<br>
        <li>DBMS - type of database (MySQL, SQLite, Oracle, MSSQL, Postgres, etc.)</li>
        <li>Do we have somewhere in the application the possibility to display the contents of the database based on the user's query</li>
        <li>Does the application display errors related to queries to the database anywhere</li>
        <li>ETC.</li>
        Generally, it is usually a time-consuming task to get to know the structure of the database.<br>
        <br>
        To find out the type of database, you can send queries that are characteristic for a given DBMS.<br>
        For example, SQLite usually, unlike most DBMSs, will not react to the SLEEP function in the query.<br>
        Individual DBMSs also have different default table names that contain the structure of the database. (tables with metadata about the database)<br>
        <br>
        If you haven't noticed yet, in our familiar login window we can get information about an error related to a query to the database.<br>
        If not, you can try such an injection:<br>
        <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">'; DRO<b>R</b> TABLE users;--</span><br>
      </p>
    </div>
    <div>
      <embed type="text/html" src="login_form.php" width="50%" height="700px" style="display: block; margin-left: auto; margin-right: auto;">
    </div>
    <div class="container flow-text">
      <p>
        To make further work easier, we will give you a hint: the database used is <b>SQLite</b>.<br>
        As you can see, we got an error message related to the query to the database.<br>
        The information contained in such an error can be very helpful.<br>
        But we will try to get to know the structure of the database in a different way.<br>
        <br>
        To do this, we will combine the fields in the parent table of the database into one value, and then we will use it as one of the data in the registration form.<br>
        Switch to the registration option (green button with the user add icon):<br>
        Let's try to enter as first name:<br>
        <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">', (SELECT group_concat(name, "_") FROM sqlite_sequence))--</span><br>
        (Of course, we also complete the login and password)<br>
      </p>
    </div>
    <div>
      <embed type="text/html" src="login_form.php" width="50%" height="700px" style="display: block; margin-left: auto; margin-right: auto;">
    </div>
    <div class="container flow-text">
      <p>
        As you can see, we got an error message. This is because the query that inserts into the database was too short.<br>
        We can fix this by adding the right amount to our injection:<br>
        <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">'0'</span><br>
        Let's now use such an injection:<br>
        <span style="padding-left: 10px; padding-right: 10px; background-color: #e4e4e4; border: 1px solid black;">', (SELECT group_concat(name, "_") FROM sqlite_sequence), '0', '0')--</span><br>
      </p>
    </div>
    <div>
      <embed type="text/html" src="login_form.php" width="50%" height="700px" style="display: block; margin-left: auto; margin-right: auto;">
    </div>
  </div>
</section>
  <!-- fixed things -->
  <!-- button go to reset_database.php with GET parameter that is the going back link -->
  <a href="./reset_database.php?location=vulnerable-advanced-sqli.php">
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
  <div>
    <embed type="text/html" src="show_users_table.php" width="25%" height="430px" style="position: fixed; top: 270px; right: 10px; border: 2px solid black; border-radius: 2px; background-color: white;">
  </div>
  <!-- end fixed things -->


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

<!-- ',(SELECT group_concat(name, "_") FROM sqlite_sequence), '0', '0')-- -->