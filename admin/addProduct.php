<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
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


            <a href="index.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
            <a href="categoryPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add
              Category</a>
            <a href="productPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Products</a>
            <a href="addProduct.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
              aria-current="page">Add Product</a>
              <a href="orders.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Orders</a>
            <a href="customerPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact Form</a>

          </div>
        </div>
      </div>


    </nav>

    <header class="bg-white shadow">
      <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-gray-900">Add Product</h1>
      </div>
    </header>

    <main>
      <div class="container mx-auto px-4 py-6">
        <form action="addProductBackend.php" method="post" enctype="multipart/form-data">
         
          <div class="mb-4">
            <label for="category_id" class="block text-xl font-medium text-gray-700">Select Category</label>
            <select name="category_id" id="category_id" required class="block w-full mt-1 border rounded-lg px-4 py-2 bg-gray-100">
              <option value="" selected>Select Category</option>
              <?php
                $query = $conn->prepare("SELECT * FROM categories");
                $query->execute();
                $categories = $query->fetchAll();
                foreach ($categories as $item) {
                  echo "<option value='{$item['id']}'>{$item['name']}</option>";
                }
              ?>
            </select>
          </div>
          
          
          <div class="mb-4">
            <label for="name" class="block text-xl font-medium text-gray-700">Product Name</label>
            <input type="text" name="name" id="name" placeholder="Enter product name" required class="w-full px-4 py-2 border rounded-lg bg-gray-100">
          </div>

      
          <div class="mb-4">
            <label for="slug" class="block text-xl font-medium text-gray-700">Slug</label>
            <input type="text" name="slug" id="slug" placeholder="Enter slug" required class="w-full px-4 py-2 border rounded-lg bg-gray-100">
          </div>

      
          <div class="mb-4">
            <label for="small_description" class="block text-xl font-medium text-gray-700">Small Description</label>
            <textarea name="small_description" id="small_description" placeholder="Enter small description" required class="w-full px-4 py-2 border rounded-lg bg-gray-100"></textarea>
          </div>

        
          <div class="mb-4">
            <label for="description" class="block text-xl font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" placeholder="Enter description" required class="w-full px-4 py-2 border rounded-lg bg-gray-100"></textarea>
          </div>

       
          <div class="flex space-x-4 mb-4">
            <div class="flex-1">
              <label for="original_price" class="block text-xl font-medium text-gray-700">Original Price</label>
              <input type="text" name="original_price" id="original_price" placeholder="Enter original price" required class="w-full px-4 py-2 border rounded-lg bg-gray-100">
            </div>
            <div class="flex-1">
              <label for="selling_price" class="block text-xl font-medium text-gray-700">Selling Price</label>
              <input type="text" name="selling_price" id="selling_price" placeholder="Enter selling price" required class="w-full px-4 py-2 border rounded-lg bg-gray-100">
            </div>
          </div>

          <div class="mb-4">
            <label for="image" class="block text-xl font-medium text-gray-700">Upload Image</label>
            <input type="file" name="image" id="image" required class="mt-2">
          </div>

      
          <div class="mb-4">
            <label for="qty" class="block text-xl font-medium text-gray-700">Quantity</label>
            <input type="text" name="qty" id="qty" placeholder="Enter quantity" required class="w-full px-4 py-2 border rounded-lg bg-gray-100">
          </div>

          <div class="flex items-center space-x-4 mb-4">
            <div>
              <label for="status" class="text-xl font-medium text-gray-700">Status</label>
              <input type="checkbox" name="status" id="status" class="ml-2">
            </div>
            <div>
              <label for="trending" class="text-xl font-medium text-gray-700">Trending</label>
              <input type="checkbox" name="trending" id="trending" class="ml-2">
            </div>
          </div>

          <div class="mb-4">
            <label for="meta_title" class="block text-xl font-medium text-gray-700">Meta Title</label>
            <input type="text" name="meta_title" id="meta_title" placeholder="Enter meta title" required class="w-full px-4 py-2 border rounded-lg bg-gray-100">
          </div>
          <div class="mb-4">
            <label for="meta_keywords" class="block text-xl font-medium text-gray-700">Meta Keywords</label>
            <textarea name="meta_keywords" id="meta_keywords" placeholder="Enter meta keywords" required class="w-full px-4 py-2 border rounded-lg bg-gray-100"></textarea>
          </div>
          <div class="mb-4">
            <label for="meta_description" class="block text-xl font-medium text-gray-700">Meta Description</label>
            <textarea name="meta_description" id="meta_description" placeholder="Enter meta description" required class="w-full px-4 py-2 border rounded-lg bg-gray-100"></textarea>
          </div>

        
          <div>
            <button type="submit" name="add_product_btn" class="w-full bg-blue-600 text-white py-2 hover:bg-blue-700 rounded-lg">Save</button>
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