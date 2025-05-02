<?php
include 'includes/db_connect.php';
$pageTitle = 'Add Game';
include 'includes/header.php';

// Initialize variables
$message = '';
$messageClass = '';

// Process form 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // File upload 
        $targetDir = "userimages/";
        $targetFile = $targetDir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check === false) {
            throw new Exception("File is not an image.");
        }

        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            throw new Exception("Sorry, your file is too large (max 500KB).");
        }

        
        $allowedTypes = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($imageFileType, $allowedTypes)) {
            throw new Exception("Only JPG, JPEG, PNG & GIF files are allowed.");
        }

        
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        
        if (!move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }

        
        $stmt = $pdo->prepare("INSERT INTO games (gamename, type, description, caption, price, platform, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['game-name'],
            $_POST['type'],
            $_POST['description'],
            $_POST['image-caption'],
            $_POST['age'],
            $_POST['platform'],
            basename($_FILES["file"]["name"])
        ]);

        $message = "Game added successfully!";
        $messageClass = "success";
    } catch (Exception $e) {
        $message = "Error: " . $e->getMessage();
        $messageClass = "error";
    }
}

include 'includes/nav.php';
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
        <section class="form-container">
            <h2 class="form-title">Add a game</h2>
            <p class="form-subtitle">You can add a new game here</p>
            
            <?php if ($message): ?>
            <div class="form-message <?= $messageClass ?>"><?= $message ?></div>
            <?php endif; ?>
            
            <form method="POST" enctype="multipart/form-data">
                <label for="game-name">Game Name:</label>
                <input type="text" id="game-name" name="game-name" placeholder="Provide a name for the game" required>

                <label for="type">Type:</label>
                <input type="text" id="type" name="type" placeholder="Provide a type for the game" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Describe the game briefly" required></textarea>

                <label for="file">Select an Image:</label>
                <input type="file" id="file" name="file" accept="image/*" required>
                <small>Max image size: 500KB (JPG, PNG, JPEG, GIF only)</small>

                <label for="image-caption">Image Caption:</label>
                <input type="text" id="image-caption" name="image-caption" placeholder="Describe the image in one word" required>

                <label for="age">Price:</label>
                <input type="number" id="age" name="age" placeholder="Price of the game" step="0.01" min="0" required>

                <label for="platform">Platform:</label>
                <input type="text" id="platform" name="platform" placeholder="Platform of the game" required>

                <div class="form-buttons">
                    <button type="submit" class="submit-button">Submit</button>
                    <button type="reset" class="reset-button">Clear</button>
                </div>
            </form>
        </section>
    </main>
    <footer>&copy;Copyright s3967816. All Rights Reserved | Designed for RMIT</footer>
</body>
</html>