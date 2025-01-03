// document.addEventListener("DOMContentLoaded", function () {
//   document.querySelectorAll(".remove-btn").forEach((button) => {
//     button.addEventListener("click", function (e) {
//       e.preventDefault();
//       const wishlistId =
//         this.closest(".product_data").querySelector(".remove-btn").value;
//       $.ajax({
//         url: "../backend/handleWishlist.php",
//         type: "POST",
//         data: {
//           wishlist_id: wishlistId,
//           scope: "remove",
//         },
//         success: function (response) {
//           if (response == "removed") {
//             alertify.success("Item removed successfully!");
//             $(".my_wishlist_data").load(location.href + " .my_wishlist_data");
//           } else {
//             alertify.error("An error occurred. Please try again.");
//           }
//         },
//       });
//     });
//   });
// });


document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector(".my_wishlist_data")
    .addEventListener("click", function (e) {
      if (e.target.classList.contains("remove-btn")) {
        e.preventDefault();
        const button = e.target;
        const wishlistId = button
          .closest(".product_data")
          .querySelector(".remove-btn").value;
        $.ajax({
          url: "../backend/handleWishlist.php",
          type: "POST",
          data: {
            wishlist_id: wishlistId,
            scope: "remove",
          },
          success: function (response) {
            if (response == "removed") {
              alertify.success("Item removed successfully!");
              $(".my_wishlist_data").load(location.href + " .my_wishlist_data");
            } else {
              alertify.error("An error occurred. Please try again.");
            }
          },
        });
      }
    });
});
