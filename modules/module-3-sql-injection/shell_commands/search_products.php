<!-- 

  Copyright (C) 2023 Damian Strojek, Patryk Sikora

  Security Testing Environment for Web Applications
  Realised as part of engineering degree for Gdansk University of Technology

-->
<!DOCTYPE html>
<?php
  
  
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
  <title>SHELL SQLi</title>
</head>
<body>
<!-- Main Content-->
<main>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card horizontal">
          <div class="card-stacked">
            <div class="card-content" style="display: block; float: left; width: 100%">
              <form action="search_products.php" method="post" style="position: fixed; width: 70%; margin-left: 10px; margin-bottom: 10px; border: 1px solid black; padding: 10px; border-radius: 5px;
              background-color: #f5f5f5;">
                <input type="text" name="search_text" id="search_text"><br>
                <input type="submit" style="margin-top: 10px; color: white; background-color: #1b7e74; border: none; border-radius: 5px; padding: 5px;
                margin-left: auto; margin-right: auto; display: block;" value="Search">
              </form>
            </div>
            <div class="card-action" style="display: block; float: left; width: 100%; margin-top: 100px;">
            
              <table class="striped">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Picture</th>
                  </tr>
                </thead>
                <tbody id="products">
                  <?php
                    $search_query = "SELECT * FROM products";
                    if (isset($_POST['search_text'])) {
                      $search_text = $_POST['search_text'];
                      $search_query = "SELECT * FROM products WHERE name LIKE '%$search_text%'";
                    }
                    $myPDO = new PDO('sqlite:./shell.db');
                    try {
                      $result = $myPDO->query($search_query);
                      foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['price'] . "$ </td>";
                        echo "<td><img src='" . $row['image'] . "' style='max-width: 200px; max-height: 200px;'></td>";
                        echo "</tr>";
                      }
                    } catch (PDOException $e) {
                      echo $e->getMessage();
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