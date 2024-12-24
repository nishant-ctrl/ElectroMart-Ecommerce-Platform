<?php
    include("../backend/config.php");
    if(isset($_POST['delete-category-btn']))
    {
        $category_id=$_POST['category_id'];

        $query=$conn->prepare("SELECT image FROM categories WHERE id='$category_id'");
        $query->execute();
        $data=$query->fetch();
        if($data)
        {
            $image=$data['image'];
            $delete_query=$conn->prepare("DELETE FROM categories WHERE id='$category_id'");
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
                header("Location:./index.php");
            }
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";
            header("Location:./index.php");
        }
    }


?>