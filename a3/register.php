
<?php
$pageTitle = 'Register | BookVerse';

require_once 'includes/session.inc';
require_once 'includes/db_connect.inc';

$message = '';
$messageType = '';

$username = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get and clean form values
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    // Check required fields
    if ($username === '' || $email === '' || $password === '' || $confirmPassword === '') {

        $message = 'Please complete all required fields.';
        $messageType = 'danger';

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = 'Please enter a valid email address.';
        $messageType = 'danger';

    } elseif (strlen($username) > 50 || strlen($email) > 100) {

        $message = 'Your username or email address is too long.';
        $messageType = 'danger';

    } elseif (strlen($password) < 8) {

        $message = 'Your password must be at least 8 characters long.';
        $messageType = 'danger';

    } elseif ($password !== $confirmPassword) {

        $message = 'Your passwords do not match.';
        $messageType = 'danger';

    } else {

        // Check whether username or email already exists
        $sql = "SELECT user_id FROM users WHERE username = ? OR email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) > 0) {

            $message = 'That username or email address is already registered.';
            $messageType = 'danger';

        } else {

            // Securely hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert the new user into the database
            $sql = "INSERT INTO users (username, email, password)
                    VALUES (?, ?, ?)";

            $insertStmt = mysqli_prepare($conn, $sql);

            mysqli_stmt_bind_param(
                $insertStmt,
                "sss",
                $username,
                $email,
                $hashedPassword
            );

            if (mysqli_stmt_execute($insertStmt)) {

                $_SESSION['flash_message'] = 'Registration successful. You can now log in.';
                $_SESSION['flash_type'] = 'success';

                header('Location: login.php');
                exit;

            } else {

                $message = 'Registration failed. Please try again.';
                $messageType = 'danger';
            }

            mysqli_stmt_close($insertStmt);
        }

        mysqli_stmt_close($stmt);
    }
}

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="page-heading mb-4">
        <span class="material-icons">person_add</span>
        <h1>Create an Account</h1>
    </div>

    <section class="add-book-container">

        <?php if ($message !== ''): ?>
            <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="post">

            <!-- Username -->
            <div class="mb-3">
                <label for="username" class="form-label">
                    <span class="material-icons">person</span>
                    Username
                </label>

                <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    maxlength="50"
                    value="<?= htmlspecialchars($username) ?>"
                    placeholder="Choose a username"
                    required
                >
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">
                    <span class="material-icons">email</span>
                    Email Address
                </label>

                <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    maxlength="100"
                    value="<?= htmlspecialchars($email) ?>"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">
                    <span class="material-icons">lock</span>
                    Password
                </label>

                <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    minlength="8"
                    placeholder="At least 8 characters"
                    required
                >
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="confirm_password" class="form-label">
                    <span class="material-icons">lock</span>
                    Confirm Password
                </label>

                <input
                    type="password"
                    class="form-control"
                    id="confirm_password"
                    name="confirm_password"
                    minlength="8"
                    placeholder="Enter your password again"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary add-book-button">
                <span class="material-icons">person_add</span>
                Create Account
            </button>

        </form>

        <p class="mt-3 mb-0">
            Already have an account?
            <a href="login.php">Log in here</a>.
        </p>

    </section>

</main>

<?php include 'includes/footer.inc'; ?>
