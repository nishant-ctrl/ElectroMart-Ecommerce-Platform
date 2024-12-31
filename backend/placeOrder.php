<?php
    include("config.php");
    if(isset($_SESSION['id']))
    {
        if(isset($_POST['placeOrderBtn']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pin = $_POST['pin'];
            $address = $_POST['address'];
            $payment_mode = $_POST['payment_mode'];
            $payment_id = $_POST['payment_id'];
            if($name=="" || $email=="" || $phone=="" || $pin=="" || $address=="")
            {
                header("Location: ../frontend/checkout.php");
                exit();
            }
            
            $total_price = $_POST['total_price'];
            $user_id = $_SESSION['id'];
            $tracking_no="NIS".rand(1000,9999).substr($phone,8);
            
            $query=$conn->prepare("INSERT INTO `orders` ( `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pin_code`, `total_price`, `payment_mode`, `payment_id`) VALUES ('$tracking_no', '$user_id', '$name', '$email', '$phone', '$address', '$pin', '$total_price','$payment_mode', '$payment_id')");
            
            $result=$query->execute();
            if($result)
            {
                $order_id = $conn->lastInsertId();

                $cart_query = $conn->prepare("SELECT c.id as cid,c.product_qty, c.product_id,p.id as pid,p.name , p.image , p.selling_price FROM carts c, products p WHERE c.product_id = p.id AND c.user_id = '$user_id' ORDER BY c.id DESC ");
                $cart_query->execute();
                $cartItems = $cart_query->fetchAll();

                foreach($cartItems as $item)
                {
                    $product_id=$item['pid'];
                    $quantity=$item['product_qty'];
                    $price=$item['selling_price'];
                    $order_item_query=$conn->prepare("INSERT INTO order_items (order_id,product_id,quantity,price) VALUES ('$order_id', '$product_id', '$quantity', '$price')");
                    $order_item_query->execute();
                    $product_query=$conn->prepare("SELECT * FROM products WHERE id='$product_id'");
                    $product_query->execute();
                    $product=$product_query->fetch();
                    $current_quantity=$product['qty'];
                    $new_quantity=$current_quantity-$quantity;
                    $update_quantity_query=$conn->prepare("UPDATE products SET qty='$new_quantity' WHERE id='$product_id'");
                    $update_quantity_query->execute();
                 
                }

                $delete_cart_query=$conn->prepare("DELETE FROM carts WHERE user_id='$user_id'");
                $delete_cart_query->execute();

                $_SESSION['message']="Order Placed Successfully";
                echo "<script>window.location.href='../frontend/myOrders.php';</script>";
                die();
            }

        }
        else
        {
            echo "<script>window.location.href='../frontend/cart.php';</script>";
        }
    }
    else
    {
        echo "<script>window.location.href='../frontend/login.php';</script>";
    }    
?>