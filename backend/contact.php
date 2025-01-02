<?php
    include("./config.php");
    if(isset($_POST['contact_btn']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $subject=$_POST['subject'];
        $message=$_POST['message'];
        $id=$_SESSION['id'];
        $query=$conn->prepare("INSERT INTO `contact_form` (`user_id`, `name`, `email`, `phone`, `subject`, `message`) VALUES ('$id', '$name', '$email', '$phone', '$subject', '$message')");
        $result=$query->execute();
        if($result)
        {
            $_SESSION['message']="Submitted Successfully";
            header("Location:../frontend/contact.php");
        }
        else
        {
            $_SESSION['message']="Something went wrong";
            header("Location:../frontend/contact.php");
        }
    }
    else
    {
        header("Location:../frontend/contact.php");
    }
?>