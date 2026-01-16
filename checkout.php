<?php
session_start();
include 'config.php';

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $total = $_POST['total'];
    
    // Save order (simplified - loop cart in production)
    $stmt = $pdo->prepare("INSERT INTO orders (customer_name, email, total) VALUES (?, ?, ?)");
    $stmt->execute([$name, $email, $total]);
    
    unset($_SESSION['cart']);
    echo "<h2>Order placed! Thank you, $name.</h2>";
    echo "<a href='index.php'>Continue Shopping</a>";
    exit;
}

$total = $_GET['total'] ?? 0;
?>
<!DOCTYPE html>
<html><head><title>Checkout</title><link rel="stylesheet" href="style.css"></head><body>
<h1>Checkout - Total: $<?php echo number_format($total, 2); ?></h1>
<form method="POST">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Email: <input type="email" name="email" required></label><br>
    <input type="hidden" name="total" value="<?php echo $total; ?>">
    <button type="submit" class="btn">Place Order</button>
</form>
</body></html>
