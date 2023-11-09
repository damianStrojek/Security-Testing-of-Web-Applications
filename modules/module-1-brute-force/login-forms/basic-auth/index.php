<?php

// Copyright (C) 2023 Damian Strojek, Patryk Sikora
// Security Testing Environment for Web Applications
// Realised as part of engineering degree for Gdansk University of Technology

$authUsers = [
        // Bcrypt password generated using https://hostingcanada.org/htpasswd-generator/
        'wpadmin' => '$2y$10$rYlHpB9jWffCr.QHg8BGnO0qECUgb9ZCT6n7eHs8hEzjXV/9dPegi',
];

// Function to validate Basic Authentication credentials
function authenticate($username, $password) {
    global $authUsers;
    if (isset($authUsers[$username]) && crypt($password, $authUsers[$username]) === $authUsers[$username]) {
        return true;
    }
    return false;
}

// Check for Basic Authentication credentials in the request headers
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || !authenticate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Authentication required.';
    exit;
}
else {
    // Authentication succeeded
    // Perform the redirect
    header('Location: restricted-data.html');
    exit;
}

?>
