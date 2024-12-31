document.addEventListener("DOMContentLoaded", function () {
  const incrementButton = document.querySelector(".increment-btn");
  const decrementButton = document.querySelector(".decrement-btn");
  incrementButton.addEventListener("click", function (e) {
    e.preventDefault();
    const input = document.getElementById("input-qty");
    let val = parseInt(input.value);
    val = isNaN(val) ? 0 : val;

    if (val < 10) {
      input.value = val + 1;
    }
  });
  decrementButton.addEventListener("click", function (e) {
    e.preventDefault();
    const input = document.getElementById("input-qty");
    let val = parseInt(input.value);
    val = isNaN(val) ? 0 : val;

    if (val > 1) {
      input.value = val - 1;
    }
  });
  const addToCartBtn = document.getElementById("addToCart");
  addToCartBtn.addEventListener("click", function (e) {
    e.preventDefault();
    const input = document.getElementById("input-qty");
    let qty = input.value;
    let productId = document.getElementById("addToCart").value;

    $.ajax({
      url: "../backend/handleCart.php",
      method: "POST",
      data: {
        product_id: productId,
        quantity: qty,
        scope: "add",
      },
      success: function (response) {
        if (response == 401) {
          alertify.error("Please Login first to add to cart");
        } else if (response == 201) {
          alertify.success("Product added to cart successfully!");
        } else if (response == "updated") {
          alertify.success("Product already in cart and quantity updated!");
        } else if (response == 500) {
          alertify.error("An error occurred. Please try again.");
        } else {
          alertify.error("An error occurred. Please try again.");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: " + error);
        alertify.error("Failed to communicate with the server.");
      },
    });
  });
});
