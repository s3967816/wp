<?php
$pageTitle = 'Add Book | BookVerse';

require_once 'includes/db_connect.inc';

$message = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get and clean form values
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $publicationYear = (int) ($_POST['publication_year'] ?? 0);
    $isbn = trim($_POST['isbn'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $bookCondition = trim($_POST['book_condition'] ?? '');
    $price = (float) ($_POST['price'] ?? 0);
    $status = trim($_POST['status'] ?? '');

    // Allowed image extensions
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

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

    } elseif (
        !isset($_FILES['image_path']) ||
        $_FILES['image_path']['error'] !== UPLOAD_ERR_OK
    ) {
        $message = 'Please upload a valid book cover.';
        $messageType = 'danger';

    } else {

        $originalName = $_FILES['image_path']['name'];
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions, true)) {

            $message = 'Only JPG, JPEG, PNG, GIF and WEBP images are allowed.';
            $messageType = 'danger';

        } else {

            // Generate a unique filename instead of using the original filename
            $uniqueFilename = uniqid('book_', true) . '.' . $extension;

            $uploadDirectory = 'assets/images/covers/';
            $uploadPath = $uploadDirectory . $uniqueFilename;

            if (move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadPath)) {

                $sql = "INSERT INTO books
                        (title, author, genre, publication_year, isbn,
                         description, book_condition, price, image_path, status)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_prepare($conn, $sql);

                mysqli_stmt_bind_param(
                    $stmt,
                    "sssisssdss",
                    $title,
                    $author,
                    $genre,
                    $publicationYear,
                    $isbn,
                    $description,
                    $bookCondition,
                    $price,
                    $uniqueFilename,
                    $status
                );

                if (mysqli_stmt_execute($stmt)) {

                    $message = 'Book added successfully.';
                    $messageType = 'success';

                } else {

                    // Remove uploaded image if database insert fails
                    if (file_exists($uploadPath)) {
                        unlink($uploadPath);
                    }

                    $message = 'The book could not be added to the database.';
                    $messageType = 'danger';
                }

            } else {

                $message = 'The cover image could not be uploaded.';
                $messageType = 'danger';
            }
        }
    }
}

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="page-heading mb-4">
        <span class="material-icons">add_circle</span>
        <h1>Add New Book</h1>
    </div>

    <section class="add-book-container">

        <?php if ($message !== ''): ?>

            <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
                <?= htmlspecialchars($message) ?>
            </div>

        <?php endif; ?>

        <form
            id="addBookForm"
            method="post"
            enctype="multipart/form-data"
        >

            <!-- Book Title -->
            <div class="mb-3">

                <label for="title" class="form-label">
                    <span class="material-icons">title</span>
                    Book Title
                </label>

                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    placeholder="Enter book title"
                    required
                >

            </div>

            <!-- Author Name -->
            <div class="mb-3">

                <label for="author" class="form-label">
                    <span class="material-icons">person</span>
                    Author Name
                </label>

                <input
                    type="text"
                    class="form-control"
                    id="author"
                    name="author"
                    placeholder="Enter author name"
                    required
                >

            </div>

            <!-- Genre -->
            <div class="mb-3">

                <label for="genre" class="form-label">
                    Genre
                </label>

                <select
                    class="form-select"
                    id="genre"
                    name="genre"
                    required
                >
                    <option value="" selected disabled>
                        Select a genre
                    </option>

                    <option value="Fiction">Fiction</option>
                    <option value="Fantasy">Fantasy</option>
                    <option value="Science Fiction">Science Fiction</option>
                    <option value="Mystery">Mystery</option>
                    <option value="Romance">Romance</option>
                    <option value="Biography">Biography</option>
                    <option value="History">History</option>
                    <option value="Self Help">Self Help</option>
                </select>

            </div>

            <div class="row">

                <!-- Publication Year -->
                <div class="col-md-6 mb-3">

                    <label for="publication_year" class="form-label">
                        <span class="material-icons">calendar_month</span>
                        Publication Year
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="publication_year"
                        name="publication_year"
                        placeholder="2024"
                        required
                    >

                </div>

                <!-- Price -->
                <div class="col-md-6 mb-3">

                    <label for="price" class="form-label">
                        <span class="material-icons">attach_money</span>
                        Price ($)
                    </label>

                    <input
                        type="number"
                        class="form-control"
                        id="price"
                        name="price"
                        placeholder="19.99"
                        step="0.01"
                        min="0"
                        required
                    >

                </div>

            </div>

            <div class="row">

                <!-- ISBN -->
                <div class="col-md-6 mb-3">

                    <label for="isbn" class="form-label">
                        ISBN
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="isbn"
                        name="isbn"
                        placeholder="978-1-234567-89-0"
                        required
                    >

                </div>

                <!-- Book Condition -->
                <div class="col-md-6 mb-3">

                    <label for="book_condition" class="form-label">
                        <span class="material-icons">inventory_2</span>
                        Book Condition
                    </label>

                    <select
                        class="form-select"
                        id="book_condition"
                        name="book_condition"
                        required
                    >
                        <option value="" selected disabled>
                            Select condition
                        </option>

                        <option value="New">New</option>
                        <option value="Gently Used">Gently Used</option>
                        <option value="Fair">Fair</option>
                    </select>

                </div>

            </div>

            <!-- Description -->
            <div class="mb-3">

                <label for="description" class="form-label">
                    <span class="material-icons">description</span>
                    Description
                </label>

                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Enter book description"
                    required
                ></textarea>

            </div>

            <!-- Upload Cover Image -->
            <div class="mb-3">

                <label for="image_path" class="form-label">
                    <span class="material-icons">image</span>
                    Upload Cover Image
                </label>

                <input
                    type="file"
                    class="form-control"
                    id="image_path"
                    name="image_path"
                    accept=".jpg,.jpeg,.png,.gif,.webp"
                    required
                >

                <div id="imagePreview" class="mt-3"></div>

            </div>

            <!-- Status -->
            <div class="mb-3">

                <label for="status" class="form-label">
                    <span class="material-icons">check_circle</span>
                    Availability Status
                </label>

                <select
                    class="form-select"
                    id="status"
                    name="status"
                    required
                >
                    <option value="Available">Available</option>
                    <option value="Reserved">Reserved</option>
                    <option value="Sold">Sold</option>
                </select>

            </div>

            <!-- Agreement -->
            <div class="form-check mb-3">

                <input
                    class="form-check-input"
                    type="checkbox"
                    id="agree"
                    name="agree"
                    required
                >

                <label class="form-check-label" for="agree">
                    I agree that this book information is accurate and complete
                </label>

            </div>

            <button
                type="submit"
                class="btn btn-primary add-book-button"
            >
                <span class="material-icons">lock</span>
                Add Book to Collection
            </button>

        </form>

    </section>

</main>

<?php include 'includes/footer.inc'; ?>
