<?php
include 'includes/db_connect.php';
$pageTitle = 'Games';
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
            <h2 class="gamespage-title">Discover GAMERUS</h2>
            <p class="info">LOCATED IN THE HEART OF THE CITY,SHOPRUS IS A HAVEN FOR BOTH CASUAL GAMERS AND DEDICATEDENTHUSIASTS ALIKE. ESTABLISHED IN 2010, THE STORE HAS GROWN INTO A COMMUNITY HUB, OFFERING A WIDE ARRAY OF VIDEO
                GAMES, BOARD GAMES, CONSOLES, AND GAMING ACCESORIES, FROM THE LATEST AAA TITLES TO INDIE GEMS, SHOPRUS PRIDES ITSELF ON MAINTAINING A DIVERSE AND CAREFULLY CURATED CELECTION. WEATHER YOU'RE LOOKING FOR THE HOTTEST NEW RELEASE OR A NOSTALGIC CLASSIC, THE KNOWLEDGEABLE STAFF AT SHOPRUS IS ALWAYS READY TO ASSIST WITH RECOMMENDATIONS OR TROUBLESHOOTING ANY GAME-RELATED QUERIES.</p>
        </section>
        <div class="image-container-games">
            <img src="images/games.jpeg" alt="gamespageimg" class="games-page-image">
        </div>

        <div class="table">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Platforms</th>
                </tr>
                <?php
                
                try {
                    $stmt = $pdo->query("SELECT * FROM games");
                    
                    while ($row = $stmt->fetch()) {
                        echo "<tr>";
                        echo "<td><a href='details.php?id=" . $row['gameid'] . "'>" . htmlspecialchars($row['gamename']) . "</a></td>";
                        echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                        echo "<td>$" . number_format($row['price'], 2) . "</td>";
                        echo "<td>" . htmlspecialchars($row['platform']) . "</td>";
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    echo "<tr><td colspan='4'>Error loading games: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </table>
        </div>
    </main>
    <footer>&copy;Copyright s3967816. All Rights Reserved | Designed for RMIT</footer>
</body>
</html>