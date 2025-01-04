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

                        <a href="index.php"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Dashboard</a>
                        <a href="categoryPage.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add Category</a>
                        <a href="productPage.php" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Products</a>
                        <a href="addProduct.php"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Add
                            Products</a>
                        <a href="orders.php"
                            class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Orders</a>
                        <a href="customerPage.php"
                            class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                            aria-current="page">Contact Form</a>

                    </div>
                </div>
            </div>


        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Contacts</h1>
            </div>
        </header>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
         
                 <?php
                        $query = $conn->prepare("SELECT * FROM contact_form ORDER BY created_at DESC");
                        $query->execute();
                        $feedbacks = $query->fetchAll();
                    ?>

                    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                       

                        <div class="bg-white shadow-md rounded-lg overflow-hidden">
                            <table class="table-auto w-full border-collapse border border-gray-200">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="py-3 px-4 text-left text-gray-700 border">User ID</th>
                                        <th class="py-3 px-4 text-left text-gray-700 border">Name</th>
                                        <th class="py-3 px-4 text-left text-gray-700 border">Email</th>
                                        <th class="py-3 px-4 text-left text-gray-700 border">Phone</th>
                                        <th class="py-3 px-4 text-left text-gray-700 border">Subject</th>
                                        <th class="py-3 px-4 text-left text-gray-700 border">Message</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm">
                                    <?php if (empty($feedbacks)) { ?>
                                        <tr>
                                            <td colspan="7" class="text-center py-6 text-gray-500">
                                                No feedback found.
                                            </td>
                                        </tr>
                                    <?php } else { ?>
                                        <?php foreach ($feedbacks as $feedback) { ?>
                                            <tr class="hover:bg-gray-50">
                                                <td class="py-3 px-4 border"><?= $feedback['user_id'] ?></td>
                                                <td class="py-3 px-4 border"><?= $feedback['name'] ?></td>
                                                <td class="py-3 px-4 border"><?= $feedback['email'] ?></td>
                                                <td class="py-3 px-4 border"><?= $feedback['phone'] ?></td>
                                                <td class="py-3 px-4 border"><?= $feedback['subject'] ?></td>
                                                <td class="py-3 px-4 border"><?= $feedback['message'] ?></td>
                                               
                                            </tr>
                                        <?php } 
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </main>
    </div>
<footer>
  <?php include("../frontend/footer.php");?>
</footer>
</body>

</html>