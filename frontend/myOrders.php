<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
    <script> alertify.set('notifier', 'position', 'top-right');
    </script>
</head>

<body>

    <div class="my_cart_data">
        <?php
        include("../backend/config.php");
        include("./header.php");

        if (!isset($_SESSION['id'])) {
            header("Location: login.php");
            exit();
        }

        if(isset($_SESSION['message']))
        {
            ?>
        <script>alertify.success("<?php echo $_SESSION['message']; ?>");</script>
        <?php
            unset($_SESSION['message']);
        }

        $user_id = $_SESSION['id'];
        $query = $conn->prepare("SELECT * FROM orders WHERE user_id = '$user_id'");
        $query->execute();
        $orders = $query->fetchAll();
        ?>


        <div class="container mx-auto py-8 px-4 lg:px-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">My Orders</h1>

            <?php if (empty($orders)) { ?>
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <p class="text-gray-500 text-lg">
                    You haven't placed any orders yet.
                    <a href="index.php" class="text-blue-500 font-medium hover:underline">Start Shopping</a>
                </p>
            </div>
            <?php } else { ?>
            <div class="space-y-6">
                <?php foreach ($orders as $order) { ?>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center mb-4">
                        <div>
                            <h2 class="text-lg font-bold text-gray-800">Order ID:
                                <?= $order['id'] ?>
                            </h2>
                            <p class="text-sm text-gray-500">Tracking No:
                                <?= $order['tracking_no'] ?>
                            </p>
                        </div>
                        <div>
                            <span class="text-sm text-gray-500">
                                <?= $order['created_at'] ?>
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <p class="text-gray-800 font-medium">Total Price: Rs.
                            <?= $order['total_price'] ?>
                        </p>
                        <a href="viewOrder.php?tracking_no=<?= $order['tracking_no'] ?>"
                            class="bg-blue-600 text-white py-2 px-6 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                            View Details
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    









        <footer>
            <?php include("./footer.php");?>
        </footer>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/alertify.min.js"></script>
        <script> alertify.set('notifier', 'position', 'top-right');
        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="js/inc.js"></script>
</body>

</html>