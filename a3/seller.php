
<?php
$pageTitle = 'Seller Books | BookVerse';

require_once 'includes/db_connect.inc';

// Get the owner ID from the URL
$ownerId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$ownerId || $ownerId < 1) {
    header('Location: books.php');
    exit;
}

// Get books belonging to the selected owner
$sql = "SELECT book_id, title, author, genre, publication_year, price, status
        FROM books
        WHERE user_id = ?
        ORDER BY title";

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $ownerId);
mysqli_stmt_execute($stmt);

$booksResult = mysqli_stmt_get_result($stmt);

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="page-heading mb-4">
        <span class="material-icons">person</span>
        <h1>Seller Books</h1>
    </div>

    <div class="books-table-container">

        <div class="table-responsive">

            <table class="table books-table">

                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Genre</th>
                        <th>Year</th>
                        <th>Price</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if (mysqli_num_rows($booksResult) > 0): ?>

                        <?php while ($book = mysqli_fetch_assoc($booksResult)): ?>

                            <tr>

                                <td>
                                    <a href="details.php?id=<?= (int)$book['book_id'] ?>">
                                        <?= htmlspecialchars($book['title']) ?>
                                    </a>
                                </td>

                                <td><?= htmlspecialchars($book['author']) ?></td>
                                <td><?= htmlspecialchars($book['genre']) ?></td>
                                <td><?= htmlspecialchars($book['publication_year']) ?></td>
                                <td>$<?= number_format((float)$book['price'], 2) ?></td>

                                <td>
                                    <span class="status-badge <?= strtolower(htmlspecialchars($book['status'])) ?>">
                                        <?= htmlspecialchars($book['status']) ?>
                                    </span>
                                </td>

                            </tr>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="6" class="text-center">
                                No books are currently listed by this seller.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</main>

<?php include 'includes/footer.inc'; ?>
