<?php
$pageTitle = 'Book Details | BookVerse';


require_once 'includes/session.inc';
require_once 'includes/db_connect.inc';

// Check that an ID was supplied in the URL
if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    die('Invalid book ID.');
}

$bookId = (int) $_GET['id'];

// Get the selected book securely
$sql = "SELECT books.*, users.username
        FROM books
        LEFT JOIN users ON books.user_id = users.user_id
        WHERE books.book_id = ?";

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

            <?php if ($book['user_id'] !== null): ?>
            <p>
                <strong>Seller:</strong>
                <a href="seller.php?id=<?= (int)$book['user_id'] ?>">
                <?= htmlspecialchars($book['username']) ?>
                </a>
            </p>
    <?php endif; ?>

            <h2 class="mt-4">Description</h2>

            <p>
                <?= nl2br(htmlspecialchars($book['description'])) ?>
            </p>



    <?php if (isset($_SESSION['user_id']) && (int)$_SESSION['user_id'] === (int)$book['user_id']): ?>

            <a href="edit.php?id=<?= (int)$book['book_id'] ?>" class="btn btn-primary mt-3">
            Edit Book
            </a>

            <button type="button" class="btn btn-danger mt-3"
            data-bs-toggle="modal" data-bs-target="#deleteModal">
            Delete Book
            </button>

        <?php endif; ?>0

<a href="books.php" class="btn btn-secondary mt-3">
    Back to Books
</a>

        </div>

    </div>

    <!-- Delete confirmation modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Are you sure you want to delete this book? This action cannot be undone.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <form action="delete.php" method="POST">
                        <input type="hidden" name="book_id" value="<?= (int)$book['book_id'] ?>">
                        <button type="submit" class="btn btn-danger">
                            Confirm Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.inc'; ?>0
