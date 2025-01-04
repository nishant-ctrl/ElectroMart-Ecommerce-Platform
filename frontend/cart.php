<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
</head>
<body>
    
<div class="my_cart_data">
    <?php
        include("../backend/config.php");
        include("./header.php");

        if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
    }

$user_id = $_SESSION['id'];
$query = $conn->prepare("SELECT c.id as cid,c.product_qty, c.product_id,p.id as pid,p.name , p.image , p.selling_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id = '$user_id' ORDER BY c.id DESC ");
$query->execute();
$cartItems = $query->fetchAll();
?>
  
<div class="container min-h-screen mx-auto py-8 px-4 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Your Cart</h1>
    
    <?php if (empty($cartItems)){ ?>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <p class="text-gray-500 text-lg">
                Your cart is empty. 
                <a href="index.php" class="text-blue-500 font-medium hover:underline">Continue shopping</a>
            </p>
        </div>
    <?php }else{ ?>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b text-gray-600 font-medium">
                        <th class="py-3 px-4">Product</th>
                        <th class="py-3 px-4">Price</th>
                        <th class="py-3 px-4">Quantity</th>
                        <th class="py-3 px-4">Total</th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody id="cart-items">

                    <?php $totalPrice = 0;
                     foreach ($cartItems as $item){
                            ?>
                        <tr class="product_data border-b hover:bg-gray-50 shadow-sm">
                            <td class="py-4 px-4">
                                <div class="flex items-center  space-x-4">
                                    <img src="../admin/uploads/<?= $item['image'] ?>" 
                                    alt="<?= $item['name'] ?>" 
                                    class="w-16 h-16 object-contain rounded">
                                    <span class="text-gray-700 font-medium"><?= $item['name'] ?></span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-700 font-medium">Rs.<?= $item['selling_price'] ?></td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-2">
                                    <button class="decrement-btn updateQty px-3 py-1 bg-gray-200 text-gray-700 rounded-l-md hover:bg-gray-300">-</button>
                                    <input type="text" hidden value="<?= $item['pid'] ?>" class="product-id">
                                    <input type="text" disabled 
                                           value="<?= $item['product_qty'] ?>" 
                                           class="input-qty w-12 px-2 py-1 border text-center text-gray-700 bg-white">
                                    <button class="increment-btn updateQty px-3 py-1 bg-gray-200 text-gray-700 rounded-r-md hover:bg-gray-300">+</button>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-700 font-medium">
                                Rs.<span class="item-total"><?= $item['selling_price'] * $item['product_qty'] ?></span>
                            </td>
                            <td class="py-4 px-4">
                                <button value="<?= $item['cid'] ?>" 
                                        class="text-red-500 hover:text-red-700 font-medium remove-btn">Remove</button>
                            </td>
                        </tr>
                    <?php 
                        $totalPrice += $item['selling_price'] * $item['product_qty'];} ?>
                </tbody>
            </table>
            <div class="mt-6 flex justify-between items-center">
                <h3 class="text-xl font-bold text-gray-900">
                    Grand Total: Rs. <span id="grand-total"><?= $totalPrice ?></span>
                </h3>
                <a href="checkout.php" class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">Checkout</a>
            </div>
        </div>
    <?php } ?>
</div>
</div>

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
<script src="js/inc.js"></script>    
</body>
</html>