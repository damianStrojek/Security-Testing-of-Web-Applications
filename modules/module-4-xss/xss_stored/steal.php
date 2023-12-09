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
  <title>XSS steal</title>
</head>
<body>
<!-- Main Content-->
<main>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card horizontal">
            <?php
                if (isset($_POST["username"]) && isset($_POST["password"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    echo "<b> THANK YOU FOR YOUR LOGIN DATA: </b><br>";
                    echo "Username: " . $username . "<br>";
                    echo "Password: " . $password . "<br>";
                    echo "<br><b>WE PROMISE WE WILL USE THE MONEY ONLY FOR BAD THINGS</b><br>";
                }
                else
                {
                    echo "<b> Welcome to the very trusted website. Please login to your bank account. </b><br>";
                    echo "<form action='./steal.php' method='POST'>";
                    echo "<input type='text' name='username' placeholder='Username'>";
                    echo "<input type='password' name='password' placeholder='Password'>";
                    echo "<button type='submit' class='btn waves-effect waves-light'>Login</button>";
                    echo "</form>";
                }
            ?>
            
        </div>
      </div>
    </div>
  </div>
  <!-- fixed things -->
  <!-- button go to reset_database.php with GET parameter that is the going back link -->
  <a href="./reset_database.php?location=com_cats.php">
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