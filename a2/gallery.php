<?php
include 'includes/db_connect.php';
$pageTitle = 'Gallery';
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
    <main>
        <section>
            <h2 class="gallery-title">GamesRUs has a lot to offer!</h2>
            <p class="gallery-description">To cater to the rapidly changing gaming landscape, ShopRUs also provides trade-in services and pre-owned game sales, allowing gamers to exchange old titles for store credit or discounted purchases. Additionally, the store has a strong online presence, with a user-friendly website offering nationwide shipping, making it a go-to for customers who can't visit in person. Their loyalty program offers regular customers exclusive discounts, early access to sales, and invitations to members-only events.</p>
            <p class="gallery-description">ShopRUs continues to evolve, staying ahead of trends in gaming and community engagement. With its commitment to providing the best gaming experience, it's no wonder ShopRUs is a staple for gamers, whether they're veterans of the craft or just picking up a controller for the first time.</p>
        </section>
        
        <div class="gallery-container">
            <?php
  
            try {
                $stmt = $pdo->query("SELECT * FROM games");
                
                while ($row = $stmt->fetch()) {
                    echo '<div class="gallery-item">';
                    echo '<img src="userimages/' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['caption']) . '" class="gallery-image">';
                    echo '<p class="gallery-caption">' . htmlspecialchars($row['gamename']) . '</p>';
                    echo '</div>';
                }
            } catch (PDOException $e) {
                echo '<div class="error-message">Error loading gallery: ' . $e->getMessage() . '</div>';
            }
            ?>
        </div>
    </main>
    <footer>&copy;Copyright s3967816. All Rights Reserved | Designed for RMIT</footer>
</body>
</html>