<?php
require_once 'includes/session.inc';
require_once 'includes/db_connect.inc';

// Only logged-in users can delete books
if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash_message'] = 'Please log in to delete a book.';
    $_SESSION['flash_type'] = 'warning';
    header('Location: login.php');
    exit;
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['book_id'])) {
    header('Location: books.php');
    exit;
}

$bookId = filter_input(INPUT_POST, 'book_id', FILTER_VALIDATE_INT);

if (!$bookId || $bookId < 1) {
    $_SESSION['flash_message'] = 'Invalid book ID.';
    $_SESSION['flash_type'] = 'danger';
    header('Location: books.php');
    exit;
}

// Find the book and check its owner
$sql = "SELECT image_path FROM books
        WHERE book_id = ? AND user_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $bookId, $_SESSION['user_id']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$book = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Stop if the book does not belong to this user
if (!$book) {
    $_SESSION['flash_message'] = 'You are not authorised to delete this book.';
    $_SESSION['flash_type'] = 'danger';
    header('Location: books.php');
    exit;
}

// Delete the book from the database
$deleteSql = "DELETE FROM books WHERE book_id = ? AND user_id = ?";

$deleteStmt = mysqli_prepare($conn, $deleteSql);
mysqli_stmt_bind_param($deleteStmt, "ii", $bookId, $_SESSION['user_id']);

if (mysqli_stmt_execute($deleteStmt)) {

    // Remove the associated cover image
    if (!empty($book['image_path'])) {
        $imagePath = 'assets/images/covers/' . basename($book['image_path']);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $_SESSION['flash_message'] = 'Book successfully deleted.';
    $_SESSION['flash_type'] = 'success';

} else {
    $_SESSION['flash_message'] = 'Unable to delete the book.';
    $_SESSION['flash_type'] = 'danger';
}

mysqli_stmt_close($deleteStmt);

header('Location: books.php');
exit;
?>