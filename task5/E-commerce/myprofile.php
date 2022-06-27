<?php
$title = 'MY PROFILE';
include "Layouts/headrer.php";
include "Layouts/navbar.php";
include "Layouts/bread_crumb.php";
include "App/HTTP/middleware/autho.php";

use App\HTTP\Requests\validation;
use App\Database\Models\User;

$validation = new validation;
$user = new User;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['update'])) {
        $validation->setValue_name("first_name")->setValue($_POST['first_name'])->required()->max(32);
        $validation->setValue_name("last_name")->setValue($_POST['last_name'])->required()->max(32);
        $validation->setValue_name("gender")->setValue($_POST['gender'])->required()->in(['1', '2']);
        if (empty($validation->getErrors())) {
            $user->setEmail($_SESSION['user']->email)->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setGender($_POST['gender']);
            if ($user->update()) {
                $_SESSION['user']->first_name = $_POST['first_name'];
                $_SESSION['user']->last_name = $_POST['last_name'];
                $_SESSION['user']->gender = $_POST['gender'];

                $updated = "<div class= 'alert alert-success'>Your Personal Information successfully updated</div>";
            } else {
                $not_updated = "<div class= 'alert alert-danger'>Cannot Updated</div>";
            }
        }
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['change'])) {
        $validation->setValue_name('current_pass')->setValue($_POST['current_pass'])->required()->regex('/^([a-zA-Z0-9@*#]{8,15})$/');
        $validation->setValue_name('new_pass')->setValue($_POST['new_pass'])->required()->regex('/^([a-zA-Z0-9@*#]{8,15})$/')->confirmed($_POST['confirmed']);
        $validation->setValue_name('confirmed')->setValue($_POST['confirmed'])->required();
        if (empty($validation->getErrors())) {
            $user->setEmail($_SESSION['user']->email);
           $user_data = $user->getuser()->get_result()->fetch_object();
            if (password_verify($_POST['current_pass'], $user_data->password)) {
                $user->setEmail($_SESSION['user']->email)-> setPassword($_POST['new_pass']);

                if ($user->update_pass()) {
                    $updated_pass = "<div class= 'alert alert-success'>Your Password successfully updated</div>";
                } else {
                    $not_updated_pass = "<div class= 'alert alert-danger'>Cannot Updated</div>";
                }
            }else{
        
            $error = "<div class= 'text-danger h5 '>Enter Correct Password</div>";
            }
        }

    }
}




?>
<!-- my account start -->
<div class="checkout-area pb-80 pt-100">
    <div class="container">
        <div class="row">
            <div class="ml-auto mr-auto col-lg-9">
                <div class="checkout-wrapper">
                    <div id="faq" class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                            </div>
                            <div id="my-account-1" class="panel-collapse collapse <?= isset($_POST['update']) ? 'show' : '' ?>">
                                <div class="panel-body">
                                    <form action="" method="post">

                                        <div class="billing-information-wrapper">
                                            <div class="account-info-wrapper">
                                                <h4>My Account Information</h4>
                                                <h5>Your Personal Details</h5>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 offset-4 ">
                                                    <?= $updated ?? "" ?>


                                                    <img src="assets/img/<?= $_SESSION['user']->image  ?>" alt="" class="rounded">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>First Name</label>
                                                    <input type="text" name="first_name" value="<?= $_SESSION['user']->first_name ?>">
                                                    <?= $validation->getError('first_name')  ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Last Name</label>
                                                    <input type="text" name="last_name" value="<?= $_SESSION['user']->last_name ?>">
                                                    <?= $validation->getError('last_name') ?>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6">
                                                <div class="billing-info">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="Your Gender">Your Gender</option>

                                                        <option value="1" <?= $_SESSION['user']->gender == '1' ? 'selected' : "" ?>>Male</option>
                                                        <option value="2" <?= $_SESSION['user']->gender == '2' ? 'selected' : "" ?>>Female</option>

                                                    </select>
                                                    <?= $validation->getError('gender') ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">

                                            <div class="billing-btn">
                                                <button type="submit" name="update">Update</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                        </div>
                        <div id="my-account-2" class="panel-collapse collapse <?= isset($_POST['update']) ? 'show' : '' ?>">
                            <div class="panel-body">
                                <div class="billing-information-wrapper">
                                    <div class="account-info-wrapper">
                                        <h4>Change Password</h4>
                                        <h5>Your Password</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <?= $updated_pass  ?? "" ?>
                                            <div class="billing-info">
                                                <label>Currently Password</label>
                                                <input type="password" name="current_pass">
                                                <?= $validation->getError('password') ?>
                                                <?= $error ?? "" ?>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>New Password</label>
                                                    <input type="password" name="new_pass">
                                                    <?= $validation->getError('password') ?>

                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12">
                                                <div class="billing-info">
                                                    <label>New Password Confirm</label>
                                                    <input type="password" name="confirmed">
                                                    <?= $validation->getError('password') ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="billing-back-btn">
                                            <div class="billing-back">
                                                <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                                            </div>
                                            <div class="billing-btn">
                                                <button type="submit" name="change">Change Password</button>
                                            </div>
                                            <?= $not_updated_pass ?? "" ?>
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
    </div>
</div>
<!-- my account end -->
<!-- Footer style Start -->
<footer class="footer-area pt-75 gray-bg-3">
    <div class="footer-top gray-bg-3 pb-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>My Account</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="my-account.php">My Account</a></li>
                                <li><a href="about-us.php">Order History</a></li>
                                <li><a href="wishlist.php">WishList</a></li>
                                <li><a href="#">Newsletter</a></li>
                                <li><a href="about-us.php">Order History</a></li>
                                <li><a href="#">International Orders</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Information</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="about-us.php">About Us</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title mb-25">
                            <h4>Quick Links</h4>
                        </div>
                        <div class="footer-content">
                            <ul>
                                <li><a href="#">Support Center</a></li>
                                <li><a href="#">Term & Conditions</a></li>
                                <li><a href="#">Shipping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="#">FAQS</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget footer-widget-red footer-black-color mb-40">
                        <div class="footer-title mb-25">
                            <h4>Contact Us</h4>
                        </div>
                        <div class="footer-about">
                            <p>Your current address goes to here,120 haka, angladesh</p>
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li>(+008) 254 254 254 25487</li>
                                    <li>(+009) 358 587 657 6985</li>
                                </ul>
                            </div>
                            <div class="footer-contact mt-20">
                                <ul>
                                    <li>yourmail@example.com</li>
                                    <li>example@admin.com</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pb-25 pt-25 gray-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copyright">
                        <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-img f-right">
                        <a href="#">
                            <img alt="" src="assets/img/icon-img/payment.png">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer style End -->


<!-- all js here -->
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<script src="assets/js/isotope.pkgd.min.js"></script>
<script src="assets/js/ajax-mail.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>