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
        if(isset($_SESSION['id']) && $_SESSION['role']!=1)
        {
          header("location:../frontend/index.php");
        }
    ?>
  <div class="min-h-full min-h-screen">
    <nav class="bg-blue-500">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">


          <div class="ml-10 flex  space-x-4">

            <a href="index.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
            <a href="categoryPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add
              Category</a>
            <a href="productPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Products</a>
            <a href="addproduct.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add
              Product</a>
            <a href="orders.php"
              class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
              aria-current="page">Orders</a>
            <a href="customerPage.php"
              class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact Form</a>

          </div>
        </div>
      </div>


    </nav>

    <header class="flex flex-wrap justify-between items-center bg-white shadow px-6 py-6">
      <div class="flex-1">
        <h1 class="text-3xl sm:text-4xl font-bold tracking-tight text-gray-900">Orders</h1>
      </div>
      <div class="mt-4">
        <a href="orderHistory.php" 
          class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition ease-in-out duration-150">
          View Order History
        </a>
      </div>
    </header>

  
    <main>
        <?php
            $query = $conn->prepare("SELECT *  FROM orders WHERE status = '0'");
            $query->execute();
            $orders = $query->fetchAll();
        ?>

    <div class="container mx-auto py-8 px-4 lg:px-8">
       

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class=" w-full border-collapse border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left text-gray-700 border">Order ID</th>
                        <th class="py-3 px-4 text-left text-gray-700 border">Tracking No</th>
                        <th class="py-3 px-4 text-left text-gray-700 border">Customer Name</th>
                        <th class="py-3 px-4 text-left text-gray-700 border">Total Price (Rs.)</th>
                        <th class="py-3 px-4 text-left text-gray-700 border">Order Date</th>
                        <th class="py-3 px-4 text-center text-gray-700 border">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    <?php if (empty($orders)) { ?>
                        <tr>
                            <td class="text-center py-6 text-gray-500">
                                No orders found.
                            </td>
                        </tr>
                    <?php } else { ?>
                        <?php foreach ($orders as $order) { ?>
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4 border"><?= $order['id'] ?></td>
                                <td class="py-3 px-4 border"><?= $order['tracking_no'] ?></td>
                                <td class="py-3 px-4 border"><?= $order['name'] ?></td>
                                <td class="py-3 px-4 border">Rs. <?= $order['total_price'] ?></td>
                                <td class="py-3 px-4 border"><?=$order['created_at'] ?></td>
                                <td class="py-3 px-4 border text-center">
                                    <a href="viewOrder.php?tracking_no=<?= $order['tracking_no'] ?>"
                                        class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition ease-in-out duration-150">
                                        View Details
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
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