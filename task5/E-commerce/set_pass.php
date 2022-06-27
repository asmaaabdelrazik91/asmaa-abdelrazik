
<?php 


$title = "SET NEW PASSWORD";
include "Layouts/headrer.php";
include "App/HTTP/middleware/guest.php";

use App\Database\Models\User;
use App\HTTP\Requests\validation;

$validation = new validation;
if($_SERVER['REQUEST_METHOD']== "POST" && $_POST){
    $validation->setValue_name("password")->setValue($_POST['password'])-> required()->regex('/^([a-zA-Z0-9@*#]{8,15})$/')-> confirmed($_POST['password-confirmation']);
$validation->setValue_name("Password-confirmation")->setValue($_POST['password-confirmation'])-> required();
if(empty($validation->getErrors())){
$user = new User ;
$user->setEmail($_GET['email']) ->setPassword($_POST['password']);
if($user->update_pass()){
header('location:login.php');die;
}else{
    $error = "<div class='text-center text-uppercase font-weight-bold alert alert-danger'> Changing Password  Faild </div>";

}
}
}

?>

<div class="login-register-area ptb-100">
         <div class="container">
             <div class="row">
                 <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                     <div class="login-register-wrapper">
                         <div class="login-register-tab-list nav">
                             <a class="active" data-toggle="tab" href="#lg1">
                                 <h4> <?= $title?></h4>
                             </a>
                            
                         </div>
                         <div class="tab-content">
                             <div id="lg1" class="tab-pane active">
                                 <div class="login-form-container">
                                     <div class="login-register-form">
                                         <form action="" method="post">
                                             
                                    <input type="password" name="password" placeholder="Password" value="">
                                    <?= $validation->getError('password') ?>

                                    <input type="password" name="password-confirmation" placeholder="Password-confirmation" value="">
                                    <?= $validation->getError('Password-confirmation') ?>

                                         
                                             <div class="button-box">
                                                 
                                                 <button type="submit"><span>Change Password</span></button>
                                                 <?= $error ?? "" ?>


                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                            
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <?php
        include_once "Layouts/footer.php";
        include_once "Layouts/footer_script.php";


        ?>