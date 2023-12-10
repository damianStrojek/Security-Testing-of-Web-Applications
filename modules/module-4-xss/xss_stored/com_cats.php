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
  <title>Com cats</title>
</head>
<body>
<!-- Main Content-->
<main>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <div class="card horizontal">
            <?php
              $myPDO = new PDO('sqlite:./com_cats.db');
              $search_query = "SELECT * FROM posts";
              $posts = $myPDO->query($search_query);
              // title, image
              foreach ($posts as $post) {
                echo '<div class="card-content" style="font-weight: bold; background-color: #f5f5f5; padding: 10px; border-radius: 5px;">';
                echo '<p 
                >' . $post['title'] . '</p>';
                echo '</div>';
                echo '<div class="card-image">';
                echo '<img src="' . $post['image'] . '">';
                echo '</div>';
                echo '<div class="card-stacked">';
                echo '<div class="card-action">';
                // add comment
                echo '<form action="./add_comment.php" method="POST">';
                echo '<input type="hidden" name="post_id" value="' . $post['id'] . '">';
                echo '<input type="text" name="content" placeholder="Add comment...">';
                echo '<button type="submit" class="btn waves-effect waves-light">Add comment</button>';
                echo '</form>';
                // show comments
                $search_comments_query = "SELECT * FROM comments WHERE post_id = " . $post['id'] . " ORDER BY id DESC LIMIT 3";
                $comments = $myPDO->query($search_comments_query);
                // content with some style
                foreach ($comments as $comment) {
                  echo '<div class="card-content" style="background-color: #f5f5f5; padding: 10px; border-radius: 5px; border-bottom: 1px solid #e0e0e0;">';
                  echo '<p>' . $comment['content'] . '</p>';
                  echo '</div>';
                }
                echo '</div>';
                echo '</div>';
                echo '<hr/>';
              }
            ?>
            <!-- HELLO CATS<br>
            TUTAJ BĘDZIE PROSTA PODSTRONKA ZE ZDJĘCIAMI KOTÓW A POD NIMI KOMENTARZE I MOŻLIWOŚĆ DODAWANIA KOMENTARZY<br><br>
            UŻYTKOWNIK DODA KOMENTARZ Z JAVASCRIPTEM<br>
            <br>
            JAVASCRIPT WYWOŁA ALERT
            <br>
            W INNYM PRZYKŁADZIE JAVASCRIPT MOŻLIWE, ŻE PRZEJMIE JAKIEŚ DANE UŻYTKOWNIKA I EW. PRZEŚLE (MAILEM?) DO ATAKUJĄCEGO<br> -->
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