<?php
include("./config.php");
if(isset($_POST['email']) && isset($_POST['password']))
{
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $name=$firstName.$lastName;
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $email=$_POST['email'];
    $getData=$conn->prepare("SELECT * FROM customers WHERE email='$email'");
    $getData->execute();
    $datas=$getData->fetchAll();
    if($datas)
    {
        // die("User already exist with this email.");
        echo "<script>alert('User already exist with this email.')</script>";
        die;
    }
    $query=$conn->prepare("INSERT INTO `customers` (`name`, `email`, `password`) VALUES ('$name', '$email', '$password')");
    $result=$query->execute();
    if($result)
    {
        echo "<script>alert('Signup successful! Please login.');</script>";
    }
    else
    {
        echo "<script>alert('Something went wrong! Please try again.');</script>";

    }
}

?>