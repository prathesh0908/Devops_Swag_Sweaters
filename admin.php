<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== 'admin') {
    if ($_POST['pass'] ?? '' !== 'admin') {
        echo '<form method="POST"><input type="password" name="pass"><button>Login</button></form>';
        exit;
    }
    $_SESSION['admin'] = 'admin';
}

if (isset($_POST['add_product'])) {
    $stmt = $pdo->prepare("INSERT INTO products (name, price, image, category, stock) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['price'], $_POST['image'], $_POST['category'], $_POST['stock']]);
}

if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM products WHERE id = ?")->execute([$_GET['delete']]);
}
?>
<h1>Admin Panel</h1>
<h2>Products</h2>
<table>
<tr><th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Actions</th></tr>
<?php
$stmt = $pdo->query("SELECT * FROM products");
while ($row = $stmt->fetch()) {
    echo "<tr>";
    echo "<td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['stock']}</td>";
    echo "<td><a href='?delete={$row['id']}'>Delete</a></td>";
    echo "</tr>";
}
?>
</table>

<h2>Add Product</h2>
<form method="POST">
    Name: <input name="name"><br>
    Price: <input name="price" type="number" step="0.01"><br>
    Image: <input name="image"><br>
    Category: <select name="category"><option>sweater</option><option>raincoat</option></select><br>
    Stock: <input name="stock" type="number"><br>
    <button name="add_product">Add</button>
</form>
