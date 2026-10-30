<?php
require_once 'includes/session.inc';
require_once 'includes/db_connect.inc';

$pageTitle = 'Search Books | BookVerse';

$searchTerm = '';
$booksResult = null;

if (isset($_GET['keyword'])) {
    $searchTerm = trim($_GET['keyword']);

    if ($searchTerm !== '') {
        $sql = "SELECT book_id, title, author, genre,
                       publication_year, price, status, image_path
                FROM books
                WHERE title LIKE ?
                   OR author LIKE ?
                   OR description LIKE ?
                ORDER BY title";

        $stmt = mysqli_prepare($conn, $sql);

        $keyword = '%' . $searchTerm . '%';

        mysqli_stmt_bind_param(
            $stmt,
            "sss",
            $keyword,
            $keyword,
            $keyword
        );

        mysqli_stmt_execute($stmt);
        $booksResult = mysqli_stmt_get_result($stmt);
    }
}

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="page-heading mb-4">
        <span class="material-icons">search</span>
        <h1>Search Books</h1>
    </div>

    <form method="GET" action="search.php" class="mb-5">
        <div class="input-group">
            <input
                type="text"
                name="keyword"
                class="form-control"
                placeholder="Search by title, author or description..."
                value="<?= htmlspecialchars($searchTerm) ?>"
                required
            >
            <button type="submit" class="btn btn-primary">
                Search
            </button>
        </div>
    </form>

    <?php if ($searchTerm !== ''): ?>

        <h2 class="mb-4">
            Search Results for "<?= htmlspecialchars($searchTerm) ?>"
        </h2>

        <?php if ($booksResult && mysqli_num_rows($booksResult) > 0): ?>

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
                                    <?= htmlspecialchars($book['status']) ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

        <?php else: ?>

            <p>No books matched your search.</p>

        <?php endif; ?>

    <?php endif; ?>

</main>

<?php
include 'includes/footer.inc';
?>