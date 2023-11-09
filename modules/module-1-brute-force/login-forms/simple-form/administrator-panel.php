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
  <link rel="stylesheet" href="./../../../../assets/css/style.css" />
  <link rel="icon" href="./../../../../assets/img/brute-force.png" />
  <title>Administrator Panel</title>
</head>
<body>
<!-- Navigation Menu-->
<nav class="hide-on-small-only">
  <ul class="side-nav fixed section table-of-contents">
    <li class="bold">
      <a aria-label="Go back" href="./../index.html#easyform" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-arrow-collapse-left small"></i><span>Go Back</span></a>
    </li>
  </ul>
</nav>

<!-- Main Content-->
<main>

<!-- First Section: Congratulations-->
<section id="login-form" class="section scrollspy">
  <h3 class="page-title white-text teal">Administrator Portal</h3>
  <div class="container flow-text">    
        <p>
                You were able to <b>successfully crack the password of user admin</b> and get inside the Administrator Panel.
        </p>
        <p>
                For the future - when using tools, you should always send requests to the files that are interpreting the content (in this example it's <i>login.php</i>).<br>
                If you have requested anything from <i>index.html</i> it wouldn't work.
        </p>
        <div>
                <img src="./../../assets/img/bruteforce-loginforms-exercise1-example.png" class="img-modules" alt="hydra failed/success example">
        </div>
        <br><br>
  </div>
</section>

</main>

</body>
</html>