<?php
session_start();
include 'config.php';

if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    header('Location: cart.php');
    exit;
}
?>
<!DOCTYPE html>
<html><head><title>Cart</title><link rel="stylesheet" href="style.css"></head><body>
<h1>Your Cart</h1>
<?php if (empty($_SESSION['cart'])): ?>
    <p>Cart empty. <a href="index.php">Shop now</a></p>
<?php else: ?>
    <table>
        <tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $id => $qty) {
            $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            $product = $stmt->fetch();
            if ($product) {
                $subtotal = $product['price'] * $qty;
                $total += $subtotal;
                echo "<tr>";
                echo "<td>{$product['name']}</td>";
                echo "<td>$qty</td>";
                echo "<td>$" . $product['price'] . "</td>";
                echo "<td>$" . number_format($subtotal, 2) . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
    <h3>Total: $<?php echo number_format($total, 2); ?></h3>
    <a href="checkout.php?total=<?php echo $total; ?>" class="btn">Checkout</a>
<?php endif; ?>
</body></html>
