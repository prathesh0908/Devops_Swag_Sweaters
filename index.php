<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sweaters & Raincoats</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>DevOps Boot Camp</h1>
        <h1>Sweaters & Raincoats Shop</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="cart.php">Cart</a>
            <a href="admin.php">Admin</a>
        </nav>
    </header>
    
    <main>
        <h2>Featured Products</h2>
        <div class="products">
            <?php
            $stmt = $pdo->query("SELECT * FROM products WHERE stock > 0 LIMIT 4");
            while ($row = $stmt->fetch()) {
                echo "<div class='product'>";
                echo "<img src='{$row['image']}' alt='{$row['name']}' width='200'>";
                echo "<h3>{$row['name']}</h3>";
                echo "<p>Price: $" . number_format($row['price'], 2) . "</p>";
                echo "<p>Stock: {$row['stock']}</p>";
                echo "<a href='cart.php?action=add&id={$row['id']}' class='btn'>Add to Cart</a>";
                echo "</div>";
            }
            ?>
        </div>
    </main>
</body>
</html>
