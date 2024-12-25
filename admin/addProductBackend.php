<?php
    include("../backend/config.php");
    if(isset($_POST['add_product_btn']))
    {
        $category_id=$_POST['category_id'];
        $name=$_POST['name'];
        $slug=$_POST['slug'];
        $small_description=$_POST['small_description'];
        $description=$_POST['description'];
        $original_price=$_POST['original_price'];
        $selling_price=$_POST['selling_price'];
        $qty=$_POST['qty'];
        $meta_title=$_POST['meta_title'];
        $meta_description=$_POST['meta_description'];
        $meta_keywords=$_POST['meta_keywords'];
        $status = isset($_POST['status']) ? 1 : 0;
        $trending = isset($_POST['trending']) ? 1 : 0;
         
        $image=$_FILES['image']['name'];
        $path="uploads";
        $image_ext=pathinfo($image,PATHINFO_EXTENSION);
        $filename=time().'.'.$image_ext;

        $query=$conn->prepare("INSERT INTO `products` (`category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`) VALUES ( '$category_id', '$name', '$slug', '$small_description', '$description', '$original_price', '$selling_price', '$filename', '$qty', '$status', '$trending', '$meta_title', '$meta_keywords', '$meta_description')");
        $result=$query->execute();

        if($result)
        {
            // echo "Successful";
            move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/'.$filename);
            echo "<script>alert('Product added successfully');</script>";
            header("Location:./productPage.php");
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";
            header("Location:./productPage .php");
        }
    }
    elseif(isset($_POST['edit_product_btn']))
    {
        $product_id=$_POST['product_id'];
        $category_id=$_POST['category_id'];
        $name=$_POST['name'];
        $slug=$_POST['slug'];
        $small_description=$_POST['small_description'];
        $description=$_POST['description'];
        $original_price=$_POST['original_price'];
        $selling_price=$_POST['selling_price'];
        $qty=$_POST['qty'];
        $meta_title=$_POST['meta_title'];
        $meta_description=$_POST['meta_description'];
        $meta_keywords=$_POST['meta_keywords'];
        $status = isset($_POST['status']) ? 1 : 0;
        $trending = isset($_POST['trending']) ? 1 : 0;

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

        $query=$conn->prepare("UPDATE products SET category_id='$category_id' , name='$name' , slug='$slug' , small_description='$small_description' , description='$description' , original_price='$original_price' , selling_price='$selling_price' , image='$new_filename' , qty='$qty', status='$status' , trending='$trending' , meta_title='$meta_title' ,  meta_keywords='$meta_keywords' ,meta_description='$meta_description' WHERE id='$product_id'");
        $result=$query->execute();
        if($result)
        {
            if($new_image!="")
            {
                $check=move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/'.$new_filename);
            }
            if($check)
            {
                if(file_exists("uploads/".$old_image))
                {
                    unlink("uploads/".$old_image);
                }
            }
          
            echo "<script>alert('Updated Successfully');</script>";
            header("Location:./productPage.php");
        }
        else
        {
            echo "<script>alert('Something went wrong');</script>";
            header("Location:./editCategory.php");
        }
    }
?>