<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electromart</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
        include("../backend/config.php");
        include("./header.php");
    ?>
    <form action="./searchResult.php" method="POST" class="flex items-center justify-between bg-gray-100 px-6 py-4 shadow-md">
    <!-- <div id="category" class="text-lg font-semibold">Category</div> -->
    <div class="flex-1 mx-4">
        <input type="text" placeholder="Search"class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>
    <div>
        <button name="search" value="search"
            class="bg-blue-600 text-white py-2 px-5 rounded-2xl hover:bg-blue-700 shadow-md">Search
        </button>
    </div>
</form>


</body>
</html>