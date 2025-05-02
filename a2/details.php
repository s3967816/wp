<?php
include 'includes/db_connect.php';
$pageTitle = 'Game Details';
include 'includes/header.php';

if (!isset($_GET['id'])) {
    header('Location: games.php');
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM games WHERE gameid = ?");
$stmt->execute([$_GET['id']]);
$game = $stmt->fetch();

if (!$game) {
    header('Location: games.php');
    exit;
}
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
        <h1><?= htmlspecialchars($game['gamename']) ?></h1>
        <div class="game-details">
            <img src="userimages/<?= htmlspecialchars($game['image']) ?>" alt="<?= htmlspecialchars($game['caption']) ?>">
            <div>
                <p><strong>Type:</strong> <?= htmlspecialchars($game['type']) ?></p>
                <p><strong>Price:</strong> $<?= number_format($game['price'], 2) ?></p>
                <p><strong>Platform:</strong> <?= htmlspecialchars($game['platform']) ?></p>
                <p><strong>Description:</strong> <?= htmlspecialchars($game['description']) ?></p>
            </div>
        </div>
        <a href="games.php">Back to Games</a>
    </main>
    
    <footer>&copy;Copyright s3967816. All Rights Reserved | Designed for RMIT</footer>
</body>
</html>