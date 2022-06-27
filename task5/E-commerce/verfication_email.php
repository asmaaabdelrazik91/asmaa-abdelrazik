<?php

use App\HTTP\Requests\validation;

$title = "verfication_email";
        include "Layouts/headrer.php";
        include "App/HTTP/middleware/guest.php";
        $validation =new validation ;
        $error = '';



if($_SERVER['REQUEST_METHOD']== "POST"){
    $validation->setValue_name('email')->setValue($_POST['email'])->required()->regex('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/')
->existes('users','email');
    if(!empty($validation->getErrors())){
        $error = $validation->getError('email') ; 
    }
   else{
    header('location:verfication_code.php?page=verfication_email&email='.$_POST['email']);die;
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
                                            <?php echo $verified  ?? "" ?>
                                             <input type="email" name="email" placeholder="Enter Your Email">
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