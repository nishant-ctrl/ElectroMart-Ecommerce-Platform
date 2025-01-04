<?php
include("./config.php");
if(isset($_POST['email']) && isset($_POST['password']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $query=$conn->prepare("SELECT * FROM customers WHERE email='$email' AND role_as='$role'");
    $query->execute();
    $datas=$query->fetchAll();
    if($datas)
    {
        // print_r($datas);
        // echo $datas[0]['password'];
        if(password_verify($password,$datas[0]['password']))
        {
            $_SESSION['id']=$datas[0]['id'];
            $_SESSION['name']=$datas[0]['name'];
            $_SESSION['email']=$datas[0]['email'];
            if($datas[0]['role_as']==1)
            {
                $_SESSION['role']=1;
                echo "<script>alert('Sign in Successful as Admin.');window.location.href='../admin/index.php';</script>";
            }
            else
            {
                $_SESSION['role']=0;
                echo "<script>alert('Sign in Successful as User.');window.location.href='../frontend/index.php';</script>";
            }
        }
        else
        {
            echo "<script>alert('Password not Matched.');window.location.href='../frontend/login.php';</script>";
            // header()
        }
    }
    else
    {
        echo "<script>alert('No user found with this email and role.');window.location.href='../frontend/login.php';</script>";
        die;
    }
}
else
{
    echo "<script>alert('Something went wrong! Try again.');window.location.href='../frontend/login.php';</script>";
}
// echo $_SESSION['name'];
?>

