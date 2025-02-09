<?php
session_start();
$host="localhost";
$username="root";
$password=null;
$conn=new PDO("mysql:host=$host;dbname=electromart",$username,$password);
// echo "Connection made";

?>