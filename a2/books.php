<?php
$pageTitle = 'Browse Books | BookVerse';

require_once 'includes/db_connect.inc';

// Get all books
$sql = "SELECT book_id, title, author, genre, publication_year, price, status
        FROM books
        ORDER BY title";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$booksResult = mysqli_stmt_get_result($stmt);

// Get the available status values from the database
$statusSql = "SELECT DISTINCT status FROM books ORDER BY status";

$statusStmt = mysqli_prepare($conn, $statusSql);
mysqli_stmt_execute($statusStmt);
$statusResult = mysqli_stmt_get_result($statusStmt);

include 'includes/header.inc';
include 'includes/nav.inc';
?>


    <main class="container py-5">

        <div class="page-heading mb-4">
            <span class="material-icons">library_books</span>
            <h1>All Books</h1>
        </div>

        <section class="filter-section mb-4">

            <label for="statusFilter">Filter by Status:</label>

            <select id="statusFilter" class="form-select">

    <option value="all">Show All</option>

    <?php while ($status = mysqli_fetch_assoc($statusResult)): ?>

        <option value="<?= htmlspecialchars($status['status']) ?>">
            <?= htmlspecialchars($status['status']) ?>
        </option>

    <?php endwhile; ?>

</select>

        </section>

        <section class="books-table-container">

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

<?php while ($book = mysqli_fetch_assoc($booksResult)): ?>

    <tr data-status="<?= htmlspecialchars($book['status']) ?>">

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

</tbody>
                </table>

            </div>

        </section>

    </main>

   <?php include 'includes/footer.inc'; ?>
