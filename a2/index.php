<?php
include 'includes/db_connect.php';
$pageTitle = 'Home';
include 'includes/header.php';
?>

<body>
    <nav>
        <img src="images/logo.png" alt="controller Logo" class="nav-logo">
        <select>
            <option>Select</option>
            <option>Home</option>
            <option>Games</option>
            <option>Add Game</option>
            <option>Gallery</option>
        </select>
        <input type="text" placeholder="Search">
    </nav>
    <main class="section-container">
        <section>
            <h2 class="gamesrus-title">GAMESRUS</h2>
            <p class="index-heading">THE ULTIMATE GAMING</p>
            <p class="index-heading">DESTINATION</p>
        </section>
        <div class="image-container">
            <img src="images/main.jpeg" alt="Profile Image" class="profile-image">
        </div>
    </main>
    <footer>&copy;Copyright s3967816. All Rights Reserved | Designed for RMIT</footer>
</body>
</html>