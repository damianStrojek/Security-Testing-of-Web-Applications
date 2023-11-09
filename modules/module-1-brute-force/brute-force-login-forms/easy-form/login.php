<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to open the SQLite database
function openDatabase() {
    $db = new SQLite3('easy-form-db.db');

    return $db;
}

// Function to authenticate user
function authenticateUser($username, $password) {

    $db = openDatabase();

    if (!$db) {
        die("Database connection error: " . $db->lastErrorMsg());
    }
 
    $query = $db->prepare('SELECT * FROM users WHERE username = :username');
    if (!$query) {
        die("Query preparation error: " . $db->lastErrorMsg());
    }
 
    $query->bindValue(':username', $username, SQLITE3_TEXT);
    $result = $query->execute();
    if (!$result) {
        die("Query execution error: " . $db->lastErrorMsg());
    }
 
    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        if (password_verify($password, $row['password'])) {
            return true;
        }
    }

    return false;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticateUser($username, $password)) {
        // Authentication successful, redirect to a different page
        header('Location: welcome.php'); // Replace with your welcome page
    } else {
        // Authentication failed, show an error message
        echo "Login failed. Please check your username and password.";
    }
}

?>
