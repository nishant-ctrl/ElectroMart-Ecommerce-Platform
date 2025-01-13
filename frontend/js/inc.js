document.addEventListener("DOMContentLoaded", function () {
  const cartContainer = document.querySelector(".my_cart_data");

  
  cartContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("increment-btn")) {
      e.preventDefault();
      const input = e.target
        .closest(".product_data")
        .querySelector(".input-qty");
      let val = parseInt(input.value);
      val = isNaN(val) ? 0 : val;

      if (val < 10) {
        input.value = val + 1;
      }
    }

    if (e.target.classList.contains("decrement-btn")) {
      e.preventDefault();
      const input = e.target
        .closest(".product_data")
        .querySelector(".input-qty");
      let val = parseInt(input.value);
      val = isNaN(val) ? 0 : val;

      if (val > 1) {
        input.value = val - 1;
      }
    }
  });

  
  cartContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("updateQty")) {
      e.preventDefault();
      const button = e.target;
      const input = button.closest(".product_data").querySelector(".input-qty");
      let qty = input.value;
      const productId = button
        .closest(".product_data")
        .querySelector(".product-id").value;

      $.ajax({
        url: "../backend/handleCart.php",
        type: "POST",
        data: {
          product_id: productId,
          quantity: qty,
          scope: "update",
        },
        success: function (response) {
          if (response === "updated") {
            alertify.success("Quantity updated!");
            $(".my_cart_data").load(location.href + " .my_cart_data");
          } else {
            alertify.error("An error occurred. Please try again.");
          }
        },
      });
    }
  });

  
  cartContainer.addEventListener("click", function (e) {
    if (e.target.classList.contains("remove-btn")) {
      e.preventDefault();
      const button = e.target;
      const cartId = button
        .closest(".product_data")
        .querySelector(".remove-btn").value;

      $.ajax({
        url: "../backend/handleCart.php",
        type: "POST",
        data: {
          cart_id: cartId,
          scope: "remove",
        },
        success: function (response) {
          if (response === "removed") {
            alertify.success("Item removed successfully!");
            $(".my_cart_data").load(location.href + " .my_cart_data");
          } else {
            alertify.error("An error occurred. Please try again.");
          }
        },
      });
    }
  });
});

// document.addEventListener("DOMContentLoaded", function () {
//   const incrementButton = document.querySelectorAll(".increment-btn");
//   const decrementButton = document.querySelectorAll(".decrement-btn");
//   incrementButton.forEach((button) => {
//     button.addEventListener("click", function (e) {
//       e.preventDefault();
//       const input = this.closest(".product_data").querySelector(".input-qty");
//       let val = parseInt(input.value);
//       val = isNaN(val) ? 0 : val;

//       if (val < 10) {
//         input.value = val + 1;
//       }
//     });
//   });
//   decrementButton.forEach((button) => {
//     button.addEventListener("click", function (e) {
//       e.preventDefault();
//       const input = this.closest(".product_data").querySelector(".input-qty");
//       let val = parseInt(input.value);
//       val = isNaN(val) ? 0 : val;

//       if (val > 1) {
//         input.value = val - 1;
//       }
//     });
//   });

//   document.querySelectorAll(".updateQty").forEach((button) => {
//     button.addEventListener("click", function (e) {
//       e.preventDefault();
//       const input = this.closest(".product_data").querySelector(".input-qty");
//       let qty = input.value;
//       const productId =
//         this.closest(".product_data").querySelector(".product-id").value;
//       $.ajax({
//         url: "../backend/handleCart.php",
//         type: "POST",
//         data: {
//           product_id: productId,
//           quantity: qty,
//           scope: "update",
//         },
//         success: function (response) {
//           if (response == "updated") {
//             alertify.success("Quantity updated!");
//             $(".my_cart_data").load(location.href + " .my_cart_data");
//           } else if (response == 500) {
//             alertify.error("An error occurred. Please try again.");
//           } else {
//             alertify.error("An error occurred. Please try again.");
//           }
//         },
//       });
//     });
//   });
//   document.querySelectorAll(".remove-btn").forEach((button) => {
//     button.addEventListener("click", function (e) {
//       e.preventDefault();
//       const cartId =
//         this.closest(".product_data").querySelector(".remove-btn").value;
//       $.ajax({
//         url: "../backend/handleCart.php",
//         type: "POST",
//         data: {
//           cart_id: cartId,
//           scope: "remove",
//         },
//         success: function (response) {
//           if (response == "removed") {
//             alertify.success("Item removed successfully!");
//             $(".my_cart_data").load(location.href + " .my_cart_data");
//           } else {
//             alertify.error("An error occurred. Please try again.");
//           }
//         },
//       });
//     });
//   });
// });
