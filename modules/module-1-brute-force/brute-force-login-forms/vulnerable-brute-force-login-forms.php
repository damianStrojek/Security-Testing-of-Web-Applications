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
  <link rel="icon" href="./../../../assets/img/brute-force.png" />
  <title>Brute-Force Login Forms</title>
</head>
<body>
<!-- Navigation Menu-->
<nav class="hide-on-small-only">
  <ul class="side-nav fixed section table-of-contents">
    <li class="logo">
      <a id="logo-container" aria-label="Navigate to the beginning of the page" href="#intro"
      class="brand-logo grey-blue-text">
      <img src="./../../../assets/img/brute-force.png" class="img-responsive nav-pic" alt="avatar">
      </a>
    </li>
    <li class="bold">
      <a aria-label="Back to the Theory section" href="./../theory.html#vulnerable-websites" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-arrow-collapse-left small"></i><span>Go Back</span></a>
    </li>
    <li class="bold">
      <a aria-label="Scenario" href="#scenario" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-account-question small"></i><span>Scenario</span></a>
    </li>
    <li class="bold">
      <a aria-label="Easy Form" href="#easyform" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-form-textbox small"></i><span>Simple Login</span></a>
    </li>
    <li class="bold">
      <a aria-label="Intermediate Form" href="#intermediateform" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-form-textbox-password small"></i><span>Basic Auth</span></a>
    </li>
    <li class="bold">
      <a aria-label="Hard Form" href="#hardform" class="waves-effect waves-dark teal-text"><i
      class="mdi mdi-form-textbox-lock small"></i><span>Cookies</span></a>
    </li>
  </ul>
</nav>

<!-- Main Content-->
<main>

<!-- First Section: Scenario -->
<section id="scenario" class="section scrollspy">
  <h3 class="page-title white-text teal">Scenario</h3>
  <div class="container flow-text">     
    <p>

    <p>
      Tools that will be useful when carrying out this task:<br>
      - <a href="" target="_blank">BurpSuite</a><br>
      - <a href="" target="_blank">FoxyProxy</a><br>
    </p>
    <p>
      If you need any help, you can check the comments left by developers around a given section's source code.
    </p>
  </div>
</section>
  
<!-- Second Section: Easy Form -->
<!-- Simple form with requests login=^USER^&password=^PASS^-->
<section id="easyform" class="section scrollspy">
  <h3 class="page-title white-text teal">Simple Login Form</h3>
  <div class="container flow-text">     
    <p>
      In this section you are presented with a simple login form that uses <i>username</i> and <i>password</i> in the POST request.
    </p>
    <p>
      It's available under <a href="./easy-form/ef-login.html">Easy Login Form</a>.
    </p>
  </div>
</section>

<!-- Third Section: Intermediate Form -->
<!-- Maybe link to basic authentication? -->
<section id="intermediateform" class="section scrollspy">
  <h3 class="page-title white-text teal">Basic Authentication</h3>
  <div class="container flow-text">     
    <p>
    </p>
  </div>
</section>

<!-- Fourth Section: Hard Form -->
<!-- Cookies? -->
<section id="hardform" class="section scrollspy">
  <h3 class="page-title white-text teal">Login with Cookies</h3>
  <div class="container flow-text">     
    <p>
    </p>
  </div>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</section>

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
