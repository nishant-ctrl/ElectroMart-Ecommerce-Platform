<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
        include("../backend/config.php");
        include("../frontend/header.php");
    ?>
    <div class="min-h-screen grid grid-cols-12">
        <div class="bg-blue-500 col-span-3 w-full">
            <h1 class="text-white font-extrabold text-center text-4xl mx-auto my-4">Admin Panel</h1>
            <div>
                <div class="m-4 text-center text-white font-bold text-2xl hover:underline cursor-pointer">Dashboard
                </div>
                <div class="m-4 text-center text-white font-bold text-2xl hover:underline cursor-pointer"><a href="./categoryPage.php">Categories</a>
                </div>
                <div class="m-4 text-center text-white font-bold text-2xl hover:underline cursor-pointer">Products</div>
                <div class="m-4 text-center text-white font-bold text-2xl hover:underline cursor-pointer">Customers
                </div>
            </div>
        </div>
        <div class="bg-slate-200 col-span-9">
            <div class="bg-white p-4 shadow rounded">
                <h2 class="text-xl font-bold">Customers</h2>
                <p class="text-gray-600">300</p>
            </div>
            <div class="bg-white p-4 shadow rounded">
                <h2 class="text-xl font-bold">Customers</h2>
                <p class="text-gray-600">300</p>
            </div>
            <div class="bg-white p-4 shadow rounded">
                <h2 class="text-xl font-bold">Customers</h2>
                <p class="text-gray-600">300</p>
            </div>
        </div>
    </div>



    <footer>
  <?php include("../frontend/footer.php");?>
</footer>
</body>

</html>