<!-- 

  Copyright (C) 2023 Damian Strojek, Patryk Sikora

  Security Testing Environment for Web Applications
  Realised as part of engineering degree for Gdansk University of Technology

-->
<!DOCTYPE html>
<?php
  $username = $_POST['uname'];
  $password = $_POST['passwd'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $myPDO = new PDO('sqlite:./advanced_sqli.db');
  $query = "SELECT * FROM users WHERE login = '$username'";

  error_log("Executing: " . $query);
  try {
  $result = $myPDO->query($query);
  } catch (Exception $e) {
    error_log("Register [error]: " . $e->getMessage());
    header("Location: register_form.php?error=3&err_msg=" . $e->getMessage());
    exit();
  }

  $count = 0;
  foreach ($result as $row) {
    $count++;
  }

  if ($count > 0) {
    error_log("Register [user already exists]: " . $username);
    header("Location: register_form.php?error=1");
    exit();
  }

  // else 

  $query2 = "INSERT INTO users (login, password, first_name, last_name, total_money, total_loans) VALUES ('$username', '$password', '$fname', '$lname', 0, 0)";
  error_log("Executing: " . $query2);
  try {
  $myPDO->exec($query2);
  } catch (Exception $e) {
    error_log("Register [error]: " . $e->getMessage());
    header("Location: register_form.php?error=3&err_msg=" . $e->getMessage());
    exit();
  }

  error_log("Executing: " . $query);
  try {
  $result = $myPDO->query($query);
  } catch (Exception $e) {
    error_log("Register [error]: " . $e->getMessage());
    header("Location: register_form.php?error=3&err_msg=" . $e->getMessage());
    exit();
  }
  
  $count = 0;
  
  foreach ($result as $row) {
    $count++;
  }

  if ($count == 1) {
    error_log("Register [success]: " . $username);
    header("Location: register_form.php?error=4");
    exit();
  }
  else {
    error_log("Register [error]: " . $username);
    header("Location: register_form.php?error=2");
    exit();
  }
  
?>