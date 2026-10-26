<?php
// Start the session if one is not already active
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Display and clear any flash message
function displayFlashMessage() {
    if (isset($_SESSION['flash_message'])) {
        $message = $_SESSION['flash_message'];
        $type = $_SESSION['flash_type'] ?? 'info';

        echo '<div class="alert alert-' . htmlspecialchars($type) . ' alert-dismissible fade show" role="alert">';
        echo htmlspecialchars($message);
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';

        unset($_SESSION['flash_message']);
        unset($_SESSION['flash_type']);
    }
}
?>