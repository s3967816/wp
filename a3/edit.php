<?php
require_once 'includes/session.inc';

// Only logged-in users can edit books
if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash_message'] = 'Please log in to edit a book.';
    $_SESSION['flash_type'] = 'warning';
    header('Location: login.php');
    exit;
}

require_once 'includes/db_connect.inc';

$pageTitle = 'Edit Book | BookVerse';
$message = '';
$messageType = '';

// Check that a valid book ID was supplied
$bookId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$bookId || $bookId < 1) {
    header('Location: books.php');
    exit;
}

// Retrieve the book only if it belongs to the logged-in user
$sql = "SELECT * FROM books WHERE book_id = ? AND user_id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ii", $bookId, $_SESSION['user_id']);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$book = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Stop if the book does not belong to this user
if (!$book) {
    $_SESSION['flash_message'] = 'You are not authorised to edit this book.';
    $_SESSION['flash_type'] = 'danger';
    header('Location: books.php');
    exit;
}


// Process the edit form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $publicationYear = (int)($_POST['publication_year'] ?? 0);
    $isbn = trim($_POST['isbn'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $bookCondition = trim($_POST['book_condition'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $status = trim($_POST['status'] ?? '');

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $newImagePath = $book['image_path'];
    $uploadedNewImage = false;

    if (
        $title === '' ||
        $author === '' ||
        $genre === '' ||
        $publicationYear <= 0 ||
        $description === '' ||
        $bookCondition === '' ||
        $price < 0 ||
        $status === ''
    ) {
        $message = 'Please complete all required fields.';
        $messageType = 'danger';

    } else {

        // Check whether a replacement image was uploaded
        if (isset($_FILES['image_path']) &&
            $_FILES['image_path']['error'] !== UPLOAD_ERR_NO_FILE) {

            if ($_FILES['image_path']['error'] !== UPLOAD_ERR_OK) {
                $message = 'The cover image could not be uploaded.';
                $messageType = 'danger';

            } else {
                $extension = strtolower(
                    pathinfo($_FILES['image_path']['name'], PATHINFO_EXTENSION)
                );

                if (!in_array($extension, $allowedExtensions, true)) {
                    $message = 'Only JPG, JPEG, PNG, GIF and WEBP images are allowed.';
                    $messageType = 'danger';

                } else {
                    $uniqueFilename = uniqid('book_', true) . '.' . $extension;
                    $uploadPath = 'assets/images/covers/' . $uniqueFilename;

                    if (move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadPath)) {
                        $newImagePath = $uniqueFilename;
                        $uploadedNewImage = true;
                    } else {
                        $message = 'The cover image could not be saved.';
                        $messageType = 'danger';
                    }
                }
            }
        }

        if ($message === '') {

            $updateSql = "UPDATE books
                          SET title = ?, author = ?, genre = ?,
                              publication_year = ?, isbn = ?,
                              description = ?, book_condition = ?,
                              price = ?, image_path = ?, status = ?
                          WHERE book_id = ? AND user_id = ?";

            $updateStmt = mysqli_prepare($conn, $updateSql);

            mysqli_stmt_bind_param(
                $updateStmt,
                "sssisssdssii",
                $title,
                $author,
                $genre,
                $publicationYear,
                $isbn,
                $description,
                $bookCondition,
                $price,
                $newImagePath,
                $status,
                $bookId,
                $_SESSION['user_id']
            );

            if (mysqli_stmt_execute($updateStmt)) {

                // Remove the old image if a replacement was uploaded
                if ($uploadedNewImage && !empty($book['image_path'])) {
                    $oldImage = 'assets/images/covers/' . basename($book['image_path']);

                    if (file_exists($oldImage)) {
                        unlink($oldImage);
                    }
                }

                $_SESSION['flash_message'] = 'Book updated successfully.';
                $_SESSION['flash_type'] = 'success';

                header('Location: details.php?id=' . $bookId);
                exit;

            } else {
                if ($uploadedNewImage && file_exists($uploadPath)) {
                    unlink($uploadPath);
                }

                $message = 'The book could not be updated.';
                $messageType = 'danger';
            }

            mysqli_stmt_close($updateStmt);
        }
    }

    // Keep the submitted values visible if validation fails
    $book = array_merge($book, [
        'title' => $title,
        'author' => $author,
        'genre' => $genre,
        'publication_year' => $publicationYear,
        'isbn' => $isbn,
        'description' => $description,
        'book_condition' => $bookCondition,
        'price' => $price,
        'status' => $status,
        'image_path' => $newImagePath
    ]);
}


?>

<?php
include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="page-heading mb-4">
        <span class="material-icons">edit</span>
        <h1>Edit Book</h1>
    </div>

    <section class="add-book-container">

        <?php if ($message !== ''): ?>
            <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" id="title"
                       name="title" value="<?= htmlspecialchars($book['title']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author"
                       name="author" value="<?= htmlspecialchars($book['author']) ?>" required>
            </div>

            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre"
                       name="genre" value="<?= htmlspecialchars($book['genre']) ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="publication_year" class="form-label">Publication Year</label>
                    <input type="number" class="form-control" id="publication_year"
                           name="publication_year"
                           value="<?= htmlspecialchars($book['publication_year']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="price" class="form-label">Price ($)</label>
                    <input type="number" class="form-control" id="price"
                           name="price" step="0.01" min="0"
                           value="<?= htmlspecialchars($book['price']) ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="isbn" class="form-label">ISBN</label>
                    <input type="text" class="form-control" id="isbn"
                           name="isbn" value="<?= htmlspecialchars($book['isbn']) ?>" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="book_condition" class="form-label">Book Condition</label>
                    <select class="form-select" id="book_condition"
                            name="book_condition" required>
                        <option value="New" <?= $book['book_condition'] === 'New' ? 'selected' : '' ?>>New</option>
                        <option value="Gently Used" <?= $book['book_condition'] === 'Gently Used' ? 'selected' : '' ?>>Gently Used</option>
                        <option value="Fair" <?= $book['book_condition'] === 'Fair' ? 'selected' : '' ?>>Fair</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description"
                          name="description" rows="4" required><?= htmlspecialchars($book['description']) ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Current Cover Image</label>
                <div>
                    <?php if (!empty($book['image_path'])): ?>
                        <img src="assets/images/covers/<?= htmlspecialchars($book['image_path']) ?>"
                             alt="Current book cover" style="max-width: 150px;">
                    <?php endif; ?>
                </div>
            </div>

            <div class="mb-3">
                <label for="image_path" class="form-label">Replace Cover Image (optional)</label>
                <input type="file" class="form-control" id="image_path"
                       name="image_path" accept=".jpg,.jpeg,.png,.gif,.webp">
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Availability Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Available" <?= $book['status'] === 'Available' ? 'selected' : '' ?>>Available</option>
                    <option value="Reserved" <?= $book['status'] === 'Reserved' ? 'selected' : '' ?>>Reserved</option>
                    <option value="Sold" <?= $book['status'] === 'Sold' ? 'selected' : '' ?>>Sold</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary add-book-button">
                Save Changes
            </button>

            <a href="details.php?id=<?= (int)$book['book_id'] ?>"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>
    </section>
</main>

<?php include 'includes/footer.inc'; ?>