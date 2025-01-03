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
                $user_id=$_SESSION['id'];

                $check_query=$conn->prepare("SELECT * FROM wishlist WHERE user_id='$user_id' AND product_id='$product_id'");
                $check_query->execute();
                $check_data=$check_query->fetchAll();
                if($check_data)
                {
                    echo "already_in_wishlist";
                    break;
                }

                $query=$conn->prepare("INSERT INTO `wishlist` (`user_id`, `product_id`) VALUES ('$user_id', '$product_id')");
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
            case 'remove':
                $wishlist_id=$_POST['wishlist_id'];
                $user_id=$_SESSION['id'];
                $check_query=$conn->prepare("SELECT * FROM wishlist WHERE user_id='$user_id' AND id='$wishlist_id'");
                $check_query->execute();
                $check_data=$check_query->fetchAll();
                if($check_data)
                {
                    $query=$conn->prepare("DELETE FROM wishlist WHERE user_id='$user_id' AND id='$wishlist_id'");
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