<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cartData = $_POST['cartData'];
    $_SESSION['cart'] = json_decode($cartData, true);
    header("Location: payment.php");
    exit();
}

if (isset($_SESSION['cart'])) {
    $cartItems = $_SESSION['cart'];
    echo "<h2>Your Cart</h2>";
    echo "<table border='5'>";
    echo "<tr><th>Product Name</th><th>Price</th></tr>";

    $totalPrice = 0;
    foreach ($cartItems as $item) {
      $totalPrice += (int)$item['price']; 
        echo "<tr>";
        echo "<td border: 1px solid;>" . ($item['name']) . "</td>";
        echo "<td border: 1px solid;>" . ($item['price']) . " RS</td>";
        echo "</tr>";
    }
    echo "<tr><td><strong>Total</strong></td><td><strong>" . $totalPrice . " RS</strong></td></tr>";
    echo "</table>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>
</body>
</html>
