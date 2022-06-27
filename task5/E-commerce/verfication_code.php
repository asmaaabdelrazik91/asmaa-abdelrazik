<?php

use App\Database\Models\User;
use App\HTTP\Requests\validation;

$title = "verfication_code";
include "Layouts/headrer.php";
include "App/HTTP/middleware/guest.php";
$validation = new validation;
$error = '';
if ($_GET) {
    if (isset($_GET['email'])) {
        $validation->setValue_name('email')->setValue($_GET['email'])->required()->regex('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/')
            ->existes('users', 'email');

        if (!empty($validation->getErrors())) {
            include "Layouts/error/404.php";
            die;
        }
    } else {
        include "Layouts/error/404.php";
        die;
    }
} else {
    include "Layouts/error/404.php";
    die;
}
$user = new User;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $validation->setValue_name('verfication_code')->setValue($_POST['verfication_code'])->required()->num_digit(6)->int()
        ->existes('users', 'verfication_code');
    if (!empty($validation->getErrors())) {
        $error = $validation->getError('verfication_code');
    }



    if ($_GET['page'] == 'verfication_email') {
        $user->setEmail($_GET['email'])->setVerfication_code($_POST['verfication_code']);
        $code_result = $user->check_code();
        if ($code_result->get_result()->num_rows == 1) {
            header("location:set_pass.php?email=".$_GET['email']);
            die;
        } else {
            $not_verified = "<div class= 'alert alert-danger'>Code Is Incorrect</div>";
        } 
    
    }




        $user->setEmail($_GET['email'])->setVerfication_code($_POST['verfication_code']);
        $code_result = $user->check_code();
        if ($code_result->get_result()->num_rows == 1) {
            date_default_timezone_set('Africa/Cairo');
            $user->setEmail_verified_at(date('Y-m-d H:i:s'));
            if ($user->verification_user()) {
                $verified = "<div class= 'alert alert-success'>Code Is Verified</div>";
                header("refresh:5;url=login.php");
            } else {
                "<div class= 'alert alert-danger'>error occured</div>";
            }
        } else {
            $not_verified = "<div class= 'alert alert-danger'>Code Is Incorrect</div>";
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
                            <h4> <?= $title ?></h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <?php echo $verified  ?? "" ?>
                                        <input type="number" name="verfication_code" placeholder="verfication_code">
                                        <?php echo $error; ?>
                                        <div class="button-box">

                                            <button type="submit"><span>Verify</span></button>
                                            <?php echo $not_verified ?? "" ?>

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