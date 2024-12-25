<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-gray-200">
    <?php
        include("../backend/config.php");
        include("./header.php");
    ?>

    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php
            $query=$conn->prepare("SELECT * FROM categories WHERE status='0'");
            $query->execute();
            $data=$query->fetchAll();
            if($data)
            {
                foreach($data as $item)
                {
                ?>
                        <a href="products.php?category=<?=$item['slug']?>">
                        <div class="bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                            <img src="../admin/uploads/<?=$item['image']?>" alt="<?=$item['name']?>" class="w-full h-60 object-contain">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-800"><?=$item['name']?></h3>
                                <p class="text-sm text-gray-600 mt-2">
                                <?=$item['description']?>
                                </p>
                            </div>
                        </div>
                        </a>
                        <?php
                }
            }
            else
            {
                echo "<h1>No popular categories<h1>";
            }
            ?>
        
    
    </div>
</div>





<footer>
  <?php include("./footer.php");?>
</footer>
</body>
</html>