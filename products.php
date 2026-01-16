<?php include 'config.php'; ?>
<!DOCTYPE html>
<html><head><title>Products</title><link rel="stylesheet" href="style.css"></head><body>
<h1>All Products</h1>
<div class="products">
<?php
$stmt = $pdo->query("SELECT * FROM products ORDER BY category");
while ($row = $stmt->fetch()) {
    echo "<div class='product'>";
    echo "<img src='{$row['image']}' alt='{$row['name']}' width='150'>";
    echo "<h3>{$row['name']} ({$row['category']})</h3>";
    echo "<p>$" . $row['price'] . "</p>";
    echo "<a href='cart.php?action=add&id={$row['id']}' class='btn'>Add</a>";
    echo "</div>";
}
?>
</div>
</body></html>
