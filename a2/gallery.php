<?php
$pageTitle = 'Gallery | BookVerse';

require_once 'includes/db_connect.inc';

// Get all books that have a cover image
$sql = "SELECT book_id, title, image_path
        FROM books
        WHERE image_path IS NOT NULL
        AND image_path != ''
        ORDER BY title";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_execute($stmt);
$galleryResult = mysqli_stmt_get_result($stmt);

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="page-heading mb-4">
        <span class="material-icons">photo_library</span>
        <h1>Book Gallery</h1>
    </div>

    <p class="gallery-intro">
        Explore our collection of book covers.
    </p>

    <section class="gallery-grid">

        <?php while ($book = mysqli_fetch_assoc($galleryResult)): ?>

            <?php
            $imagePath = 'assets/images/covers/' . $book['image_path'];
            ?>

            <div class="gallery-item">

                <img
                    src="<?= htmlspecialchars($imagePath) ?>"
                    alt="<?= htmlspecialchars($book['title']) ?>"
                    class="gallery-image gallery-trigger"
                    data-bs-toggle="modal"
                    data-bs-target="#galleryModal"
                    data-image="<?= htmlspecialchars($imagePath) ?>"
                >

            </div>

        <?php endwhile; ?>

    </section>


    <!-- Gallery Modal -->
    <div
        class="modal fade"
        id="galleryModal"
        tabindex="-1"
        aria-labelledby="galleryModalLabel"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-lg modal-dialog-centered">

            <div class="modal-content gallery-modal">

                <div class="modal-header">

                    <h2 class="modal-title" id="galleryModalLabel">
                        Book Cover
                    </h2>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                    </button>

                </div>

                <div class="modal-body text-center">

                    <img
                        id="modalImage"
                        src=""
                        alt="Selected book cover"
                        class="modal-book-image"
                    >

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="modal-navigation"
                        id="previousImage">
                        <span class="material-icons">chevron_left</span>
                        Previous
                    </button>

                    <button
                        type="button"
                        class="modal-navigation next"
                        id="nextImage">
                        Next
                        <span class="material-icons">chevron_right</span>
                    </button>

                </div>

            </div>

        </div>

    </div>

</main>

<?php include 'includes/footer.inc'; ?>
