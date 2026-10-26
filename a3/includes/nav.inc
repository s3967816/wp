
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <!-- BookVerse logo -->
            <a class="navbar-brand" href="index.php">
                <span class="material-icons">menu_book</span>
                <span>BookVerse</span>
            </a>

            <!-- Mobile navigation button -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#bookverseNavbar"
                aria-controls="bookverseNavbar"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation links -->
            <div class="collapse navbar-collapse" id="bookverseNavbar">

                <div class="navbar-nav">

                    <a class="nav-link" href="index.php">
                        <span class="material-icons">home</span>
                        <span>Home</span>
                    </a>

                    <a class="nav-link" href="books.php">
                        <span class="material-icons">menu_book</span>
                        <span>Browse Books</span>
                    </a>

                    <a class="nav-link" href="gallery.php">
                        <span class="material-icons">photo_library</span>
                        <span>Gallery</span>
                    </a>

                    <?php if (isset($_SESSION['user_id'])): ?>

                        <a class="nav-link" href="add.php">
                            <span class="material-icons">add_circle</span>
                            <span>Add Book</span>
                        </a>

                        <a class="nav-link" href="seller.php">
                            <span class="material-icons">person</span>
                            <span>My Books</span>
                        </a>

                        <a class="nav-link" href="logout.php">
                            <span class="material-icons">logout</span>
                            <span>Logout</span>
                        </a>

                    <?php else: ?>

                        <a class="nav-link" href="login.php">
                            <span class="material-icons">login</span>
                            <span>Login</span>
                        </a>

                        <a class="nav-link" href="register.php">
                            <span class="material-icons">person_add</span>
                            <span>Register</span>
                        </a>

                    <?php endif; ?>

                </div>

            </div>

        </div>
    </nav>
</header>
