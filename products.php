<!DOCTYPE html>
<html>
<head>
  <title>Product List</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <p id="demo"></p>
  <div class="cart-icon" onclick="toggleCart()">
    🛒 View Cart
  </div>

  <div class="cart" id="cart">
    <h3>Cart Items</h3>
    <ul id="cart-items"></ul>
    <button class="button" onclick="clearCart()">Clear Cart</button>
    <form action="payment.php" method="POST" onsubmit="prepareCheckout()">
      <input type="hidden" id="cartData" name="cartData">
      <input type="submit" value="Checkout" class="button">
    </form>
  </div>


  <?php
$products = array(
  array(
    "name" => "Bullet Journal",
    "image" => "bulletjournal.jpg",
    "color" => "red",
    "price" => "1500 RS"
  ),
  array(
    "name" => "Journal Stickers",
    "image" => "journalstickers.jpg",    "color" => "red",
    "price" => "600 RS"
  ),
  array(
    "name" => "Journal",
    "image" => "product.jpg",
    "color" => "red",
    "price" => "600 RS"
  )
);

foreach ($products as $product) {
  echo '<div class="product">';
  echo '<img src="' . $product['image'] . '">';
  echo '<h2>' . $product['name'] . '</h2>';
  echo '<p><b>Price:</b> ' . $product['price'] . '</p>';
  echo '<p><strong>Color:</strong> ' . $product['color'] . '</p>';
  echo '<button class="button" onclick="addToCart(\'' . $product['name'] . '\', \'' . $product['price'] . '\')">Add to cart</button>';
  echo '</div>';
}
?>
  <script src="script.js"></script>
</body> 
</html>
