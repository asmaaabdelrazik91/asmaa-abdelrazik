<?php
session_start();
include "App/HTTP/middleware/autho.php";

unset($_SESSION['user']);
if(isset($_COOKIE['remember'])){
setcookie('remember','',time() -1,"/"); 
}

header('location:login.php');die;


?>