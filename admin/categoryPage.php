<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
        include("../backend/config.php");
        include("../frontend/header.php");
        if(!isset($_SESSION['id']) && $_SESSION['role']!=1)
        {
          header("location:../frontend/index.php");
        }
    ?>
<div class="min-h-full min-h-screen">
  <nav class="bg-blue-500">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
      
          
            <div class="ml-10 flex items-baseline space-x-4">

              <a href="index.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
              <a href="categoryPage.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white" aria-current="page">Add Category</a>
              <a href="productPage.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Products</a>
              <a href="addProduct.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add Product</a>
              <a href="orders.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Orders</a>
              <a href="customerPage.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact Form</a>
              
        </div>
      </div>
    </div>

    
  </nav>

      <header class="bg-white shadow">
      <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-900">Add Category</h1>
      </div>
    </header>


    <main>
      <div class="container mx-auto px-4 py-6">
        <form action="code.php" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow-md">
     
          <div class="mb-4">
            <label for="name" class="block text-lg font-medium text-gray-700 mb-2">Category Name</label>
            <input type="text" name="name" id="name" placeholder="Enter category name" required
              class="w-full px-3 py-2 border rounded focus:ring focus:ring-blue-200 focus:outline-none">
          </div>

     
          <div class="mb-4">
            <label for="slug" class="block text-lg font-medium text-gray-700 mb-2">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Enter slug" required
              class="w-full px-3 py-2 border rounded focus:ring focus:ring-blue-200 focus:outline-none">
          </div>

       
          <div class="mb-4">
            <label for="description" class="block text-lg font-medium text-gray-700 mb-2">Description</label>
            <textarea rows="3" name="description" id="description" placeholder="Enter description" required
              class="w-full px-3 py-2 border rounded focus:ring focus:ring-blue-200 focus:outline-none"></textarea>
          </div>

         
          <div class="mb-4">
            <label for="image" class="block text-lg font-medium text-gray-700 mb-2">Upload Image</label>
            <input type="file" name="image" id="image" required class="w-full">
          </div>

          <div class="mb-4">
            <label for="meta_title" class="block text-lg font-medium text-gray-700 mb-2">Meta Title</label>
            <input type="text" name="meta_title" id="meta_title" placeholder="Enter meta title" required
              class="w-full px-3 py-2 border rounded focus:ring focus:ring-blue-200 focus:outline-none">
          </div>

    
          <div class="mb-4">
            <label for="meta_description" class="block text-lg font-medium text-gray-700 mb-2">Meta Description</label>
            <textarea rows="3" name="meta_description" id="meta_description" placeholder="Enter meta description"
              required class="w-full px-3 py-2 border rounded focus:ring focus:ring-blue-200 focus:outline-none"></textarea>
          </div>

          <div class="mb-4">
            <label for="meta_keywords" class="block text-lg font-medium text-gray-700 mb-2">Meta Keywords</label>
            <textarea rows="3" name="meta_keywords" id="meta_keywords" placeholder="Enter meta keywords" required
              class="w-full px-3 py-2 border rounded focus:ring focus:ring-blue-200 focus:outline-none"></textarea>
          </div>

   
          <div class="mb-4">
            <label for="status" class="block text-lg font-medium text-gray-700 mb-2">Status</label>
            <input type="checkbox" name="status" id="status">
            <span class="text-sm text-gray-600">Check if hidden</span>
          </div>

          
          <div class="mb-4">
            <label for="popular" class="block text-lg font-medium text-gray-700 mb-2">Popular</label>
            <input type="checkbox" name="popular" id="popular">
            <span class="text-sm text-gray-600">Check if popular</span>
          </div>

          <div>
            <button type="submit" name="add_category_btn"
              class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
              Save
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>
<footer>
  <?php include("../frontend/footer.php");?>
</footer>
</body>
</html>