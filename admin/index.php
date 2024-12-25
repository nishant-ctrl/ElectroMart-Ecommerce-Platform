<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <?php
        include("../backend/config.php");
        include("../frontend/header.php");
    ?>
  <div class="min-h-full">
    <nav class="bg-blue-500">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">


          <div class="ml-10 flex  space-x-4">

            <a href="index.php" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
              aria-current="page">Dashboard</a>
            <a href="categoryPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add
              Category</a>
            <a href="productPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Products</a>
            <a href="addproduct.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add
              Product</a>
            <a href="customerPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Customers</a>

          </div>
        </div>
      </div>


    </nav>

    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900">Dashboard</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">


        <h2 class="text-3xl font-bold tracking-tight text-gray-900">Categories</h2>

        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Id</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Image</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Status</th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">


              <?php
            $query=$conn->prepare("SELECT * FROM categories ");
            $result=$query->execute();
            $category=$query->fetchAll();
            
            if($category)
            {
                foreach($category as $data)
                {
                    ?>

              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  <?= $data['id'];?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?=  $data['name'];?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><img class="h-20 w-20"
                    src="./uploads/<?= $data['image'];?>" alt="<?=  $data['name'];?>"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= $data['status'] == '0'?"Visible":"Hidden"; ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-lg font-medium">
                  <a class="mx-2 px-2" href="editCategory.php?id=<?=  $data['id'];?>"
                    class="text-indigo-600 hover:underline">Edit</a>
                  <form action="deleteCategory.php" method="post">
                    <input type="hidden" name="category_id" value="<?= $data['id'];?>">
                    <button class="mx-2 px-2" name="delete-category-btn" type="submit">Delete</button>
                  </form>
                </td>
              </tr>
              <?php    

                }
            }
            else
            {
                echo "<h1>No Records Found</h1>";
            }
        ?>




            </tbody>
          </table>
        </div>


      </div>
    </main>
  </div>
  <footer>
    <?php include("../frontend/footer.php");?>
  </footer>
</body>

</html>