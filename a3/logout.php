
<?php
require_once 'includes/session.inc';

// Clear all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Start a new session to store the logout message
session_start();

$_SESSION['flash_message'] = 'You have successfully logged out.';
$_SESSION['flash_type'] = 'success';

// Redirect to the login page
header('Location: login.php');
exit;
?>
