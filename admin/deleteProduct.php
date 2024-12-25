<?php
    include("../backend/config.php");
    if(isset($_POST['delete-product-btn']))
    {
        $product_id=$_POST['product_id'];

        $query=$conn->prepare("SELECT image FROM products WHERE id='$product_id'");
        $query->execute();
        $data=$query->fetch();
        if($data)
        {
            $image=$data['image'];
            $delete_query=$conn->prepare("DELETE FROM products WHERE id='$product_id'");
            $result=$delete_query->execute();


            if($result)
            {
                if(file_exists("uploads/".$image))
                {
                    unlink("uploads/".$image);
                }
                echo "<script>alert('Deleted Successfully');</script>";
                header("Location:./index.php");
            }   
            else
            {
                echo "<script>alert('Something went wrong');</script>";
                header("Location:./productPage.php");
            }
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";
            header("Location:./index.php");
        }
    }


?>