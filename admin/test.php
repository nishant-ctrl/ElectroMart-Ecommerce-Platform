<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="bg-gray-100">
<?php
    include("../backend/config.php");
    include("../frontend/header.php");
?>
<div class="min-h-full">
  <!-- Navigation -->
  <nav class="bg-blue-500 shadow-md">
    <div class="container mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="ml-10 flex items-baseline space-x-4">
          <a href="index.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-blue-600 hover:text-white">Dashboard</a>
          <a href="categoryPage.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">Add Category</a>
          <a href="productPage.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-blue-600 hover:text-white">Products</a>
          <a href="addProduct.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-blue-600 hover:text-white">Add Product</a>
          <a href="orders.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Orders</a>
          <a href="customerPage.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-blue-600 hover:text-white">Contact Form</a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Header -->
  <header class="bg-white shadow">
    <div class="container mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <h1 class="text-4xl font-bold text-gray-800">Add Category</h1>
    </div>
  </header>

  <!-- Main Content -->
  <main>
    <div class="container mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
      <form action="code.php" method="post" enctype="multipart/form-data" class="bg-white p-8 shadow-lg rounded-lg">
        <!-- Category Name -->
        <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700">Category Name</label>
            <input type="text" name="name" id="name" placeholder="Enter category name" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Slug -->
        <div class="mb-4">
            <label for="slug" class="block text-lg font-medium text-gray-700">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Enter slug" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Description -->
        <div class="mb-4">
            <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
            <textarea rows="3" name="description" placeholder="Enter description" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
        </div>

        <!-- Upload Image -->
        <div class="mb-4">
            <label for="image" class="block text-lg font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" id="image" required
                class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border file:border-gray-300 file:text-sm file:bg-gray-50 file:text-gray-700 hover:file:bg-blue-100">
        </div>

        <!-- Meta Title -->
        <div class="mb-4">
            <label for="meta_title" class="block text-lg font-medium text-gray-700">Meta Title</label>
            <input type="text" name="meta_title" required placeholder="Enter meta title"
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
        </div>

        <!-- Meta Description -->
        <div class="mb-4">
            <label for="meta_description" class="block text-lg font-medium text-gray-700">Meta Description</label>
            <textarea rows="3" name="meta_description" required placeholder="Enter meta description"
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
        </div>

        <!-- Meta Keywords -->
        <div class="mb-4">
            <label for="meta_keywords" class="block text-lg font-medium text-gray-700">Meta Keywords</label>
            <textarea rows="3" name="meta_keywords" required placeholder="Enter meta keywords"
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
        </div>

        <!-- Status and Popular -->
        <div class="mb-4 flex items-center">
            <input type="checkbox" name="status" id="status" class="mr-2">
            <label for="status" class="text-lg font-medium text-gray-700">Status</label>
        </div>
        <div class="mb-4 flex items-center">
            <input type="checkbox" name="popular" id="popular" class="mr-2">
            <label for="popular" class="text-lg font-medium text-gray-700">Popular</label>
        </div>

        <!-- Save Button -->
        <div>
            <button type="submit" name="add_category_btn"
              class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 shadow-md transition duration-200">
              Save
            </button>
        </div>
      </form>
    </div>
  </main>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-4">
  <div class="container mx-auto text-center">
    <?php include("../frontend/footer.php"); ?>
  </div>
</footer>
</body>
</html>
