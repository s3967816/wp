<?php

// Detect whether BookVerse is running locally or on RMIT
$is_local = (
    $_SERVER['HTTP_HOST'] === 'localhost' ||
    $_SERVER['HTTP_HOST'] === '127.0.0.1'
);

if ($is_local) {

    // Local database settings
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'bookverse';

} else {

    // RMIT Jacob 5 database settings
    $db_host = 'talsprddb02.int.its.rmit.edu.au';
    $db_user = 'S3967816';
    $db_pass = 'SDAMSdbpa55%';
    $db_name = 's3967816';
}

// Connect using procedural MySQLi
$conn = mysqli_connect(
    $db_host,
    $db_user,
    $db_pass,
    $db_name,
    3306
);

// Check connection
if (!$conn) {
    die('Database connection failed: ' . mysqli_connect_error());
}

// Set character encoding
mysqli_set_charset($conn, 'utf8mb4');

?>