<?php

$title = "Register" ;
include "Layouts/headrer.php";
include "Layouts/navbar.php";
include "Layouts/bread_crumb.php";
include "App/HTTP/middleware/guest.php";
use App\HTTP\Requests\validation;
use App\Database\Models\User;
$validation = new validation;

if($_SERVER['REQUEST_METHOD']== "POST" && $_POST){
$validation->setValue_name("first_name")->setValue($_POST['first_name'])-> required()->max(32);
$validation->setValue_name("last_name")->setValue($_POST['last_name'])-> required()->max(32);
$validation->setValue_name("password")->setValue($_POST['password'])-> required()->regex('/^([a-zA-Z0-9@*#]{8,15})$/')->confirmed($_POST['password-confirmation']);
$validation->setValue_name("Password-confirmation")->setValue($_POST['password-confirmation'])-> required();
$validation->setValue_name("email")->setValue($_POST['email'])-> required()->regex('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/')->unique('users' , 'email');
$validation->setValue_name("phone")->setValue($_POST['phone'])-> required()->
regex('/^01[0125][0-9]{8}$/')->unique('users' , 'phone');
$validation->setValue_name("gender")->setValue($_POST['gender'])-> required()->in(['1','2']);
if(empty($validation->getErrors())){
    $code = rand(100000,999999);
    $user = new User;
    $user->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setPassword($_POST['password'])
    ->setEmail($_POST['email'])-> setPhone($_POST['phone'])->setGender($_POST['gender'])
    -> setVerfication_code($code);
    if($user->create()){
header('location:verfication_code.php?email=' .$_POST['email']);
die;
    }else{
        $error = "<div class='text-center text-uppercase font-weight-bold alert alert-danger'> Registeration  Faild </div>";
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

                        <a data-toggle="tab" class="active" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>

                    <div id="lg2" class="tab-pane">
                        <div class="login-form-container">
                            <div class="login-register-form">
                                <form action="" method="post">
                                    <input type="text" name="first_name" placeholder="first_name" value="<?= $_POST['first_name'] ?? "" ?>">
                                    <?= $validation->getError('first_name') ?>
                                    <input type="text" name="last_name" placeholder="last_name" value="<?= $_POST['last_name'] ?? "" ?>">
                                    <?= $validation->getError('last_name') ?>

                                    <input type="password" name="password" placeholder="Password" value="">
                                    <?= $validation->getError('password') ?>

                                    <input type="password" name="password-confirmation" placeholder="Password-confirmation" value="">
                                    <?= $validation->getError('Password-confirmation') ?>

                                    <input name="email" placeholder="Email" type="email" value="<?= $_POST['email'] ?? "" ?>">
                                    <?= $validation->getError('email') ?>

                                    <input name="phone" placeholder="phone" type="number " value="">
                                    <?= $validation->getError('phone') ?>

                                     <select name="gender" class="form-control">
                                     <option  value="Your Gender">Your Gender</option>

                                        <option <?= (isset($_POST['gender']) && $_POST['gender'] == '1') ? 'selected' : '' ?> value="1">Male</option>
                                        <option <?= (isset($_POST['gender']) && $_POST['gender'] == '2') ? 'selected' : '' ?> value="2">Female</option>

                                    </select> 
                                   
                                    <?= $validation->getError('gender') ?>



                                    <div class="button-box mt-4" >
                                        <button type="submit"><span>Register</span></button>

                                    </div>
                                    <?= $error ?? "" ?>
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