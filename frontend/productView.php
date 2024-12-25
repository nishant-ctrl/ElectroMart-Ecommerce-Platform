<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <div class="flex flex-col lg:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden lg:space-x-8">
            <!-- Product Image -->
            <div class="lg:w-1/2">
                <img src="../admin/uploads/<?=$product['image']?>" alt="<?=$product['name']?>" class="w-full h-[500px] object-contain">
            </div>

            <!-- Product Details -->
            <div class="lg:w-1/2 p-8 flex flex-col justify-center space-y-6">
                <h1 class="text-4xl font-bold text-gray-800"><?=$product['name']?></h1>
                <hr>
                <p class="text-gray-500 text-xl"><?=$product['small_description']?></p>
                <p class="text-gray-600 text-lg"><?=$product['description']?></p>
                <div class="text-2xl font-semibold text-gray-800">
                    <span>Price:</span> 
                    <span class="text-green-600">Rs.<?=$product['selling_price']?></span>
                    <span class="line-through text-gray-400 ml-2">Rs.<?=$product['original_price']?></span>
                </div>
                <div>
                    <span class="text-gray-600 text-lg">Quantity Available:</span> 
                    <span class="font-bold"><?=$product['qty']?></span>
                </div>
                <button class="w-full bg-blue-600 text-white py-3 px-6 text-xl rounded-md hover:bg-blue-700 transition">
                    Add to Cart
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
</body>
</html>