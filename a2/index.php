<?php
$pageTitle = 'Home | BookVerse';

require_once 'includes/db_connect.inc';

// Get the 4 latest books added to the database
$sql = "SELECT book_id, title, author, genre, price, image_path, status
        FROM books
        ORDER BY created_at DESC, book_id DESC
        LIMIT 4";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$latestBooks = mysqli_stmt_get_result($stmt);

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main>

    <section class="home-carousel">
        <div id="bookCarousel" class="carousel slide" data-bs-ride="carousel">

            
            <!-- Carousel slides -->
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="assets/images/covers/1.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h1>The Midnight Library</h1>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/images/covers/2.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h2>Project Hail Mary</h2>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/images/covers/3.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h2>Dune</h2>
                    </div>
                </div>

                <div class="carousel-item">
                    <img src="assets/images/covers/4.png"
                         class="d-block w-100"
                         alt="Book cover">
                    <div class="carousel-caption">
                        <h2>The Hobbit</h2>
                    </div>
                </div>

            </div>

            <!-- Previous button -->
            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#bookCarousel"
                    data-bs-slide="prev">

                <span class="carousel-control-prev-icon"
                      aria-hidden="true"></span>

                <span class="visually-hidden">Previous</span>
            </button>

            <!-- Next button -->
            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#bookCarousel"
                    data-bs-slide="next">

                <span class="carousel-control-next-icon"
                      aria-hidden="true"></span>

                <span class="visually-hidden">Next</span>
            </button>

        </div>
        </section>


<!-- Featured Books -->
<section class="featured-books">

    <div class="featured-heading">
        <span class="material-icons">favorite</span>
        <h2>Featured Books</h2>
    </div>

    <div class="row g-3">

        <?php while ($book = mysqli_fetch_assoc($latestBooks)): ?>

            <?php
            $statusClass = strtolower($book['status']);
            $imagePath = 'assets/images/covers/' . $book['image_path'];
            ?>

            <div class="col-12 col-sm-6 col-lg-3">

                <div class="home-book-card">

                    <a href="details.php?id=<?= (int)$book['book_id'] ?>">
                        <img
                            src="<?= htmlspecialchars($imagePath) ?>"
                            alt="<?= htmlspecialchars($book['title']) ?>"
                        >
                    </a>

                    <div class="home-book-info">

                        <h3>
                            <a href="details.php?id=<?= (int)$book['book_id'] ?>">
                                <?= htmlspecialchars($book['title']) ?>
                            </a>
                        </h3>

                        <p>
                            <?= htmlspecialchars($book['genre']) ?>
                            ·
                            <?= htmlspecialchars($book['author']) ?>
                        </p>

                        <strong>
                            $<?= number_format((float)$book['price'], 2) ?>
                        </strong>

                        <span class="home-status <?= htmlspecialchars($statusClass) ?>">
                            <?= htmlspecialchars($book['status']) ?>
                        </span>

                    </div>

                </div>

            </div>

        <?php endwhile; ?>

    </div>

</section>

</main>

 <?php include 'includes/footer.inc';?>
