<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electromart</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-gray-200">
    <?php
    include("../backend/config.php");
    include("./header.php");
    ?>

    <!-- Search Bar and Categories -->
    <div class="grid grid-cols-12 p-4 bg-white border-b shadow">
        <div class="col-span-3 mt-2 text-xl text-center space-x-2">
            <a class="hover:bg-blue-600 hover:text-white p-4 rounded-lg text-gray-600 bg-gray-100" href="category.php">Explore More</a>
        </div>
        <div class="col-span-9 mx-4 flex items-center w-full max-w-2xl">
            <input type="text" placeholder="Search for anything" class="w-full px-5 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-200" />
            <select class="px-4 py-2 mx-4 rounded-md text-gray-600 bg-gray-100 focus:outline-none focus:ring focus:ring-blue-200">
                <option>All Categories</option>
                <?php
                $query = $conn->prepare("SELECT * FROM categories WHERE status='0'");
                $query->execute();
                $data = $query->fetchAll();
                if ($data) {
                    foreach ($data as $item) {
                        echo "<option>{$item['name']}</option>";
                    }
                }
                ?>
            </select>
            <button class="px-6 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Search</button>
        </div>
    </div>

    <?php include("./banner.php"); ?>

    <!-- Popular Categories Section -->
    <div class="bg-blue-200 py-8">
        <h2 class="text-center text-2xl font-semibold mb-6">Explore Popular Categories</h2>
        <div class="flex justify-evenly px-4 md:px-16">
            <?php
            $query = $conn->prepare("SELECT * FROM categories WHERE popular='1' AND status='0'");
            $query->execute();
            $data = $query->fetchAll();
            if ($data) {
                foreach ($data as $item) {
                    echo "<div class='flex flex-col items-center text-center'>
                            <div class='hover:shadow-2xl bg-gray-100 p-6 rounded-full shadow-md'>
                                <img src='../admin/uploads/{$item['image']}' alt='{$item['name']}' class='h-20 w-20'>
                            </div>
                            <p class='mt-4 font-medium text-lg'>{$item['name']}</p>
                        </div>";
                }
            } else {
                echo "<h1>No popular categories available</h1>";
            }
            ?>
        </div>
    </div>

    <!-- Trending Products Section -->
    <div class="bg-white py-8">
        <h2 class="text-center text-2xl font-semibold mb-6">Trending Products</h2>
        <div class="grid grid-cols-12 gap-4 px-4 md:px-16">
            <?php
            $query = $conn->prepare("SELECT * FROM products WHERE trending='1' AND status='0'");
            $query->execute();
            $data = $query->fetchAll();
            if ($data) {
                foreach ($data as $item) {
                   echo "<div class='col-span-6 md:col-span-3'>
        <div class='bg-white shadow-md rounded-lg overflow-hidden h-[350px] flex flex-col'>
            <div class='flex-1 flex items-center justify-center'>
                <img src='../admin/uploads/{$item['image']}' alt='{$item['name']}' class='w-full h-48 object-contain'>
            </div>
            <div class='p-4'>
                <h3 class='text-lg font-semibold'>{$item['name']}</h3>
                <p class='text-gray-600'>Rs.{$item['selling_price']}</p>
                <button class='mt-2 px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600'>Buy Now</button>
            </div>
        </div>
    </div>";

                }
            } else {
                echo "<h3 class='col-span-12 text-center'>No trending products available</h3>";
            }
            ?>
        </div>
    </div>

    <!-- Banner Section -->
    <!-- <div class="grid grid-cols-12 gap-1">
        <div class="col-span-12"><img class="rounded-lg w-full" src="../assest/img/1.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full" src="../assest/img/2.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full" src="../assest/img/3.webp" alt=""></div>
        <div class="col-span-12"><img class="rounded-lg w-full" src="../assest/img/4.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full" src="../assest/img/5.webp" alt=""></div>
        <div class="col-span-6"><img class="rounded-lg w-full" src="../assest/img/6.webp" alt=""></div>
    </div> -->

    <!-- Curated Section -->
    <section class="bg-slate-900 text-white py-10">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-semibold mb-6">Exclusively Curated For You</h2>
            <div class="grid grid-cols-12 gap-4">
                <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
                    <img class="h-24 w-24" src="../assest/img/c.webp" alt="">
                </div>
                <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
                    <img class="h-24 w-24" src="../assest/img/d.webp" alt="">
                </div>
                <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
                    <img class="h-24 w-24" src="../assest/img/e.webp" alt="">
                </div>
                <div class="flex justify-center items-center bg-slate-900 p-4 rounded-lg col-span-12 md:col-span-6 lg:col-span-3">
                    <img class="h-24 w-24" src="../assest/img/f.webp" alt="">
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <?php include("./footer.php"); ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script>
        alertify.set('notifier', 'position', 'top-right');
    </script>
</body>

</html>
