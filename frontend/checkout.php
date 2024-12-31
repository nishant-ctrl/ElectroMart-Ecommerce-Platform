<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />
</head>

<body>
    <?php
        include("../backend/config.php");
        include("./header.php");

        if (!isset($_SESSION['id'])) {
            header("Location: login.php");
            exit();
        }
        ?>
<form action="../backend/placeOrder.php" method="post">
    <div class="my_cart_data grid grid-cols-12">
        <?php
        $user_id = $_SESSION['id'];
        $query = $conn->prepare("SELECT c.id as cid,c.product_qty, c.product_id,p.id as pid,p.name , p.image , p.selling_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id = '$user_id' ORDER BY c.id DESC ");
        $query->execute();
        $cartItems = $query->fetchAll();
        ?>
        <div class="col-span-12 md:col-span-5 container mx-auto py-8 px-4 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Basic Details</h1>
            <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
                
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
                        <input type="text"  name="name" required placeholder="Enter Full Name"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email"  name="email" required placeholder="Enter your Email"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-gray-700 font-medium mb-2">Phone</label>
                        <input type="tel"  name="phone" pattern="[0-9]{10}" required 
                            placeholder="Enter 10-digit number"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                    <!-- PIN -->
                    <div>
                        <label for="pin" class="block text-gray-700 font-medium mb-2">PIN</label>
                        <input type="text" name="pin" pattern="[0-9]{6}" required 
                            placeholder="Enter 6-digit PIN"
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200" />
                    </div>
                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                        <textarea  name="address" rows="4" required 
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200"></textarea>
                    </div>
               
            </div>
        </div>

        <div class="col-span-12 md:col-span-7 container mx-auto py-8 px-4 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Order Details</h1>

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


                        </tr>
                    </thead>
                    <tbody id="cart-items">

                        <?php $totalPrice = 0;
                     foreach ($cartItems as $item){
                            ?>
                        <tr class="product_data border-b hover:bg-gray-50 shadow-sm">
                            <td class="py-4 px-4">
                                <div class="flex items-center  space-x-4">
                                    <img src="../admin/uploads/<?= $item['image'] ?>" alt="<?= $item['name'] ?>"
                                        class="w-16 h-16 object-contain rounded">
                                    <span class="text-gray-700 font-medium">
                                        <?= $item['name'] ?>
                                    </span>
                                </div>
                            </td>
                            <td class="py-4 px-4 text-gray-700 font-medium">Rs.
                                <?= $item['selling_price'] ?>
                            </td>
                            <td class="py-4 px-4">
                                <div class="flex items-center space-x-2">

                                    <input type="text" hidden value="<?= $item['pid'] ?>" class="product-id">
                                    <input type="text" disabled value="<?= $item['product_qty'] ?>"
                                        class="input-qty w-12 px-2 py-1 border text-center text-gray-700 bg-white">

                                </div>
                            </td>


                        </tr>
                        <?php 
                        $totalPrice += $item['selling_price'] * $item['product_qty'];} ?>
                    </tbody>
                </table>
                <div class="mt-6 flex justify-between items-center">
                    <span class="text-xl font-bold text-gray-900">
                        Grand Total:
                    </span>  
                    <span class="text-xl font-bold text-gray-900">
                        Rs.<?= $totalPrice ?>
                    </span>
                    <input type="text" hidden value="<?= $totalPrice ?>" name="total_price">
                    <input type="text" hidden value="COD" name="payment_mode">
                </div>
                <button type="submit" name="placeOrderBtn"
                    class="w-full bg-green-600 text-white mt-2 py-3 px-6 rounded-lg hover:bg-green-700 transition">
                    Proceed to Order
                </button>
            </div>
            <?php } ?>
        </div>
    </div>
</form>
    <footer>
        <?php include("./footer.php");?>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier', 'position', 'top-right');
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="js/inc.js"></script>
</body>

</html>