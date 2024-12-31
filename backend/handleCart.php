<?php
include("config.php");
if(isset($_SESSION['id']))
{
    if(isset($_POST['scope']))
    {
        $scope=$_POST['scope'];
        switch ($scope) {
            case 'add':
                $product_id=$_POST['product_id'];
                $quantity=$_POST['quantity'];
                $user_id=$_SESSION['id'];

                $check_query=$conn->prepare("SELECT * FROM carts WHERE user_id='$user_id' AND product_id='$product_id'");
                $check_query->execute();
                $check_data=$check_query->fetchAll();
                if($check_data)
                {
                    $query=$conn->prepare("UPDATE carts SET product_qty='$quantity' WHERE user_id='$user_id' AND product_id='$product_id'");
                    $result=$query->execute();
                    if($result)
                    {
                        echo "updated";
                    }
                    else
                    {
                        echo 500;
                    }
                    break;
                }

                $query=$conn->prepare("INSERT INTO `carts` (`user_id`, `product_id`, `product_qty`) VALUES ('$user_id', '$product_id', '$quantity')");
                $result=$query->execute();
                if($result)
                {
                    echo 201;
                }
                else
                {
                    echo 500;
                } 
                break;
            case 'update':
                $product_id=$_POST['product_id'];
                $quantity=$_POST['quantity'];
                $user_id=$_SESSION['id'];


                $check_query=$conn->prepare("SELECT * FROM carts WHERE user_id='$user_id' AND product_id='$product_id'");
                $check_query->execute();
                $check_data=$check_query->fetchAll();
                if($check_data)
                {
                    $query=$conn->prepare("UPDATE carts SET product_qty='$quantity' WHERE user_id='$user_id' AND product_id='$product_id'");
                    $result=$query->execute();
                    if($result)
                    {
                        echo "updated";
                    }
                    else
                    {
                        echo 500;
                    }
                    break;
                }
                else
                {
                    echo 500;
                }
                break;



            case 'remove':
                $cart_id=$_POST['cart_id'];
                $user_id=$_SESSION['id'];
                $check_query=$conn->prepare("SELECT * FROM carts WHERE user_id='$user_id' AND id='$cart_id'");
                $check_query->execute();
                $check_data=$check_query->fetchAll();
                if($check_data)
                {
                    $query=$conn->prepare("DELETE FROM carts WHERE user_id='$user_id' AND id='$cart_id'");
                    $result=$query->execute();
                    if($result)
                    {
                        echo "removed";
                    }
                    else
                    {
                        echo 500;
                    }
                }
                else
                {
                    echo 500;
                }
                break;
                
                
            default:
                echo 500;
                break;
        }
    }
}
else
{
    echo 401;
    // header("Location:../frontend/login.php");
    // exit();
}
?>