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
        if(!isset($_GET['category']))
        {
            header("Location:./category.php");
            exit();
        }
        $category_slug=$_GET['category'];
        $query=$conn->prepare("SELECT * FROM categories WHERE slug='$category_slug' AND status='0' LIMIT 1");
        $query->execute();
        $category=$query->fetch();
        $category_id=$category['id']

    ?>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php
            $query=$conn->prepare("SELECT * FROM products WHERE category_id='$category_id' AND status='0'");
            $query->execute();
            $products=$query->fetchAll();
            if($products)
            {
                foreach($products as $product)
                {
                ?>
                        <a href="productView.php?product=<?=$product['slug']?>">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <img src="../admin/uploads/<?=$product['image']?>" alt="<?=$product['name']?>" class="w-full h-60 object-contain">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800"><?=$product['name']?></h3>
                                <p class="text-sm text-gray-600 mt-2">
                                <?=$product['small_description']?>
                                </p>
                            </div>
                        </div>
                       </a>
                        <?php
                }
            }
            else
            {
                echo "<h1 class='text-center text-2xl font-bold text-red-600'>No product in this category.</h1>";
                exit();
            }
            ?>
        
    
        </div>
    </div>





<footer>
  <?php include("./footer.php");?>
</footer>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');
    </script>
</body>
</html>