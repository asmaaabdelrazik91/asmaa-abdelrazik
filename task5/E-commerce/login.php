     <?php
        $title = "login";

        include "Layouts/headrer.php";
        include "Layouts/navbar.php";
        include "Layouts/bread_crumb.php";
        include "App/HTTP/middleware/guest.php";

        use App\Database\Models\User;
        use App\HTTP\Requests\validation;

        $validation = new validation;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $validation->setValue_name('email')->setValue($_POST['email'])->required()->regex('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/')
                ->existes('users', 'email');
            $validation->setValue_name('password')->setValue($_POST['password'])->required()->regex('/^([a-zA-Z0-9@*#]{8,15})$/');
            if (!empty($validation->getErrors())) {
                $error = "<div class= 'alert alert-danger mt-5 p-5 h4'>The Email OR Password Is Incorrect</div>";
            } else {
                $user = new User;
                $user->setEmail($_POST['email']);
                $user_data = $user->getuser()->get_result()->fetch_object();
                if (password_verify($_POST['password'], $user_data->password)) {
                    if (!is_null($user_data->email_verified_at)) {

                        if (isset($_POST['remember'])) {

                            setcookie('remember', $_POST['email'], time() + (86400 * 60), "/");
                        }
                        $_SESSION['user'] = $user_data;
                        header("location:index.php");
                        die;
                    } else {
                        header("location:verfication_code.php?email=" . $_POST['email']);
                        die;
                    }
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
                                 <h4><?php echo $title ?></h4>
                             </a>

                         </div>
                         <div class="tab-content">
                             <div id="lg1" class="tab-pane active">
                                 <div class="login-form-container">
                                     <div class="login-register-form">
                                         <form action="" method="post">
                                             <input type="email" name="email" placeholder="Enter Your Email">
                                             <?= $validation->getError('email') ?>
                                             <input type="password" name="password" placeholder="Password">
                                             <?= $validation->getError('Password') ?>

                                             <div class="button-box">
                                                 <div class="login-toggle-btn">
                                                     <input type="checkbox" name="remember">
                                                     <label>Remember me</label>
                                                     <a href="verfication_email.php">Forgot Password?</a>
                                                 </div>
                                                 <button type="submit"><span>Login</span></button>
                                             </div>
                                         </form>
                                         <?= $error ?? "" ?>

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