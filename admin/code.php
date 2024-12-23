<?php
    include("../backend/config.php");
    if(isset($_POST['add_category_btn']))
    {
        $name=$_POST['name'];
        $slug=$_POST['slug'];
        $description=$_POST['description'];
        $meta_title=$_POST['meta_title'];
        $meta_description=$_POST['meta_description'];
        $meta_keywords=$_POST['meta_keywords'];
        $status = isset($_POST['status']) ? 1 : 0;
        $popular = isset($_POST['popular']) ? 1 : 0;
         
        $image=$_FILES['image']['name'];
        $path="uploads";
        $image_ext=pathinfo($image,PATHINFO_EXTENSION);
        $filename=time().'.'.$image_ext;

        $query=$conn->prepare("INSERT INTO `categories` (`name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`) VALUES ('$name', '$slug', '$description', '$status', '$popular', '$filename', '$meta_title', '$meta_description', '$meta_keywords')");
        $result=$query->execute();

        if($result)
        {
            // echo "Successful";
            move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/'.$filename);
            echo "<script>alert('Added Successfully');</script>";
            header("Location:./categoryPage.php");
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";
            header("Location:./categoryPage.php");
        }

    }
    elseif(isset($_POST['update_category_btn']))
    {
        $category_id=$_POST['category_id'];
        $name=$_POST['name'];
        $slug=$_POST['slug'];
        $description=$_POST['description'];
        $meta_title=$_POST['meta_title'];
        $meta_description=$_POST['meta_description'];
        $meta_keywords=$_POST['meta_keywords'];
        $status = isset($_POST['status']) ? 1 : 0;
        $popular = isset($_POST['popular']) ? 1 : 0;
        $path="uploads";
        $new_image=$_FILES['image']['name'];
        $old_image=$_POST['old_image'];
        if($new_image!="")
        {
            $new_filename = time() . '.' . pathinfo($new_image, PATHINFO_EXTENSION);
        }
        else
        {
            $new_filename=$old_image;
        }
        $query=$conn->prepare("UPDATE categories SET name='$name' , slug='$slug' , description='$description' , popular='$popular' , image='$new_filename' , meta_title='$meta_title' , meta_description='$meta_description' , meta_keywords='$meta_keywords' WHERE id='$category_id'");
        $result=$query->execute();
        if($result)
        {
            if($_FILES['image']['name']!="")
            {
                move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/'.$new_filename);
            }
            if(file_exists("uploads/".$old_image))
            {

                unlink("uploads/".$old_image);
            }
          
            echo "<script>alert('Updated Successfully');</script>";
            header("Location:./index.php");
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";
            header("Location:./editCategory.php");
        }

    }   
?>

