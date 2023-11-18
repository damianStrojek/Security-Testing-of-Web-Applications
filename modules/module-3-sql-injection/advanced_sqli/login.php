<!-- 

  Copyright (C) 2023 Damian Strojek, Patryk Sikora

  Security Testing Environment for Web Applications
  Realised as part of engineering degree for Gdansk University of Technology

-->
<!DOCTYPE html>
<?php
  $username = $_POST['uname'];
  $password = $_POST['passwd'];
  $myPDO = new PDO('sqlite:./advanced_sqli.db');
  $query = "SELECT * FROM users WHERE login = '$username' AND password = '$password'";

  $count = 0;
  error_log("Executing: " . $query);
  try {
  $myPDO->exec($query);
  $result = $myPDO->query($query);
  } catch (Exception $e) {
    error_log("Logging [error]: " . $e->getMessage());
    header("Location: login_form.php?error=3&err_msg=" . $e->getMessage());
    exit();
  }
  
  $first_name = "";
  $last_name = "";
  $total_money = 0;
  $total_loans = 0;
  $user_id = -1;
  
  foreach ($result as $row) {
    $count++;
    $user_id = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $total_money = $row['total_money'];
    $total_loans = $row['total_loans'];
  }

  if ($count == 0) {
    error_log("Logging [no user found]: " . $username);
    header("Location: login_form.php?error=1");
    exit();
  }
  else if ($count > 1) {
    error_log("Logging [multiple users found]: " . $username);
    header("Location: login_form.php?error=2");
    exit();
  }
  else
  {
    error_log("Logging [success]: " . $username);
  }
  
?>
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
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card horizontal">
          <div class="card-stacked">
            <a style="display: block; float: right; margin-left: 10px; margin-bottom: 10px; margin-top: 10px" href="login_form.php" class="btn-floating halfway-fab waves-effect waves-light red"><i class="mdi-action-exit-to-app"></i></a>
            <div class="card-content" style="display: block; float: left;">
              <p>Welcome back: <b><?php echo $first_name . " " . $last_name; ?></b></p>
              <p>Total money: <b><?php echo $total_money; ?></b></p>
              <p>Total loans: <b><?php echo $total_loans; ?></b></p>
            </div>
            <div class="card-action" style="display: block; float: left; width: 100%">
              <h5>Recent operations:</h5>
              <table class="striped">
                <thead>
                  <tr>
                    <th>Operation</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = "SELECT * FROM operations WHERE user_id = '$user_id' ORDER BY date DESC LIMIT 10";
                    $result = $myPDO->query($query);
                    foreach ($result as $row) {
                      echo "<tr>";
                      echo "<td>" . $row['operation'] . "</td>";
                      echo "<td" . ($row['amount'] < 0 ? " style='color: red;'" : " style='color: green;'") . ">" . $row['amount'] . "</td>";
                      echo "<td>" . $row['date'] . "</td>";
                      echo "</tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
</body>
</html>