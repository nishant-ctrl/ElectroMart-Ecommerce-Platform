<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
</head>
<body>
    
<div class="my_wishlist_data">
    <?php
        include("../backend/config.php");
        include("./header.php");

        if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
    }

$user_id = $_SESSION['id'];
$query = $conn->prepare("SELECT w.id as wid, w.product_id,p.id as pid,p.name , p.image , p.selling_price FROM wishlist w, products p WHERE w.product_id = p.id AND w.user_id = '$user_id' ORDER BY w.id DESC ");
$query->execute();
$items = $query->fetchAll();
?>
  
<div class="container min-h-screen mx-auto py-8 px-4 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Your Wishlist</h1>
    
    <?php if (empty($items)){ ?>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <p class="text-gray-500 text-lg">
                Your Wishlist is empty. 
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
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody id="cart-items">

                    <?php 
                     foreach ($items as $item){
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
                                <button value="<?= $item['wid'] ?>" 
                                        class="text-red-500 hover:text-red-700 font-medium remove-btn">Remove</button>
                            </td>
                        </tr>
                    <?php 
                    } ?>
                </tbody>
            </table>
          
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
<script src="js/wish.js"></script>    
</body>
</html>