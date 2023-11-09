<?php

// Copyright (C) 2023 Damian Strojek, Patryk Sikora
// Security Testing Environment for Web Applications
// Realised as part of engineering degree for Gdansk University of Technology

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to open the SQLite database
function openDatabase() {
    $db = new SQLite3('./../../assets/files/simple-form.db');

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

    if(strlen($username) >= 20 || strlen($password) >= 20){
        // Authentication failed, return an error message
        $response = array(
            "success" => false,
            "message" => "Authorization failed. Your username or password length should be lower than 21 characters."
        );
        echo json_encode($response);
    }
    else {
        $sanitized_username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
        $sanitized_password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

        if (authenticateUser($sanitized_username, $sanitized_password)) {
            // Authentication successful, you can return a JSON response
            $response = array(
                "success" => true,
                "message" => "Login successful"
            );
            echo json_encode($response);
        } else {
            // Authentication failed, return an error message
            $response = array(
                "success" => false,
                "message" => "Authorization failed. Please check your username and password."
            );
            echo json_encode($response);
        }
    }
    
}

?>