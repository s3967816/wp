<?php
$pageTitle = 'Book Details | BookVerse';

require_once 'includes/db_connect.inc';

// Check that an ID was supplied in the URL
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die('Invalid book ID.');
}

$bookId = (int) $_GET['id'];

// Get the selected book securely
$sql = "SELECT * FROM books WHERE book_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $bookId);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$book = mysqli_fetch_assoc($result);

// Stop if the book does not exist
if (!$book) {
    die('Book not found.');
}

$pageTitle = $book['title'] . ' | BookVerse';

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="row g-5 align-items-start">

        <div class="col-md-5 text-center">
            <?php if (!empty($book['image_path'])): ?>
                <img
                    src="assets/images/covers/<?= htmlspecialchars($book['image_path']) ?>"
                    alt="<?= htmlspecialchars($book['title']) ?>"
                    class="img-fluid book-cover"
                >
            <?php endif; ?>
        </div>

        <div class="col-md-7">

            <h1><?= htmlspecialchars($book['title']) ?></h1>

            <p>
                <strong>Author:</strong>
                <?= htmlspecialchars($book['author']) ?>
            </p>

            <p>
                <strong>Genre:</strong>
                <?= htmlspecialchars($book['genre']) ?>
            </p>

            <p>
                <strong>Publication Year:</strong>
                <?= htmlspecialchars($book['publication_year']) ?>
            </p>

            <p>
                <strong>ISBN:</strong>
                <?= htmlspecialchars($book['isbn']) ?>
            </p>

            <p>
                <strong>Condition:</strong>
                <?= htmlspecialchars($book['book_condition']) ?>
            </p>

            <p>
                <strong>Price:</strong>
                $<?= number_format((float)$book['price'], 2) ?>
            </p>

            <p>
                <strong>Status:</strong>
                <?= htmlspecialchars($book['status']) ?>
            </p>

            <h2 class="mt-4">Description</h2>

            <p>
                <?= nl2br(htmlspecialchars($book['description'])) ?>
            </p>

            <a href="books.php" class="btn btn-primary mt-3">
                Back to Books
            </a>

        </div>

    </div>

</main>

<?php include 'includes/footer.inc'; ?>
