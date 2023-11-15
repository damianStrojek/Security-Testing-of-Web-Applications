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
<body></body>
  <main>
  <!-- fixed div that is a refresh button -->
  <div class="fixed-action-btn">
    <a class="btn-floating btn-large waves-effect waves-light teal" onclick="location.reload();">
      <i class="large mdi mdi-refresh"></i>
    </a>
  </div>
  <div style="width: 100%; overflow: hidden;">
    <h4>View of the <b>users</b> table</h4>
    <!-- print users table -->
    <?php
        $myPDO = new PDO('sqlite:./advanced_sqli.db');
        $query = "SELECT * FROM users";
        $result = $myPDO->query($query);
    ?>
    <table class="striped">
      <thead>
        <tr>
          <th>id</th>
          <th>login</th>
          <th>password</th>
          <th>first_name</th>
          <th>last_name</th>
          <th>total_money</th>
          <th>total_loans</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['login'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['first_name'] . "</td>";
            echo "<td>" . $row['last_name'] . "</td>";
            echo "<td>" . $row['total_money'] . "</td>";
            echo "<td>" . $row['total_loans'] . "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
  </main>
</body>
</html>
