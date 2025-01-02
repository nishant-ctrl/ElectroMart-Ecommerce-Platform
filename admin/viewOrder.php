<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');
    </script>
</head>
<body>

<?php
        include("../backend/config.php");
        include("../frontend/header.php");
        if(isset($_SESSION['message']))
        {
            ?>
        <script>alertify.success("<?php echo $_SESSION['message']; ?>");</script>
        <?php
            unset($_SESSION['message']);
        }
    ?>
  <div class="min-h-full">
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


<?php
    if (!isset($_SESSION['id'])) {
        header("Location: login.php");
        exit();
    }

    if(isset($_GET['tracking_no']))
    {
        $tracking_no = $_GET['tracking_no'];
       
        $query=$conn->prepare("SELECT * FROM orders WHERE tracking_no = '$tracking_no'");
        $query->execute();
        $data=$query->fetch();
        if(!$data)
        {
            die();
        }
        $tracking_no=$data['tracking_no'];
        
    }
    else
    {
        header("Location:orders.php");
    }
?>

<div class="container mx-auto py-8 px-6 lg:px-12">
    <div class="flex items-center justify-between bg-blue-600 rounded-lg p-6 shadow-lg">
    <h1 class="text-4xl font-bold text-white">Order Details</h1>
    <a href="orders.php" 
    class="px-8 py-3 bg-yellow-500 text-white text-lg font-semibold rounded-md shadow-md hover:bg-yellow-600 transition-all duration-150 ease-in-out ">
        Back
    </a>
    </div>

    <div class="bg-white shadow-xl rounded-lg p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            <div class="border rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6">Delivery Details</h2>
                <hr>
                <div class="space-y-5 text-lg">
                    <div>
                        <label class="font-bold text-gray-600" for="name">Name</label>
                        <div class="border p-1 text-gray-800"><?= $data['name']?></div>
                    </div>
                    <div>
                        <label class="font-bold text-gray-600" for="email">Email</label>
                        <div class="border p-1 text-gray-800"><?= $data['email']?></div>
                    </div>
                    <div>
                        <label class="font-bold text-gray-600" for="phone">Phone</label>
                        <div class="border p-1 text-gray-800"><?= $data['phone']?></div>
                    
                    </div>
                    <div>
                        <label class="font-bold text-gray-600" for="tracking_no">Tracking No.</label>
                        <div class="border p-1 text-gray-800"><?= $data['tracking_no']?></div>
                       
                    </div>
                    <div>
                        <label class="font-bold text-gray-600" for="address">Address</label>
                        <div class="border p-1 text-gray-800"><?= $data['address']?></div>
       
                    </div>
                    <div>
                        <label class="font-bold text-gray-600" for="pin_code">Pin Code</label>
                        <div class="border p-1 text-gray-800"><?= $data['pin_code']?></div>
                      
                    </div>
                </div>
            </div>
            <!-- Order Details -->
            <div class="border rounded-lg p-6">
                <h2 class="text-2xl font-semibold text-gray-700 mb-6">Order Details</h2>
                <hr>
                <table class="w-full border-collapse text-lg">
                    <thead>
                        <tr class="border-b text-gray-700 font-semibold">
                            <th class="py-4 text-left">Product</th>
                            <th class="py-4 text-right">Price</th>
                            <th class="py-4 text-center">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $order_query=$conn->prepare("SELECT o.id as oid,o.tracking_no,o.user_id,oi.*,p.* FROM orders o , order_items oi , products p WHERE  oi.order_id=o.id AND p.id=oi.product_id AND o.tracking_no='$tracking_no'");
                            $order_query->execute();
                            $order_data=$order_query->fetchAll();
                            foreach($order_data as $order)
                            {
                                ?>
                                    <tr class="border-b">
                                        <td class="py-4">
                                            <div class="flex items-center space-x-5">
                                                 <img src="./uploads/<?=$order['image']?>" alt="<?=$order['name']?>" class="w-16 h-16 rounded object-contain">
                                                <span><?=$order['name']?></span>
                                            </div>
                                        </td>
                                        <td class="py-4 text-right"><?=$order['selling_price']?></td>
                                        <td class="py-4 text-center">x<?=$order['quantity']?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
                <div class="flex justify-between mt-6">
                    <span class="text-xl font-semibold text-gray-700">Total Price:</span>
                    <span class="text-2xl font-bold text-gray-900"><?=$data['total_price']?></span>
                </div>
                <div>
                    <label class="font-bold text-gray-600" for="">Payment Mode</label>
                    <div class="border p-1 text-gray-800"><?= $data['payment_mode']?></div>
                </div>
                <div>
                    <label class="font-bold text-gray-600" for="status">Status</label>
                    <div class="border p-1 text-gray-800">
                        <form action="code.php" method="post">
                            <input type="hidden" name="tracking_no" value="<?= $data['tracking_no']?>">
                        <select name="order_status" class="w-full focus:outline-none focus:border focus:border-indigo-300">
                            <option value="0" <?php if($data['status']==0) echo"selected"?>>Under Process</option>
                            <option value="1"  <?php if($data['status']==1) echo"selected"?>>Completed</option>
                            <option value="2"  <?php if($data['status']==2) echo"selected"?>>Cancelled</option>
                        </select>
                        <button type="submit" class="w-full bg-blue-600 text-white py-2 hover:bg-blue-700 shadow-md transition duration-200 mt-4" name="update_order_btn">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    







<footer>
  <?php include("../frontend/footer.php");?>
</footer>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier','position', 'top-right');
    </script>
<script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>    
<script src="js/inc.js"></script>    
</body>
</html>