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
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Add Product</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <div>
          <form action="addProductBackend.php" method="post" enctype="multipart/form-data">
            <div>
              <label for="category_id" class="block text-3xl font-medium text-gray-700">Select Category</label>
              <select required name="category_id" id="category_id">
                <option selected>Select Category</option>
                <?php
                  $query=$conn->prepare("SELECT * FROM categories ");
                  $result=$query->execute();
                  $category=$query->fetchAll();
                  if($category)
                  {
                    foreach($category as $item)
                    {
                      ?>
                      <option value='<?= $item['id'] ?>'><?= $item['name'] ?></option>

                      <?php
                    }
                  }
                  else
                  {
                    echo "No categories available.";
                  }
                ?>
              </select>
              
            </div>
            <div>
              <label for="name" class="block text-3xl font-medium text-gray-700">Product Name</label>
              <input type="text" name="name" id="name" placeholder="Enter category name" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label for="slug" class="block text-3xl font-medium text-gray-700">Slug</label>
              <input type="text" name="slug" id="slug" placeholder="Enter slug" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label for="small_description" class="block text-3xl font-medium text-gray-700">Small Description</label>
              <textarea rows="3" name="small_description" placeholder="Enter small_description" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>
            <div>
              <label for="description" class="block text-3xl font-medium text-gray-700">Description</label>
              <textarea rows="3" name="description" placeholder="Enter description" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>
            <div>
              <label for="original_price" class="block text-3xl font-medium text-gray-700">Original Price</label>
              <input type="text" name="original_price" id="original_price" placeholder="Enter original price " required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label for="selling_price" class="block text-3xl font-medium text-gray-700">Selling price</label>
              <input type="text" name="selling_price" id="selling_price" placeholder="Enter selling price" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label for="image" class="block text-3xl font-medium text-gray-700">Upload Image</label>
              <input type="file" name="image" required id="image">
            </div>
            <div>
              <label for="qty" class="block text-3xl font-medium text-gray-700">Quantity</label>
              <input type="text" name="qty" id="qty" placeholder="Enter quantity" required
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label for="status" class="block text-3xl font-medium text-gray-700">Status</label>
              <input type="checkbox" name="status">
            </div>
            <div>
              <label for="trending" class="block text-3xl font-medium text-gray-700">Trending</label>
              <input type="checkbox" name="trending">
            </div>
            <div>
              <label for="meta_title" class="block text-3xl font-medium text-gray-700">Meta Title</label>
              <input type="text" name="meta_title" required placeholder="Enter meta title"
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
              <label for="meta_keywords" class="block text-3xl font-medium text-gray-700">Meta Keywords</label>
              <textarea rows="3" name="meta_keywords" required placeholder="Enter meta keywords"
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>
            <div>
              <label for="meta_description" class="block text-3xl font-medium text-gray-700">Meta Description</label>
              <textarea rows="3" name="meta_description" required placeholder="Enter meta description"
                class="w-full px-4 py-2 border rounded-lg bg-gray-100 focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>
            <div>
              <button type="submit" name="add_product_btn"
                class="w-full bg-blue-600 text-white py-2 hover:bg-blue-700 shadow-md transition duration-200">
                Save
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
  </div>
<footer>
  <?php include("../frontend/footer.php");?>
</footer>
</body>

</html>