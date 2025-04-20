<?php
include("./config.php");
if(isset($_POST['email']) && isset($_POST['password']))
{
    $firstName=$_POST['firstName'];
    $lastName=$_POST['lastName'];
    $name=$firstName.$lastName;
    $password=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $email=$_POST['email'];
    $role=$_POST['role'];
    $getData=$conn->prepare("SELECT * FROM customers WHERE email='$email'");
    $getData->execute();
    $datas=$getData->fetchAll();
    if($datas)
    {
        // die("User already exist with this email.");
        echo "<script>alert('User already exist with this email.');window.location.href='../frontend/register.php';</script>";
        die;
    }
    if ($_POST['role'] == "1") 
    {
        $adminPassword = $_POST['adminPassword'];
        $correctAdminPassword = "NsecretN"; 
        if ($adminPassword !== $correctAdminPassword) {
            // die("Unauthorized admin registration attempt.");
            echo "<script>alert('AdminSecret is incorrect! Please try again.');window.location.href='../frontend/register.php';</script>";
        }
    }

    $query=$conn->prepare("INSERT INTO `customers` (`name`, `email`, `password` ,`role_as`) VALUES ('$name', '$email', '$password' , '$role')");
    $result=$query->execute();
    if($result)
    {
        echo "<script>alert('Signup successful! Please login.');window.location.href='../frontend/login.php';</script>";
    }
    else
    {
        echo "<script>alert('Something went wrong! Please try again.');window.location.href='../frontend/register.php';</script>";

    }
}

?>