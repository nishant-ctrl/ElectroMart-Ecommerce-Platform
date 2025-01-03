<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
</head>

<body class="bg-gray-200">
    <?php
        include("../backend/config.php");
        include("./header.php");
    ?>

    <?php
        if(!isset($_GET['product']))
        {
            header("Location:./products.php");
            exit();
        }
        $product_slug=$_GET['product'];
        $query=$conn->prepare("SELECT * FROM products WHERE slug='$product_slug' AND status='0' LIMIT 1");
        $query->execute();
        $product=$query->fetch();
        if($product)
        {
            ?>
    <div class="container mx-auto px-4 py-12">
        <div class=" flex flex-col lg:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden lg:space-x-8">
  
            <div class="lg:w-1/2">
                <img src="../admin/uploads/<?=$product['image']?>" alt="<?=$product['name']?>"
                    class="w-full h-[500px] object-contain">
            </div>


            <div class="lg:w-1/2 p-8 flex flex-col justify-center space-y-6">
                <h1 class="text-4xl font-bold text-gray-800">
                    <?=$product['name']?>
                </h1>
                <h6>
                    <?php if($product['trending'])
                            {
                                echo "<div class='text-red-600 text-end'>Trending</div>";
                            }
                    ?>
                </h6>
                <hr>
                <p class="text-gray-500 text-xl">
                    <?=$product['small_description']?>
                </p>
                <p class="text-gray-600 text-lg">
                    <?=$product['description']?>
                </p>
                <div class="text-2xl font-semibold text-gray-800">
                    <span>Price:</span>
                    <span class="text-green-600">Rs.
                        <?=$product['selling_price']?>
                    </span>
                    <span class="line-through text-gray-400 ml-2">Rs.
                        <?=$product['original_price']?>
                    </span>
                </div>
                <div>
                    <span class="text-gray-600 text-lg">Quantity Available:</span>
                    <span class="font-bold">
                        <?=$product['qty']?>
                    </span>
                </div>
                <div class="flex items-center mb-3 w-20">
                    <button class="decrement-btn px-3 py-1 bg-gray-200 border border-gray-300 rounded-l-md">-</button>
                    <input type="text" disabled value="1" id="input-qty"
                        class="w-10 px-2 py-1 border-t border-b border-gray-300 text-center input-product-qty " />
                    <button class="increment-btn px-3 py-1 bg-gray-200 border border-gray-300 rounded-r-md">+</button>
                </div>

                <button class="w-full bg-blue-600 text-white py-3 px-6 text-xl rounded-md hover:bg-blue-700 transition" id="addToCart" value="<?=$product['id']?>">
                    Add to Cart
                </button>
                <button class="w-full bg-red-600 text-white py-3 px-6 text-xl rounded-md hover:bg-red-700 transition" id="addToWishlist" value="<?=$product['id']?>">
                    Wishlist
                </button>
            </div>
        </div>
    </div>

    <?php
        }
        else
        {
            echo "<h1 class='text-center text-2xl font-bold text-red-600'>Product not found.</h1>";
            exit(); 
        }

    ?>
    <footer>
        <?php include("./footer.php");?>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');
    </script>
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <!-- <script src="js/custom.js"></script> -->
    <script>
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
        const addToWishlistBtn = document.getElementById("addToWishlist");
        addToWishlistBtn.addEventListener("click", function (e) {
            e.preventDefault();
            
            let productId = document.getElementById("addToWishlist").value;

            $.ajax({
            url: "../backend/handleWishlist.php",
            method: "POST",
            data: {
                product_id: productId,
               
                scope: "add",
            },
            success: function (response) {
                if (response == 401) {
                alertify.error("Please Login first to add to wishlist");
                } else if (response == 201) {
                alertify.success("Product added to wishlist successfully!");
                } else if (response == "already_in_wishlist") {
                alertify.success("Product already in wishlist");
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
    </script>
</body>

</html>