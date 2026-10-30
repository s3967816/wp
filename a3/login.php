
<?php
$pageTitle = 'Login | BookVerse';

require_once 'includes/session.inc';
require_once 'includes/db_connect.inc';

$message = '';
$messageType = '';

$login = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form values
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    // Check required fields
    if ($login === '' || $password === '') {

        $message = 'Please enter your username/email and password.';
        $messageType = 'danger';

    } else {

        // Find user by username or email
        $sql = "SELECT user_id, username, password
                FROM users
                WHERE username = ? OR email = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ss", $login, $login);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($user = mysqli_fetch_assoc($result)) {

            // Verify the submitted password
            if (password_verify($password, $user['password'])) {

                // Create a new session ID after successful login
                session_regenerate_id(true);

                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];

                $_SESSION['flash_message'] = 'Welcome back, ' . $user['username'] . '!';
                $_SESSION['flash_type'] = 'success';

                header('Location: seller.php');
                exit;

            } else {

                $message = 'Incorrect username/email or password.';
                $messageType = 'danger';
            }

        } else {

            $message = 'Incorrect username/email or password.';
            $messageType = 'danger';
        }

        mysqli_stmt_close($stmt);
    }
}

include 'includes/header.inc';
include 'includes/nav.inc';
?>

<main class="container py-5">

    <div class="page-heading mb-4">
        <span class="material-icons">login</span>
        <h1>Login to BookVerse</h1>
    </div>

    <section class="add-book-container">

        <?php if ($message !== ''): ?>
            <div class="alert alert-<?= htmlspecialchars($messageType) ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <form method="post">

            <!-- Username or Email -->
            <div class="mb-3">
                <label for="login" class="form-label">
                    <span class="material-icons">person</span>
                    Username or Email
                </label>

                <input
                    type="text"
                    class="form-control"
                    id="login"
                    name="login"
                    value="<?= htmlspecialchars($login) ?>"
                    placeholder="Enter your username or email"
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
                    placeholder="Enter your password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary add-book-button">
                <span class="material-icons">login</span>
                Login
            </button>

        </form>

        <p class="mt-3 mb-0">
            Don't have an account?
            <a href="register.php">Register here</a>.
        </p>

    </section>

</main>

<?php include 'includes/footer.inc'; ?>
