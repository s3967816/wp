<?php

// Check whether BookVerse is running locally or on the RMIT server
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {

    // Local database settings
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'bookverse';

} else {

    // RMIT Jacob 5 database settings
    $db_host = 'talsprddb02.int.its.rmit.edu.au';
    $db_user = 's3967816';
    $db_pass = 'wJpg6zeT71WzYO*3rg';
    $db_name = 'S3967816_159009';
}

// Connect to MySQL using procedural MySQLi
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Stop and display an error if the connection fails
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}
?>
