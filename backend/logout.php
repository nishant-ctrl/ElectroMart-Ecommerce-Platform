<?php
include("config.php");
session_unset();
session_destroy();
header('Location: ../frontend/login.php');
exit();
?>