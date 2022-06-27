
      <?php


      $title = "SINGLE PRODUCT " ;
      include "Layouts/headrer.php";
      include "Layouts/navbar.php";
      include "Layouts/bread_crumb.php";
      use App\Database\Models\Product;
      use App\Database\Models\Review;

$reviews = new Review;
$products = new Product;
if($_GET){
    if(isset($_GET['product'])){
        if(is_numeric($_GET['product'])){
            $products-> setId($_GET['product']);
           $prduct_data =  $products->getproductby_id();
           if($prduct_data->num_rows == 1){
           $product = $prduct_data->get_result()->fetch_object();
           }
                
            }else{
                include "Layouts/error/404.php";die;

            }
        }else{
            include "Layouts/error/404.php";die;

        
    }
    }else{
        include "Layouts/error/404.php";die;
    

}

if($_POST){
   if(isset($_POST['review'])) {
    $validation->setValue_name("first_name")->setValue($_POST['first_name'])-> required()->max(32);

    $validation->setValue_name('email')->setValue($_POST['email'])->required()->regex('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.(([0-9]{1,3})|([a-zA-Z]{2,3})|(aero|coop|info|museum|name))$/')
    ->existes('users', 'email');
    if(empty($validation->getErrors())){
        $reviews->setUser_id($_SESSION['user']->id)->setComment($_POST['comment']);
       $review = $reviews->getComment()->get_result()->fetch_all(MYSQLI_ASSOC);
        
    
    }

   
   }
}
      
      ?>
        
		<!-- Product Deatils Area Start -->
        <div class="product-details pt-100 pb-95">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-img">
                            <img class="zoompro" src="assets/img/product-details/product-detalis-l1.jpg" data-zoom-image="assets/img/product-details/product-detalis-bl1.jpg" alt="zoom"/>
                            
                            <span>-29%</span>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="product-details-content">
                            <h4> </h4>
                            <div class="rating-review">
                                <div class="pro-dec-rating">
                                    <i class="ion-android-star-outline theme-star"></i>
                                    
                                    <i class="ion-android-star-outline"></i>
                                </div>
                                <div class="pro-dec-review">
                                    <ul>
                                        <li></li>
                                        <li> Add Your Reviews</li>
                                    </ul>
                                </div>
                            </div>
                            <span>LE</span>
                            <div class="in-stock">
                                <p>Available: <span>In stock</span></p>
                            </div>
                            <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. </p>
                            <div class="pro-dec-feature">
                                <ul>
                                    <li><input type="checkbox"> Protection Plan: <span> 2 year  $4.99</span></li>
                                    <li><input type="checkbox"> Remote Holder: <span> $9.99</span></li>
                                    <li><input type="checkbox"> Koral Alexa Voice Remote Case: <span> Red  $16.99</span></li>
                                    <li><input type="checkbox"> Amazon Basics HD Antenna: <span>25 Mile  $14.99</span></li>
                                </ul>
                            </div>
                            <div class="quality-add-to-cart">
                                <div class="quality">
                                    <label>Qty:</label>
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="02">
                                </div>
                                <div class="shop-list-cart-wishlist">
                                    <a title="Add To Cart" href="#">
                                        <i class="icon-handbag"></i>
                                    </a>
                                    <a title="Wishlist" href="#">
                                        <i class="icon-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Categories:</li>
                                    <li><a href="#">Green,</a></li>
                                    <li><a href="#">Herbal, </a></li>
                                    <li><a href="#">Loose,</a></li>
                                    <li><a href="#">Mate,</a></li>
                                    <li><a href="#">Organic </a></li>
                                </ul>
                            </div>
                            <div class="pro-dec-categories">
                                <ul>
                                    <li class="categories-title">Tags: </li>
                                    <li><a href="#"> Oolong, </a></li>
                                    <li><a href="#"> Pu'erh,</a></li>
                                    <li><a href="#"> Dark,</a></li>
                                    <li><a href="#"> Special </a></li>
                                </ul>
                            </div>
                            <div class="pro-dec-social">
                                <ul>
                                    <li><a class="tweet" href="#"><i class="ion-social-twitter"></i> Tweet</a></li>
                                    <li><a class="share" href="#"><i class="ion-social-facebook"></i> Share</a></li>
                                    <li><a class="google" href="#"><i class="ion-social-googleplus-outline"></i> Google+</a></li>
                                    <li><a class="pinterest" href="#"><i class="ion-social-pinterest"></i> Pinterest</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Product Deatils Area End -->
        <div class="description-review-area pb-70">
            <div class="container">
                <div class="description-review-wrapper">
                    <div class="description-review-topbar nav text-center">
                        <a class="active" data-toggle="tab" href="#des-details1">Description</a>
                        <a data-toggle="tab" href="#des-details2">Tags</a>
                        <a data-toggle="tab" href="#des-details3">Review</a>
                    </div>
                    <div class="tab-content description-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="product-description-wrapper">
                                <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam est usus legentis in iis qui facit eorum claritatem. </p>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. </p>
                                <ul>
                                    <li>-  Typi non habent claritatem insitam</li>
                                    <li>-  Est usus legentis in iis qui facit eorum claritatem. </li>
                                    <li>-  Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius.</li>
                                    <li>-  Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.</li>
                                </ul>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="product-anotherinfo-wrapper">
                                <ul>
                                    <li><span>Tags:</span></li>
                                    <li><a href="#"> Green,</a></li>
                                    <li><a href="#"> Herbal,</a></li>
                                    <li><a href="#"> Loose,</a></li>
                                    <li><a href="#"> Mate,</a></li>
                                    <li><a href="#"> Organic ,</a></li>
                                    <li><a href="#"> special</a></li>
                                </ul>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane">
                            <div class="rattings-wrapper">
                                <div class="sin-rattings">
                                  
                            <div class="ratting-form-wrapper">
                                <h3>Add your Comments :<?=  $review['comment'] ?></h3>
                                <div class="ratting-form">
                                    <form action="#" method="POST">
                                        <div class="star-box">
                                            <h2>Rating:</h2>
                                            <div class="ratting-star">
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star theme-color"></i>
                                                <i class="ion-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="firs_name" type="text">
                                                    <?= $validation->getError('first_name') ?>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style mb-20">
                                                    <input placeholder="Email" type="text" name="email">
                                                    <?= $validation->getError('email') ?>

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="comment" placeholder="Message"></textarea>
                                                    <input type="submit" value="add review" name="review">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-area pb-100">
            <div class="container">
                <div class="product-top-bar section-border mb-35">
                    <div class="section-title-wrap">
                        <h3 class="section-title section-bg-white">Related Products</h3>
                    </div>
                </div>
                <div class="featured-product-active hot-flower owl-carousel product-nav">
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.php">
                                <img alt="" src="assets/img/product/product-1.jpg">
                            </a>
                            <span>-30%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.php">Le Bongai Tea</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.php">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.php">
                                <img alt="" src="assets/img/product/product-2.jpg">
                            </a>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.php">Society Ice Tea</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.php">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.php">
                                <img alt="" src="assets/img/product/product-3.jpg">
                            </a>
                            <span>-30%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.php">Green Tea Tulsi</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.php">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.php">
                                <img alt="" src="assets/img/product/product-4.jpg">
                            </a>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.php">Best Friends Tea</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.php">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                    <div class="product-wrapper">
                        <div class="product-img">
                            <a href="product-details.php">
                                <img alt="" src="assets/img/product/product-5.jpg">
                            </a>
                            <span>-30%</span>
                            <div class="product-action">
                                <a class="action-wishlist" href="#" title="Wishlist">
									<i class="ion-android-favorite-outline"></i>
								</a>
								<a class="action-cart" href="#" title="Add To Cart">
									<i class="ion-ios-shuffle-strong"></i>
								</a>
								<a class="action-compare" href="#" data-target="#exampleModal" data-toggle="modal" title="Quick View">
									<i class="ion-ios-search-strong"></i>
								</a>
                            </div>
                        </div>
                        <div class="product-content text-left">
							<div class="product-hover-style">
								<div class="product-title">
									<h4>
										<a href="product-details.php">Instant Tea Premix</a>
									</h4>
								</div>
								<div class="cart-hover">
									<h4><a href="product-details.php">+ Add to cart</a></h4>
								</div>
							</div>
							<div class="product-price-wrapper">
								<span>$100.00 -</span>
								<span class="product-price-old">$120.00 </span>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
       <?php 
       include "Layouts/footer.php";
       include "Layouts/footer_script.php";

       
       ?>