function setCookie(name, value, days) {
    var expires = "";
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }
  
  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) === ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }
  
  function addToCart(productName, productPrice) {
    var cart = getCookie("cart");
    cart = cart ? JSON.parse(cart) : [];
    cart.push({ name: productName, price: productPrice });
    setCookie("cart", JSON.stringify(cart), 7);
    document.getElementById("demo").innerHTML = productName + " added to cart";
    updateCart();
  }
  
  function toggleCart() {
    var cart = document.getElementById("cart");
    cart.style.display = cart.style.display === "none" ? "block" : "none";
    updateCart();
  }
  
  function updateCart() {
    var cart = getCookie("cart");
    cart = cart ? JSON.parse(cart) : [];
    var cartItems = document.getElementById("cart-items");
    cartItems.innerHTML = "";
  
    cart.forEach(function (item) {
      var li = document.createElement("li");
      li.appendChild(document.createTextNode(item.name + " - " + item.price));
      cartItems.appendChild(li);
    });
  }
  
  function clearCart() {
    setCookie("cart", "", -1);
    updateCart();
  }
  
  function prepareCheckout() {
    var cart = getCookie("cart");
    document.getElementById("cartData").value = cart;
  }
  
  window.onload = function () {
    updateCart();
  };
  