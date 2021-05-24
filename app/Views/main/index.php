<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?= $shop['shop_name'] ?> | Emenu</title>


      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="" />
      <meta name="keywords" content="" />
      <meta name="author" content="" />
      <!-- Facebook and Twitter integration -->
      <meta property="og:title" content=""/>

      <meta property="og:image" content=""/>

      <meta property="og:url" content=""/>
      <meta property="og:site_name" content=""/>
      <meta property="og:description" content=""/>
      <meta name="twitter:title" content="" />
      <meta name="twitter:image" content="" />
      
      
      <meta name="twitter:url" content="" />
      <meta name="twitter:card" content="" />
      <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
      <link rel="shortcut icon" href="<?= base_url() . '/' . $shop['icon'] ?>">
      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
      <script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAIJ95ufzqwjC7nE6nuUocyjOABoqFPaA&callback=initAutocomplete&libraries=places&v=weekly"
         defer
         ></script>
      <!-- Animate.css -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/animate.css">
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/hover.css">
      <!-- Icomoon Icon Fonts-->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/icomoon.css">
      <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/font-awesome.min.css"> -->
      <script src="https://kit.fontawesome.com/3d15aa1b08.js" crossorigin="anonymous"></script>
      <!-- Bootstrap  -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/bootstrap.css">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/owl.carousel.min.css">
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/owl.theme.default.min.css">
      <!-- Magnific Popup -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/magnific-popup.css">
      <!-- Flexslider  -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/flexslider.css">
      <!-- Flaticons  -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/fonts/flaticon/font/flaticon.css">
      <script src="https://js.stripe.com/v3/"></script>

      <script src="https://checkout.stripe.com/checkout.js"></script>

      <!-- Date Picker -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/style.css">
      <link href="<?= base_url() ?>/assets/emenu/redcayne/css/style.css" rel="stylesheet" />
      <link href="<?= base_url() ?>/assets/emenu/redcayne/css/responsive.css" rel="stylesheet" />
      <!-- Modernizr JS -->

      <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js"></script>


      <script src="<?= base_url() ?>/assets/emenu/js/modernizr-2.6.2.min.js"></script>
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/custom.css">
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> -->
      <script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
      <meta name="google-signin-client_id" content="711631038582-tj431nk7at5o7achcliiq91h6adojn43.apps.googleusercontent.com"> 
<script src="<?= base_url() ?>/assets/google_login.js"></script>


      <!-- FOR IE9 below -->
      <!--[if lt IE 9]>

      <script src="<?= base_url() ?>/assets/emenu/redcayne/respond.min.js"></script>


      <![endif]-->
   </head>
   
   <?php require_once './public/config.php';
// require_once APPPATH . '/libraries/config.php';
?>
   <body>
      <style>
.shop-item-title{
   width:76%;
}
             #mapMerchant {
    width: 100%;
    height: 500px;
    position: relative;
}
      *
{
  margin: 0;
  padding: 0;
}

/* height: 200px;
    width: 200px;
    position: fixed;

    top: 50%;
    z-index: 1000;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
    border-radius: 50%;
    background-color: #DDD;
    overflow: hidden;
    animation: background 4s -3.5s infinite;
    box-shadow: 0 8px 25px rgb(0 0 0 / 40%);
} */

#circle_container
{
  height: 200px;
  width: 200px;
  position: fixed;
  /*Centering*/
  top: 50%;
  left: 50%;
  z-index:2;
  transform: translateX(-50%) translateY(-50%);
  
  border-radius: 50%;
  background-color: #DDD;
  overflow: hidden;
  animation: background 4s -3.5s infinite;
  /*Nice modern drop-shadow*/
  box-shadow: 0 8px 25px rgba(0,0,0,0.4);
}

#load_wrapper
{
  height: 300%;
  width: 300%;
  margin-left: -50px;
  transform: translate3d(-25%, 0, 0);
  position: relative;
  animation: rotation 4s linear infinite;
}

#sun, #moon
{
  position: absolute;
  border-radius: 50%;
  /*Make sure they are in the middle*/
  left: 50%;
  transform: translateX(-50%);
}

#sun
{
  width: 80px;
  height: 80px;
  background-color: #FFD475;
  top: 40px;
  box-shadow: 0 0 15px #FFCB57;
}

#moon
{
  width: 50px;
  height: 50px;
  background-color: #EEE;
  top: 450px;
  box-shadow: 0 0 25px rgba(0,0,0,0.2) inset, 0 0 10px white;
}

#stars
{
  /*Has to be more than the amount of layers*/
  perspective: 15px;
	
  width: 100%;
  animation: stars 4s linear infinite;
  opacity: 0.8;
}
#footer_ul > li{
   padding:20px;
}
.star
{
  width: 4px;
  height: 4px;
  background-color: white;
  position: absolute;
  border-radius: 50%;
}

.star_layer
{
  position: absolute;
  width: 200px;
  height: 200px;
  /*This is to make sure the upper-Z layer's don't shift downward*/
  transform-origin: 100px 0;
}

#loading_text
{
  text-align: center;
  z-index: 2;

  font-family: 'Roboto', sans-serif;

  position: fixed;
  top: calc(50% - 135px);
  transform: translateY(-50%);
  width: 100%;
  line-height: 1;
  color: #555;
  font-size: 40px;
}

@keyframes rotation
{
  0% {
    transform: translate3d(-25%, 0, 0) rotate(0deg);
  }
  20% {
    /*Sun goes down*/
    transform: translate3d(-25%, 0, 0) rotate(50deg);
  }
  30% {
    /*Moon rises*/
    transform: translate3d(-25%, 0, 0) rotate(130deg);
  }
  70% {
    /*Moon goes down*/
    transform: translate3d(-25%, 0, 0) rotate(240deg);
  }
  80% {
    /*Sun rises*/
    transform: translate3d(-25%, 0, 0) rotate(310deg);
  }
  100% {
    transform: translate3d(-25%, 0, 0) rotate(360deg);
  }
}

@keyframes background
{
  0% {
    background-color: #2896C3;
  }
  50% {
    /*Night*/
    background-color: #1E5267;
  }
  100% {
    background-color: #2896C3;
  }
}

@keyframes stars
{
  0% {
    /*Invisible, not moving*/
    opacity: 0;
    padding-right: 0;
  }
  25% {
    /*Start of movement*/
    opacity: 0;
    padding-right: 0;
  }
  50% {
    /*Visible*/
    opacity: 1;
    padding-right: 25px;
  }
  75% {
    opacity: 0;
    padding-right: 50px;
  }
  100% {
    opacity: 0;
    padding-right: 0;
  }
}
      #btn-promo{
         background: #f0ad4e;
   color: #fff;
    border: 2px solid #f0ad4e;



      }
.button-component-padding {
    padding-top: 12px;
}
      .button-component {
    height: 48px;
    border-color: #ececec;
    background-color: transparent;
    font-size: 16px;
    color: #ececec;
    border: 2px solid;
    display: inline-flex;
    cursor: pointer;
    overflow: hidden;
    box-sizing: border-box;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 0 12px;
    outline: none;
    white-space: nowrap;
    text-overflow: ellipsis;
    font-weight: 700;
    line-height: 1;

    transition-property: border-color,background-color,color;
    transition-duration: .2s;
    transition-timing-function: ease;
}
      /* .modal-body-promo > {
            margin-top:14px;
            font-weight: bold;
      } */
      .morecontent span {
    display: none;
}
.icon_view{
   position: absolute;
    color: white;
    z-index: 20;
    top: 34px;
    font-size: 23px;
    left: 32px;
}
.morelink {
    display: block;
}
      .property-controls li{
         cursor: pointer;
      }
         /* * {
         background: #000 !important;
         color: #0f0 !important;
         outline: solid #f00 1px !important;
         } */
         *{
            scroll-behavior: smooth;
         }
         .dish-img{
            height: 90px;
         }
         .cd-input{
            width: 229px;
    position: relative;
    margin-top:3px;
    right: 120px;
    border: none;
    border-bottom: 1px solid black;
         }
   
         .btn-header{
	margin-right:10px;border-radius:4px;;padding:2px 5px;	
}
.my-float{
	margin-top:16px;
}

         .row {
         margin-left: 0px; 
         margin-right: 0px;
         }
      </style>
      
      <a id="button">
         <p id="cart-count">0</p>

      </a>
      
      <?php $enquiry = 'Hi is this ' . $shop['shop_name']; ?>
      <a href='https://api.whatsapp.com/send?phone=<?= $shop[
          'contact'
      ] ?>&text=<?= rawurldecode($enquiry) ?>' class="float" target="_blank">
<i class="fa fa-whatsapp my-float"></i>
</a>

<input type="hidden" value="<?= date('D') ?>" id="day">
      <div id="cd-shadow-layer" ></div>
      <div id="cd-cart" >
         <div class="woofc-area-top">
            <span>Shopping Cart / 购物车</span>
            <div class="woofc-close"><i class="fa fa-window-close-o"></i></div>
         </div>
         <ul  style="overflow-y:scroll;height:58vh">
            <div class="cd-cart-items">
            </div>
         </ul>
         <div class="cd-cart-total">
            <div class="subtotal d-flex justify-content-between" >
               <span >SubTotal:</span>
               <span class="cart-total-price" id="cart-subtotal" style="font-weight: bold;"><b>RM 0</b></span>
            </div>
            <div class="subtotal d-flex justify-content-between" >
               <span >Delivery Fee:</span>
               <span id="delivery-fee"><b>RM <?= $shop[
                   'delivery_fee'
               ] ?></b></span>
            </div>
            <div class="subtotal d-flex justify-content-between" >
               <span >Total:</span>
               <span id="grand-total"><b>RM 0</b></span>
            </div>
           

            <a class="checkout-btn closebtn btn-purchase" style="cursor:pointer">Checkout</a>
            <p id="continue-order-text" class="closebtn" style="cursor:pointer">Continue Ordering < </p>
         </div>
         <div class="container">
         </div>
      </div>
      <div id="loaderprocess" style="display: none;">
      
         <h1 id="loading_text">Loading.....</h1> 

               <div id="circle_container">
         <div id="stars"></div>
         <div id="load_wrapper">
            <div id="sun"></div>
            <div id="moon"></div>
            
         </div>
         </div>
      </div>
      
      <input type="hidden" name="" value="<?= base_url() ?>" id="base_url">
      <nav id="piegen-main-nav" role="navigation">
		<a href="#" class="js-piegen-nav-toggle piegen-nav-toggle active"><i></i></a>
		<div class="js-fullheight piegen-table">
			<div class="piegen-table-cell js-fullheight">
				<div class="row">
					<div class="col-md-12 col-md-offset-3" style="margin-left:0%">
						<div class="form-group">
							<input type="text" class="form-control"  onclick="go_to_seach_page()" id="search" placeholder="Enter any key to search...">
							<button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<ul>
						<?php if (session()->get('login_data') != null) { ?>
							<li class=""><a href="<?= base_url() ?>">
							<i class="fa fa-user"></i>
							<?= $_SESSION['login_data']['email'] ?></a></li>

							<?php } ?>
							<li class="active"><a href="<?= base_url() ?>">
							<i class="fa fa-home"></i>
							Home</a></li>
							<li><a href="<?= base_url() ?>/home/restaurants">
							<i class="fa fa-utensils"></i>

							Restaurants</a></li>
					
                     <li><a href="<?= base_url() ?>/home/special">
							<i class="fa fa-utensils"></i>

							Partners </a></li>
							<?php if (session()->get('login_data') == null) { ?>
							<li><a href="<?= base_url() ?>/home/login">
							<i class="fa fa-user"></i>

							Login</a></li>
							<li><a href="<?= base_url() ?>/home/signup">
							<i class="fa fa-user-plus"></i>

							Sign Up</a></li>
							<?php } else { ?>
							<li><a href="<?= base_url() ?>/home/profile">
							<i class="fa fa-users"></i>

							Profile</a></li>
							<li><a href="<?= base_url() ?>/home/order_history">
							<i class="fa fa-history"></i>

							Order History</a></li>
							<li style="cursor:pointer"><a id="logout">
							<i class="fa fa-sign-out-alt"></i>

							Log Out</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
	
    
      <div id="piegen-page">
         <header>
            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <div class="piegen-navbar-brand">
                     <img src="<?= base_url() .
                         '/' .
                         $shop['icon'] ?>" width="100px" alt="">   

                        <a class="piegen-logo">
                        <!-- <i class="flaticon-cutlery"></i> -->
                        <span><?= $shop['shop_name'] ?></span></a>
                        <input type="hidden" id="shop_id" value="<?= $shop[
                            'shop_id'
                        ] ?>">

                     </div>
                     <a href="#" class="js-piegen-nav-toggle piegen-nav-toggle"><i></i></a>
                     <a href="<?= base_url() ?>/home/signup/<?= $shop[
    'slug'
] ?>" class="piegen-nav-toggle btn-primary text-white btn-header" >Register</a>
						<a href="<?= base_url() ?>/home" class="piegen-nav-toggle btn-primary text-white btn-header" >Explore More</a>

                     <div id="logo"></div>
                     <!-- <div id="cd-hamburger-menu"><a class="cd-img-replace" href="#0">Menu</a></div> -->
                     <!-- <div id="cd-cart-trigger"><a class="cd-img-replace" href="#0">Cart</a></div> -->
                  </div>
               </div>
            </div>
         </header>
        
         <aside id="piegen-hero">
            <div class="flexslider">
         
               <ul class="slides">
                  <?php foreach ($banner as $row) { ?>
                  <li style="background-image: url(<?= base_url() .
                      $row['banner'] ?>">
                     <div class="overlay"></div>
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
                              <div class="slider-text-inner text-center">
                                 <div class="desc">
                                    <span class="icon"><i class="flaticon-cutlery"></i></span>
                                    <h1><?= $row['title'] ?></h1>
                                    <p><?= $row['description'] ?></p>
                                    <!-- <p><a href="#" class="btn btn-primary btn-lg btn-learn">Order Now</a></p> -->
                                    <div class="desc2"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <?php } ?>
                  <!-- <li style="background-image: url(<?= base_url() ?>/assets/emenu/images/img_bg_2.jpg);">
                     <div class="overlay"></div>
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
                              <div class="slider-text-inner text-center">
                                 <div class="desc">
                                    <span class="icon"><i class="flaticon-cutlery"></i></span>
                                    <h1>Exquisite Dishes From Chef</h1>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p><a href="#" class="btn btn-primary btn-lg btn-learn">Order Now</a></p>
                                    <div class="desc2"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li style="background-image: url(<?= base_url() ?>/assets/emenu/images/img_bg_3.jpg);">
                     <div class="overlay"></div>
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
                              <div class="slider-text-inner text-center">
                                 <div class="desc">
                                    <span class="icon"><i class="flaticon-cutlery"></i></span>
                                    <h1>We are Delicious Restaurant</h1>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p><a href="#" class="btn btn-primary btn-lg btn-learn">Order Now</a></p>
                                    <div class="desc2"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li>
                  <li style="background-image: url(<?= base_url() ?>/assets/emenu/images/img_bg_4.jpg);">
                     <div class="overlay"></div>
                     <div class="container-fluid">
                        <div class="row">
                           <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 slider-text">
                              <div class="slider-text-inner text-center">
                                 <div class="desc">
                                    <span class="icon"><i class="flaticon-cutlery"></i></span>
                                    <h1>Order Now here in our site</h1>
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                    <p><a href="#" class="btn btn-primary btn-lg btn-learn">Order Now</a></p>
                                    <div class="desc2"></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </li> -->
               </ul>
               <div class="mouse">
                  <a href="#" class="mouse-icon">
                     <div class="mouse-wheel"></div>
                  </a>
               </div>
            </div>
         </aside>
         <div class="goto-here"></div>
         <?php if (!empty($about)) { ?>

         <div class="piegen-about" class="piegen-light-grey">
            <div class="container">
               <div class="row">
                  <div class="col-md-5">
                     <div class="row">
                        <div class="about-desc">
                           <div class="col-md-12 col-md-offset-0 animate-box intro-heading">
                              <span>Welcome to <?= $shop['shop_name'] ?></span>
                              <h2><?= $about['title'] ?></h2>
                           </div>
                           <div class="col-md-12 animate-box">
                              <p><?= $about['description'] ?></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-12 animate-box">
                           <div class="about-img" style="background-image: url(<?= base_url() .
                               $about['banner'] ?>);">
                           </div>
                        </div>
                        <!-- <div class="col-md-6 animate-box">
                           <div class="about-img about-img-2" style="background-image: url(<?= base_url() ?>/assets/emenu/images/about-2.jpg);">
                           </div>
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>

         <!-- <div class="piegen-menu">
            <div class="container">
            	<div class="row">
            		<div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
            			<span class="icon"><i class="flaticon-cutlery"></i></span>
            			<h2>Our Delicious Specialties</h2>
            			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-4 animate-box">
            			<div class="dish-wrap">
            				<div class="wrap">
            					<div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/dish-1.jpg);"></div>
            					<div class="desc">
            						<h2><a href="#">Luto Strawberry Dish</a></h2>
            					</div>
            				</div>
            			</div>
            		</div>
            		<div class="col-md-4 animate-box">
            
            			<div class="dish-wrap">
            				<div class="wrap">
            					<div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/dish-2.jpg);"></div>
            					<div class="desc">
            						<h2><a href="#">Pizza with strawberries</a></h2>
            					</div>
            				</div>
            			</div>
            		</div>
            		<div class="col-md-4 animate-box">
            			<div class="dish-wrap">
            				<div class="wrap">
            					<div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/dish-3.jpg);"></div>
            					<div class="desc">
            						<h2><a href="#">Luto Grilled Beef</a></h2>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            </div> -->
         <!-- <div class="piegen-introduction" style="background-image: url(<?= base_url() ?>/assets/emenu/images/cover_bg_1.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
            	<div class="row">
            		<div class="col-md-6 col-md-offset-3 col-md-push-3">
            			<div class="intro-box animate-box">
            				<h2><a href="#"></a>Foods you love to taste</h2>
            				<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
            				<p><a href="https://vimeo.com/channels/staffpicks/93951774" class="btn btn-primary btn-lg btn-outline popup-vimeo"><i class="icon-play3"></i> Watch Video</a></p>
            			</div>
            		</div>
            	</div>
            </div>
            </div> -->

         <!-- <div class="piegen-menu">
            <div class="container">
            
            	<div class="row">
            		<div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
            			<span class="icon"><i class="flaticon-cutlery"></i></span>
            			<h2>Our Delicious Specialties</h2>
            			<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
            		</div>
            	</div>
            	<div class="row">
            		<div class="col-md-4 animate-box">
            			<div class="dish-wrap">
            				<div class="wrap">
            					<div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/dish-1.jpg);"></div>
            					<div class="desc">
            						<h2><a href="#">Luto Strawberry Dish</a></h2>
            					</div>
            				</div>
            			</div>
            		</div>
            		<div class="col-md-4 animate-box">
            			<div class="dish-wrap">
            				<div class="wrap">
            					<div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/dish-2.jpg);"></div>
            					<div class="desc">
            						<h2><a href="#">Pizza with strawberries</a></h2>
            					</div>
            				</div>
            			</div>
            		</div>
            		<div class="col-md-4 animate-box">
            			<div class="dish-wrap">
            				<div class="wrap">
            					<div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/dish-3.jpg);"></div>
            					<div class="desc">
            						<h2><a href="#">Luto Grilled Beef</a></h2>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            </div>
            </div> -->
         <div class="piegen-testimony" style="background-image: url(<?= base_url() ?>/assets/emenu/images/cover_bg_2.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <!-- <div class="container">
               <div class="row">
               	<div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
               		<h2>Our Customer Says</h2>
               	</div>
               </div>
               <div class="row animate-box">
               	<div class="owl-carousel">
               		<div class="item">
               			<div class="col-md-8 col-md-offset-2 text-center">
               				<div class="testimony">
               					<blockquote>
               						<p>"A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
               						<span>" &mdash; George Brooks</span>
               					</blockquote>
               				</div>
               			</div>
               		</div>
               		<div class="item">
               			<div class="col-md-8 col-md-offset-2 text-center">
               				<div class="testimony">
               					<blockquote>
               						<p>"Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
               						<span>" &mdash; Daniel Foster</span>
               					</blockquote>
               				</div>
               			</div>
               		</div>
               		<div class="item">
               			<div class="col-md-8 col-md-offset-2 text-center">
               				<div class="testimony">
               					<blockquote>
               						<p>"When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove</p>
               						<span>" &mdash; Liam Jenkins</span>
               					</blockquote>
               				</div>
               			</div>
               		</div>
               	</div>
               </div>
               </div> -->
         </div>
         <div class="piegen-menu" id="mains_order">

            <div class="container">
               <div class="piegen-menu-2">
                  <div class="row">
                     <div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
                        <span class="icon"><i class="flaticon-cutlery"></i></span>
                        <h2><?= $shop['shop_name'] ?> Menu</h2>
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 animate-box">
                        <div class="row">
                           <div class="col-md-12 text-center property-controls">
                           <ul class="nav nav-tabs text-center" >
                                 <li data-filter="all" class="active"><a>All</a></li>
                                 <?php foreach ($category as $key => $row) { ?>
                                 <li role="presentation" data-filter=".category<?= strtolower(
                                     $row['category_id']
                                 ) ?>"> <a><?= $row['category'] ?></a> </li>
                           


                                
                                 <?php } ?>
                               </ul>
                           </div>
                        </div>
                        <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" >
                                 <div class="row property-filter">
                                    <?php foreach ($product as $row) { ?>
                                    <div class="col-md-6 mix all <?= str_replace(
                                        ',',
                                        ' ',
                                        'category' .
                                            strtolower($row['category_id'])
                                    ) ?> drinks">
                                       <ul class="menu-dish">
                                          <li>
                                             <figure class="dish-entry">
                                             <a href="<?= base_url() .
                                                 $row[
                                                     'image'
                                                 ] ?>" class="fancybox" data-fancybox="images">
                                             <i class="fa fa-eye text-white fa-2x icon_view hvr-glow"></i>
                                                <img src="<?= base_url() .
                                                    $row[
                                                        'image'
                                                    ] ?> " class="dish-img shop-item-image" alt="" data-fancybox data-ratio="2">
                                                </a>

                                             </figure>

                                             <div class="text shop-item-details">
                                             <?php if (
                                                 $row['is_promo'] == 1
                                             ) { ?>
                                             <span class="shop-item-price-old" style="
  text-decoration: line-through;
                                             float: right;
    position: relative;
    bottom: -32px;">RM<?= round($row['product_price'], 2) ?></span>

                                                <span class="price shop-item-price">RM<?= round(
                                                    $row['promo_price'],
                                                    2
                                                ) ?></span>

                                             <?php } else { ?>
                                                <span class="price shop-item-price">RM<?= round(
                                                    $row['product_price'],
                                                    2
                                                ) ?></span>
                                             <?php } ?>
                                                <h3 class="shop-item-title"><?= $row[
                                                    'product_name'
                                                ] ?></h3>
                                                <p class="cat more"><?= $row[
                                                    'product_description'
                                                ] ?></p>
                                                <div class="media-body">

                                                   <!-- <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button> -->
                                                   <span class="item-cart-count-container">
                                                      <p class="item-cart-count" id="cart-count<?= $row[
                                                          'product_id'
                                                      ] ?>">0</p>
                                                      <p class="item-id" id="<?= $row[
                                                          'product_id'
                                                      ] ?>" style="display: none;"><?= $row[
    'product_id'
] ?></p>
                                                   </span>
                                                   <?php if (
                                                       $row['is_active'] == 1
                                                   ) { ?>
                                                   <button class="add-to-cart read_mor_btn shop-item-button" id="<?= $row[
                                                       'product_id'
                                                   ] ?>" type="button">
                                                      <div class="default">Order</div>
                                                      <div class="success"><i class="fa fa-check"></i></div>
                                                      <div class="cart">
                                                         <div>
                                                            <div></div>
                                                            <div></div>
                                                         </div>
                                                      </div>
                                                      <div class="dots"></div>
                                                   </button>
                                                   <?php } else { ?>

                                                   <button class="add-to-cart read_mor_btn shop-item-button" disabled id="<?= $row[
                                                       'product_id'
                                                   ] ?>" type="button">
                                                      <div class="default"><i class="fa fa-times"></i></div>
                                                      <div class="success"><i class="fa fa-check"></i></div>
                                                      <div class="cart">
                                                         <div>
                                                            <div></div>
                                                            <div></div>
                                                         </div>
                                                      </div>
                                                      <div class="dots"></div>
                                                   </button>
                                                   <?php } ?>
                                                </div>
                                             </div>
                                          </li>

                                          
                                          
                                       </ul>
                                    </div>
                                    <?php } ?>
                                    </div>


                                    </div>

                                 </div>
                              </div>
                           
                           <!-- <div role="tabpanel" class="tab-pane" id="drinks">
                              <div class="row">
                                 <div class="col-md-6">
                                    <ul class="menu-dish">
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-1.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM25.99</span>
                                             <h3 class="shop-item-title">Cold Lemonade Juice</h3>
                                             <p class="cat">Meat / Potatoes / Rice / Tomatoe</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-2.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM30.99</span>
                                             <h3 class="shop-item-title">May Wine</h3>
                                             <p class="cat">Tuna / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-3.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM40.00</span>
                                             <h3 class="shop-item-title">Ice tea juice</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-4.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM20.50</span>
                                             <h3 class="shop-item-title">Orange Juice</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-5.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM20.50</span>
                                             <h3 class="shop-item-title">Fresh Fruits Juice</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-6.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM20.50</span>
                                             <h3 class="shop-item-title">Coconut Juice</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                                 <div class="col-md-6">
                                    <ul class="menu-dish">
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-7.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM25.99</span>
                                             <h3 class="shop-item-title">Mango Juice</h3>
                                             <p class="cat">Meat / Potatoes / Rice / Tomatoe</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-8.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM30.99</span>
                                             <h3 class="shop-item-title">Lemon Juice</h3>
                                             <p class="cat">Tuna / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-9.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM40.00</span>
                                             <h3 class="shop-item-title">Softdrinks Coke</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-10.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM20.50</span>
                                             <h3 class="shop-item-title">Softdrinks Pepsi</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-11.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM20.50</span>
                                             <h3 class="shop-item-title">Can Juice</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                       <li>
                                          <figure class="dish-entry">
                                             <div class="dish-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/drink-12.jpg);"></div>
                                          </figure>
                                          <div class="text">
                                             <span class="price shop-item-price">RM20.50</span>
                                             <h3 class="shop-item-title">Choco Juice</h3>
                                             <p class="cat">Crab / Potatoes / Rice</p>
                                             <div class="media-body">
                                                <button class="read_mor_btn shop-item-button" type="button">Add To Cart</button>
                                             </div>
                                          </div>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                           </div> -->
                        </div>
                     </div>
                     <!-- <div class="col-md-12 animate-box text-center">
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost</p>
                        <p><a href="#" class="btn btn-primary btn-outline btn-md">Order Now</a></p>
                     </div> -->
                  </div>
               </div>
            </div>
         </div>
         <div class="piegen-reservation reservation-img" style="background-image: url(<?= base_url() ?>/assets/emenu/images/cover_bg_2.jpg);" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
               <!-- <div class="row">
                  <div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
                     <h2>Order Now</h2>
                     <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
                  </div>
               </div> -->
               <input type="hidden" value="<?= isset($_SESSION['login_id'])
                   ? $_SESSION['login_id']
                   : '0' ?>" id="customer_id">
               <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                     <div class="row">
                        <div class="col-md-12">
                           <form method="post" class="piegen-form">
                              <div class="row">
                                 <div class="col-md-12 animate-box">
                                    <div class="form-group">
                                       <label for="name">Name</label>
                                       <div class="form-field">
                                          <input type="text" class="form-control" id="name" placeholder="Your Full Name" value="<?= isset(
                                              $_SESSION['login_data']
                                          )
                                              ? $_SESSION['login_data']['name']
                                              : '' ?>">
                                          <label class="small text-danger d-none" id="lbl_name" style="display: none;">Please enter your full name</label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 animate-box">
                                    <div class="form-group">
                                       <label for="phone">Contact</label>
                                       <div class="form-field">
                                          <input type="text" class="form-control" id="contact" value="<?= isset(
                                              $_SESSION['login_data']
                                          )
                                              ? $_SESSION['login_data'][
                                                  'contact'
                                              ]
                                              : '' ?>" placeholder="012-123 1234">
                                          <label class="small text-danger d-none" id="lbl_contact"  style="display: none;">Please enter your contact</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-12 animate-box">
                                    <div class="form-group">
                                       <label for="email">Email</label>
                                       <div class="form-field">
                                          <input type="text" class="form-control" id="email" value="<?= isset(
                                              $_SESSION['login_data']
                                          )
                                              ? $_SESSION['login_data']['email']
                                              : '' ?>" placeholder="Optional">
                                       </div>
                                       <label for="email">If you enter your email , the receipt of the order will also sent to your email for your record use</label>

                                    </div>
                                 </div>
                                 <h2 class="text-white text-center" style="color:white"><?= $shop[
                                     'is_delivery'
                                 ] == 1
                                     ? 'Delivery'
                                     : 'Selft Pick Up' ?> Date & Time</h2>
                                <input type="hidden" value="0" id="is_preorder">
                                 <div class="col-md-6 animate-box">
                                    <div class="form-group">
                                       <label for="date">Date:</label>
                                       <div class="form-field">
                                          <i class="icon icon-calendar2"></i>

                                          <input type="text" id="date" class="form-control date"  placeholder="Date">
                                          <label class="small text-danger d-none" id="lbl_delivery_date" style="display: none;">Please enter your delivery date</label>

                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-6 animate-box">

                                    <div class="form-group">
                                       <label for="time">Time</label>
                                       <input placeholder="Selected time" type="text" id="deliverytime" class="form-control timepicker">
                                       <label class="small text-danger d-none" id="lbl_delivery_time" style="display: none;">Please enter your delivery time</label>

                                       <div class="form-field">
                                      
                                       </div>



                                    </div>
                                 </div>
                                 <p  id="lbl_preorder" class="text-center text-white" style="color:white;font-size:20px;font-weight:bold;display:none;">Preorder</p>
                                 <label>If the order time is 1 hour - 2 hour from current time , system will cosider the order as a preorder.</label>
                                 <h2 class="text-white text-center" style="color:white">Shipping Address|送货地址</h2>
                                 <div class="col-md-12 animate-box">
                                    <div class="radio-tile-group">
                                       <?php
                                       if ($shop['is_delivery'] == 1) { ?>
                                       <div class="input-container">
                                          <input id="delivery" class="radio-button" type="radio" name="radio" />
                                          <div class="radio-tile">
                                             <div class="icon walk-icon">
                                                <i class="fa fa-bicycle fa-2x"></i>
                                             </div>
                                             <label for="walk" class="radio-tile-label">Delivery</label>

                                          </div>
                                       </div>
                                       <?php }
                                       if ($shop['is_self_pickup'] == 1) { ?>
                                       <div class="input-container">
                                          <input id="pickup" class="radio-button" type="radio" name="radio" />
                                          <div class="radio-tile">
                                             <div class="icon bike-icon">
                                                <i class="fa fa-map-pin fa-2x"></i>
                                             </div>
                                             <label for="bike" class="radio-tile-label">Self Pick Up</label>
                                          </div>
                                       </div>
                                       <?php }
                                       ?>
                                    </div>
                                 </div>
                                 <!-- Listing Maps -->
                                 <!-- <div id= "pslider">
                                    <div id="map" style="width:100%; height:100%;"></div> -->
                              </div>
                              <div class="col-md-12 animate-box" id="deliveryaddress">
                                 <div class="form-group">
                                    <label for="email">Your Address</label>
                                    <div class="form-field">
                                       <textarea class="form-control" id="address" placeholder="Enter your address"><?= isset(
                                           $_SESSION['login_data']
                                       )
                                           ? $_SESSION['login_data']['address']
                                           : '' ?></textarea>
                                       <label class="small text-danger d-none" id="lbl_address" style="display: none;">Please enter your address</label>


                                    </div>
                                    <label for="">Your distance to the shop is <span class="distance"></span></label>
                                    <label>If your address is not on the map , please enter a similar location , so that google map can identify the correct distance</label>
                                    <label for="" style="visibility: <?= isset(
                                        $_SESSION['login_data']
                                    )
                                        ? 'show'
                                        : 'hidden' ?>;">Map url = <a target="_blank" id="url" href="<?= isset(
    $_SESSION['login_data']
)
    ? $_SESSION['login_data']['url']
    : '' ?>"><?= isset($_SESSION['login_data'])
    ? $_SESSION['login_data']['url']
    : '' ?></a></label>
                                 </div>
                                 <div id="map">
                                 </div>
                              </div>
                              <div class="col-md-12 animate-box" id="pickupaddress">
                                 <div class="form-group">
                                    <label for="email">Merchant Address</label>
                                    <label for="" class="overflow:auto;d-block" style="display: block;" >
                                       <a target="_blank" href="<?= $shop[
                                           'url'
                                       ] ?>"><?= $shop['url'] ?></a>
                                    </label>
                                    <div class="form-field">
                                       <a href="<?= $shop[
                                           'url'
                                       ] ?>" target="_blank">

                                          <textarea  class="form-control" readonly placeholder="Optional" id="merchant_address"><?= $shop[
                                              'address'
                                          ] ?>
                                       </textarea> 
                                    </a>

                                    </div>
                                 </div>
                                 <div id="mapMerchant">
                                 </div>
                              </div>
                              <!-- <div class="col-md-12 animate-box">
                                 <div class="row">
                                    <div class="col-md-4 col-md-offset-4">
                                       <input type="submit" name="submit" id="submit" value="Order Now" class="btn btn-primary btn-block">
                                    </div>
                                 </div>
                              </div> -->
                              <!-- <div class="option-group">
                                 <div class="option-container">
                                  
                                   <input class="option-input" checked id="option-1" type="radio" name="options" />
                                   <input class="option-input" id="option-2" type="radio" name="options" />
                                   
                                   <label class="option" for="option-1">
                                 	<span class="option__indicator"></span>
                                 	<span class="option__label " style="color:black">
                                 	  1<sub>gb</sub>
                                 	</span>
                                   </label>
                                  
                                   <label class="option" for="option-2">
                                 	<span class="option__indicator"></span>
                                 	<span class="option__label">
                                 	  5<sub>gb</sub>
                                 	</span>
                                   </label>
                                  
                                 </div>
                                  </div> -->
                        </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="total-section container piegen-reservation" >
         <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center animate-box intro-heading">
               <span class="icon"><i class="flaticon-cutlery"></i></span>
               <h2 style="color:black">Total</h2>
            </div>
         </div>
         <div class="row mt-5 pt-3 container">
            <div class="col-md-6 ">
               <div class="cart-detail cart-total bg-light p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Cart Total</h3>
                  <p class="d-flex">
                     <span>Subtotal</span>
                     <span  id="cart-subtotal2">RM 0</span>
                  </p>
                  <p class="d-flex">
                     <span>Delivery Fee</span>
                     <span id="delivery-fee2">RM <?= $shop[
                         'delivery_fee'
                     ] ?></span>
                  </p>
                  <p class="d-flex">
                     <span>Discount</span>
                     <span id="discount">RM 0</span>
                  </p>
                  <p class="d-flex">
                     <span>Distance</span>
                     <span class="distance" id="distance_below"></span>
                  </p>
                  <hr>
                  <p class="d-flex total-price">
                     <span>Total</span>
                     <span id="grand-total2">RM 0</span>
                  </p>

                  <div class="d-flex justify-content-between" >
               <input type="text" class="form-control" placeholder="Enter Promo code here" name="promo" id="promo-code">
               <button id="btn-promo">Apply Promocode</button>
               <input type="hidden" value="0" id="promo_id">
            </div>
               </div>
            </div>
           
           

         
            <div class="col-md-6">
               <div class="cart-detail bg-light p-3 p-md-4">
                  <h3 class="billing-heading mb-4">Payment Method</h3>

                  <?php foreach ($payment_method as $row) { ?>
                  <div class="form-group" style="margin-top: 12px;">
                     <div class="col-md-12">
                        <div class="radio">
                        <?php if (
                            in_array(
                                $row['payment_method_id'],
                                $shop_payment_method
                            )
                        ) { ?>
                           <label><input type="radio" class="paymentmethod" name="optradio" id="payment_method_<?= $row[
                               'payment_method_id'
                           ] ?>" class="mr-2"> 
                           <?= $row['payment_method'] ?>
                           </label>
                        <?php } ?>
                        </div>
                     </div>
                  </div>

                  <?php } ?>
            
            <form action="<?= base_url() ?>/Ajax/stripe_payment"  method="post" style="display: none;" id="stripe_form">
            <!-- <form action="submit.php" method="post"> -->
               <input type="text" name="name" id="f_name">
               <input type="text" name="f_stripe_total"  id="f_stripe_total">

               <input type="text" name="contact"  id="f_contact">
               <input type="text" name="email"  id="f_email">
               <input type="text" name="delivery_date"  id="f_delivery_date">
               <input type="text" name="delivery_time"  id="f_delivery_time">
               <input type="text" name="delivery_option"  id="f_delivery_option">
               <input type="text" name="payment_method_id"  id="f_payment_method_id">
               <input type="text" name="delivery_address"  id="f_delivery_address">
               <input type="text" name="delivery_fee"  id="f_delivery_fee">
               <input type="text" name="subtotal" value="" id="f_subtotal">
               <input type="text" name="shop_id"  id="f_shop_id">
               <input type="text" name="product"  id="f_product">
               <input type="text" name="grand_total"  id="f_grand_total">
               <input type="text" name="url"  id="f_url">
               <input type="text" name="is_preorder"  id="f_preorder">
               <input type="text" name="promo_id"  id="f_promo_id">
               <input type="text" name="customer_id"  id="f_customer_idgi">



               <script
                  src="https://checkout.stripe.com/checkout.js"
                  id="stripe_checkout_js"
                   class="stripe-button" style="visibility: hidden;" 
                  data-key="<?php echo $publishableKey; ?>"
                  data-amount
                  data-name="<?= $shop['merchant_name'] ?>"
                  data-description="<?= $shop['shop_name'] ?> Orders"
                  data-image="<?= base_url() . $shop['image'] ?>"
                  data-currency="myr"
                  data-email="<?= $shop['email'] ?>"
               >
               </script>
                <script>
        // Hide default stripe button, be careful there if you
        // have more than 1 button of that class
        document.getElementsByClassName("stripe-button-el")[0].style.display = 'none';
    </script>

            
        <button type="submit" id="btn-submit-stripe">Buy my things</button>
            </form>

                  
                  <label class="small text-danger d-none" id="lbl_payment_method" style="display: none;">Please select your payment method</label>

                  <!-- <div class="form-group">
                     <div class="col-md-12">
                     <div class="checkbox">

                           <label><input type="checkbox" value="" class="mr-2"> I have read and accept the terms and conditions</label>
                        </div>
                     </div>
                  </div> -->

                  <p><button  style="margin-top: 20px;" id="btn-purchase-now" class="btn btn-primary py-3 px-4 btn-purchase">Place an order</button></p>
               </div>
            </div>
         </div>
      </div>
    
<?php if (!empty($announcement)) { ?>
<div class="modal" id="modal-notice" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content" style="height:60vh;background-size:100% 100%;background-repeat:no-repeat;background-image: url('<?= base_url() .
        $announcement['banner'] ?>');">
      <div class="modal-header">

        <h5 class="modal-title">Promotion</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body-promo text-center">
         <div style="margin-top:20%">
         
            <h4 class="" style="margin-top: 14px;"><?= $announcement[
                'title'
            ] ?></h4>
            <div class="container-item" style="margin-top: 14px;"><div class="button-component-padding"><div class="button-component">View Menu</div></div></div>
            <p style="margin-top: 14px;color:black"><?= $announcement[
                'description'
            ] ?></p>
         </div>


      </div>
    </div>
  </div>
</div>
<?php } ?>


      <div class="piegen-intro">
         <div class="container">
            <div class="row">
               <div class="col-md-3 col-sm-6 text-center">
                  <div class="intro animate-box">
                     <span class="icon">
                     <i class="icon-map4"></i>
                     </span>
                     <h2>Address</h2>
                     
                     <p>
                        <a target="_blank" href="<?= $shop['url'] ?>"><?= $shop[
    'address'
] ?></a>
                        
                  
                  
                  </p>
                  </div>
               </div>
               <div class="col-md-3 col-sm-6 text-center">
                  <div class="intro animate-box">
                     <span class="icon">
                     <i class="icon-clock4"></i>
                     </span>
                     <h2>Opening Time</h2>
                     <ul>
                        <?php foreach ($shop_operating_hour as $row) { ?>
                           <li style="color:white"><?= $row[
                               'day'
                           ] ?> | <?= $row['open_at'] ?> - <?= $row[
     'closed_at'
 ] ?></li>
                        <?php } ?>
                     </ul>
                  </div>
               </div>

               <div class="col-md-3 col-sm-6 text-center">
                  <div class="intro animate-box">
                     <span class="icon">
                     <i class="icon-mobile2"></i>
                     </span>
                     <h2>Phone</h2>
                     <p>
                     <a href="tel:<?= $shop['contact'] ?>"><?= $shop[
    'contact'
] ?>
                     </a>
                  </p>
                  </div>
               </div>
               
               <div class="col-md-3 col-sm-6 text-center">
                  <div class="intro animate-box">
                     <span class="icon">
                     <i class="icon-envelope"></i>
                     </span>
                     <h2>Email</h2>
                     <p>
                     <a target="_blank" href="mailto:<?= $shop[
                         'email'
                     ] ?>"><?= $shop['email'] ?>
                  </a>
                  </p>
                  </div>
               </div>
               <div class="col-md-12 col-sm-6 text-center">
                  <div class="intro animate-box">
                     <span class="icon">
                     <i class="fa fa-heart"></i>
                     </span>
                     <h2>Get Social With Us</h2>
                     <ul style="padding: 0;
    text-align: center;
    list-style: none;
    display: flex;
    justify-content: center;
    margin: 20px;" id="footer_ul">
                
                                    <!--    <li><a href="#"><i class="fa fa-whatsapp"></i></a></li> -->
                            <li><a href="<?= $shop[
                                'facebook'
                            ] ?>"><i class="fa fa-facebook fa-2x"></i></a></li>

                            <li><a href="<?= $shop[
                                'insta'
                            ] ?>"><i class="fa fa-instagram fa-2x"></i></a></li>
                         
                          

                        </ul>
                  </div>
               </div>

            </div>
         </div>
      </div>
      </div>
      
      <div id="cd-shadow-layer" ></div>
      <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body" id="product_detail">
      
        
      </div>
      
    </div>
  </div>
</div>
      <!-- jQuery -->
      <script src="<?= base_url() ?>/assets/emenu/js/jquery.min.js"></script>
      <!-- jQuery Easing -->
      <script src="<?= base_url() ?>/assets/emenu/js/jquery.magnific-popup.min.js"></script>
      <script src="<?= base_url() ?>/assets/emenu/js/bootstrap.min.js"></script>
      <script src="<?= base_url() ?>/assets/emenu/js/main.js"></script>
      <link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>
      <script src="<?= base_url() ?>/assets/emenu/js/jquery.easing.1.3.js"></script>
      <!-- Bootstrap -->
      <!-- Waypoints -->
      <script src="<?= base_url() ?>/assets/emenu/js/jquery.waypoints.min.js"></script>
      <!-- Parallax -->
      <script src="<?= base_url() ?>/assets/emenu/js/jquery.stellar.min.js"></script>
      <!-- Owl Carousel -->
      <script src="<?= base_url() ?>/assets/emenu/js/owl.carousel.min.js"></script>
      <!-- Magnific Popup -->
      <script src="<?= base_url() ?>/assets/emenu/js/magnific-popup-options.js"></script>
      <!-- Flexslider -->
      <script src="<?= base_url() ?>/assets/emenu/js/moment.js"></script>


      <script src="<?= base_url() ?>/assets/emenu/js/jquery.flexslider-min.js"></script>
      <!-- Date Picker -->
      <script src="<?= base_url() . '/assets/' ?>js/mixitup.min.js"></script>
      <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

      <script src="<?= base_url() ?>/assets/emenu/js/bootstrap-datepicker.js"></script>
      <script src="<?= base_url() ?>/assets/emenu/js/storepromoo2.js"></script>
      <script>
     function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
     //   window.location="adminLogin.php";
    });
    
    auth2.disconnect();
}
     $("#logout").on('click', function(){
        signOut();
        location.href= "<?= base_url() ?>/home/logout";
    });

    function onLoad() {
      gapi.load('auth2', function() {
        gapi.auth2.init();
      });
    }
    onLoad();
    </script>
      <script>

         
         $(document).ready(function() {

            <?php if ($shop['is_active'] == 0) { ?>
               Swal.fire({
                    title: "Dear Customer",
                    text: "We would like to inform you that <?= $shop[
                        'shop_name'
                    ] ?> are temporarily closed",
                    type: 'info'
                })

            <?php } ?>

            <?php if (isset($_SESSION['login_data'])) { ?>
            let lat = "<?= $_SESSION['login_data']['lat'] ?>";
               let lng = "<?= $_SESSION['login_data']['lng'] ?>";

               let distance = getDistanceFromLatLonInKm(<?= $shop[
                   'lat'
               ] ?>,<?= $shop['lng'] ?>,lat,lng);

               $('.distance').text(distance.toFixed(2) + " KM");
               calculate_delivery_fee(distance);
            
               // $('#url').text(url);
               // $('#url').taext(url);

               $("#url").attr("href", url);
               

            <?php } ?>
            $('.date').datepicker({
       todayBtn: "linked",
       language: "it",
       autoclose: true,
       todayHighlight: true,
       format: 'dd/mm/yyyy'
   });
            $("a.fancybox").fancybox({
               'transitionIn'  :   'elastic',
        'transitionOut' :   'elastic',
        'speedIn'   :   600, 
        'speedOut'  :   200, 
        'overlayShow'   :   false,
        'cyclic'    :   true,
        'showNavArrows' :   true
            });
    // Configure/customize these variables.
    var showChar = 80;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Read more >";
    var lesstext = "Read less";
    
   
    $('.more').each(function() {
        var content = $(this).html();
 
        
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span style="font-size:14px" class="moreellipses">' + ellipsestext+ '&nbsp;</span><span style="font-size:14px" class="morecontent"><span style="font-size:14px">' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }

 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
         $(".heart").on('click touchstart', function(){
            
           $(this).toggleClass('is_animating');

         });
         
         <?php if (!empty($announcement)) { ?>

         $('#modal-notice').modal('show'); 
         <?php } ?>


         
         /*when the animation is over, remove the class*/
         $(".heart").on('animationend', function(){
            $(this).toggleClass('is_animating');
         });

         
         $(document).ready(function(){
            $('.property-controls li').on('click', function () {
            $('.property-controls li').removeClass('active');
            $(this).addClass('active');
        });

            
            if ($('.property-filter').length > 0) {
            var containerEl = document.querySelector('.property-filter');
            var mixer = mixitup(containerEl);
        }
            // var handler = StripeCheckout.configure({
            // key: '<?php echo 'publishableKey'; ?>',
            // image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
            // token: function(token) {
            //    $("#stripeToken").val(token.id);
            //    $("#stripeEmail").val(token.email);
            //    $("#f_grand_total").val(Math.floor($("#f_grand_total").val() * 100));
            //    $("#stripe_form").submit();
            // }
            // });

            // $('#btn-submit-stripe').on('click', function(e) {
               
            // var amountInCents = Math.floor($("#f_grand_total").val() * 100);
            // var displayAmount = parseFloat(Math.floor($("#f_grand_total").val() * 100) / 100).toFixed(2);
            // // Open Checkout with further options
            // handler.open({
            //    name: 'Demo Site',
            //    description: 'Custom amount ($' + displayAmount + ')',
            //    amount: amountInCents,
               
            // });
            // e.preventDefault();
            // });
          
         
         
            document.querySelectorAll('.add-to-cart').forEach(button => {
         
         button.addEventListener('click', e => {
         
         button.classList.toggle('added');
         setTimeout(()=>{
         button.classList.remove('added');
         
         },4000);
         
         });
         
         });
         	$('#cd-shadow-layer, .woofc-close , .closebtn , .read_mor_btn').on('click', function(){
         	
               
         	closeSideCart();
         });
         
         var btn = $('#button');
         

         // $(window).scroll(function() {
         //   if ($(window).scrollTop() > 300) {
         //     btn.addClass('show');
         //   } else {
         //     btn.removeClass('show');
         //   }
         // });
         
         btn.on('click', function(e) {
         e.preventDefault();
         openSideCart();
         });
         
         
         // $('.read_mor_btn').on('click', function(){
         	
         // 	openSideCart();
         // });
         
         function openSideCart	(){
         	 
         	 $('#cd-cart').addClass('speed-in');
         
         $('#cd-shadow-layer').addClass('is-visible');
         
         
          }
         
         	
         	function closeSideCart(){
         	 
         		$('#cd-cart').removeClass('speed-in');
         
         $('#cd-shadow-layer').removeClass('is-visible');
         
         
            }
            
         
         	$("#deliveryaddress").slideUp();
         		$("#pickupaddress").slideUp();
         		// $("#cd-cart").slideRight();
         
         		// $('#cd-cart').animate({"left": '+=200'});
               <?php if ($shop['is_delivery'] == 1) { ?>

               $('#delivery').click();
            $("#deliveryaddress").slideDown();
            <?php } elseif ($shop['is_self_pickup'] == 1) { ?>
               $('#pickup').click();
            $("#pickupaddress").slideDown();
               <?php } ?>
         
         $('#deliverytime').timepicker();
         	$("#delivery").click(function(){
               
         
         		$("#deliveryaddress").slideDown();
         		$("#pickupaddress").slideUp();
               let distance = $('#distance_below').text().replace('KM','');

               calculate_delivery_fee(distance);

         	});
         	$("#pickup").click(function(){
         		// $("#cd-cart").slideLeft();
         
               
         		// $('#cd-cart').animate({"left": '+=200'});
    // console.log(subtotal);
               $('#delivery-fee').text("RM 0");
               $('#delivery-fee2').text("RM 0");
               calculateGrandTotal();
               calculateGrandTotal2();
               //  var deliveryFee2 = document.getElementById('delivery-fee2');

         
         		$("#pickupaddress").slideDown();
         		$("#deliveryaddress").slideUp();
         	});
         	function move_navigation( $navigation, $MQ) {
           if ( $(window).width() >= $MQ ) {
           $navigation.detach();
           $navigation.appendTo('header');
           } else {
           $navigation.detach();
           $navigation.insertAfter('header');
           }
         }
         });
         function getDistanceFromLatLonInKm(lat1, lon1, lat2, lon2) {
            var R = 6371; // Radius of the earth in km
            var dLat = deg2rad(lat2-lat1);  // deg2rad below
            var dLon = deg2rad(lon2-lon1); 
            var a = 
               Math.sin(dLat/2) * Math.sin(dLat/2) +
               Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
               Math.sin(dLon/2) * Math.sin(dLon/2)
               ; 
            var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
            var d = R * c; // Distance in km
            return d;
         }

         function deg2rad(deg) {
            return deg * (Math.PI/180)
         }
         function calculate_delivery_fee(distance){
            let shop_delivery_fee = "<?= $shop['delivery_fee'] ?>";
            let total_fee = shop_delivery_fee * distance;
                
            $('#delivery-fee').text("RM " + (total_fee).toFixed(1) + "0");
            $('#delivery-fee2').text("RM " + (total_fee).toFixed(1) + "0");
            calculateGrandTotal();
            calculateGrandTotal2();
            return total_fee;
         }

         // navigator.geolocation.getCurrentPosition(
         //    function(position) {
         //       // Success goes here
         //       window.position = position;
         //       console.log(window.position.coords.latitude)
               
         //    }.bind(this),
         //    function(error) {
         //       window.position = "none";
         //    }
         //    //    alert("Please turn on location for this feature")
         //    //    setTimeout(function() {
         //    //          window.location.href = ''
         //    //    }, 2000)
         //    // }
         // )
         function process_map(map){
            console.log(map)
               // Create the search box and link it to the UI element.
               const input = document.getElementById("address");
               const searchBox = new google.maps.places.SearchBox(input);
               // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
               // Bias the SearchBox results towards current map's viewport.
               map.addListener("bounds_changed", () => {
                 searchBox.setBounds(map.getBounds());
               });
               let markers = [];
               // Listen for the event fired when the user selects a prediction and retrieve
               // more details for that place.
               searchBox.addListener("places_changed", () => {
                 const places = searchBox.getPlaces();
         
                 console.log(places);
                 if (places.length == 0) {
                   return;
                 }
                 // Clear out the old markers.
         
                 markers.forEach((marker) => {
                   marker.setMap(null);
                 });
                 markers = [];
                 // For each place, get the icon, name and location.
                 const bounds = new google.maps.LatLngBounds();
                 places.forEach((place) => {
                   if (!place.geometry) {
                     console.log("Returned place contains no geometry");
                     return;
                   }
                   console.log(place.place_id);
                   let p_id = place.place_id;
                  //  var service = new google.maps.places.PlacesService(document.getElementById('map'));

               //     service.getDetails({
               //    placeId: 'EjxKYWxhbiBOaWJvbmcsIFRhbWFuIERheWEsIDgxMTAwIEpvaG9yIEJhaHJ1LCBKb2hvciwgTWFsYXlzaWEiLiosChQKEgldpN1KdG7aMRH30h2JHgA1CBIUChIJe_AGhNht2jERToZPd-vm_dQ'
               // }, function (place, status) {
               //    console.log('Place details:', place.geometry.location.lat);
               // });
               let postParam = {
                  'place_id' : p_id
               }
                  $.post("<?= base_url() ?>/Ajax/get_lat_long_from_place_id",postParam, function(returndata) {
                     JSON.parse(returndata);
                     let new_data = JSON.parse(returndata);
                     // console.log("return data" + new_data.result.geometry);

                     let location = (new_data.result.geometry.location);
                     let lat = location.lat;
                     let lng = location.lng;
                     let url = new_data.result.url;

                     let distance = getDistanceFromLatLonInKm(<?= $shop[
                         'lat'
                     ] == ''
                         ? '103.3'
                         : $shop['lat'] ?>,<?= $shop['lng'] == ''
    ? '103.3'
    : $shop['lng'] ?>,lat,lng);
                     // alert(JSON.stringify(distance) + "km");

                     $('.distance').text(distance.toFixed(2) + " KM");
                     calculate_delivery_fee(distance);
                 
                     // $('#url').text(url);
                     // $('#url').taext(url);

                     $("#url").attr("href", url);



                  });
                  
                   if (!place.place_id) {
                       alert("no place id")
                   return;
                 }else{
                     //found the place id
                 }
                   const icon = {
                     url: place.icon,
                   //   id : place.id,
                     size: new google.maps.Size(71, 71),
                     origin: new google.maps.Point(0, 0),
                     anchor: new google.maps.Point(17, 34),
                     scaledSize: new google.maps.Size(25, 25),
                   };
                   // Create a marker for each place.
                   markers.push(
                     new google.maps.Marker({
                       map,
                       icon,
                       title: place.id ,
         
                       position: place.geometry.location,
                     })
                   );
         
         
                   console.log(icon);
         
                   if (place.geometry.viewport) {
                     // Only geocodes have viewport.
                     bounds.union(place.geometry.viewport);
                   } else {
                     bounds.extend(place.geometry.location);
                   }
                 });
                 map.fitBounds(bounds);
               });
         }
         function get_position_from_lat_lng(postParam){
            $.post("<?= base_url() ?>/Ajax/get_position_from_lat_lng",postParam, function(returndata) {
                     JSON.parse(returndata);
                     let new_data = JSON.parse(returndata);
                     // console.log("return data" + new_data.result.geometry);
                     console.log(new_data)
                     $('#address').val(new_data.result.formatted_address);
                     return new_data.result.formatted_address;
                     // let location = (new_data.result.geometry.location);
                     // let lat = location.lat;
                     // let lng = location.lng;
                     // let distance = getDistanceFromLatLonInKm(1.5588869,103.7543101,lat,lng);
                     // // alert(JSON.stringify(distance) + "km");
                     // $('.distance').text(distance.toFixed(2) + " KM");

            });
         }
         function initAutocomplete() {
            let map ="";
            navigator.geolocation.getCurrentPosition(
            function(position) {

               let lat = position.coords.latitude;
               let lng = position.coords.longitude;
               const myLatLng = { lat: lat, lng: lng };

               
               map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: lat, lng: lng },
   
                    zoom: 15,
                    mapTypeId: "roadmap",

               });
               let map2 = new google.maps.Map(document.getElementById("mapMerchant"), {
                  center: { lat: <?= $shop['lat'] == ''
                      ? '103.3'
                      : $shop['lat'] ?>, lng: <?= $shop['lng'] == ''
    ? '103.3'
    : $shop['lng'] ?> },
   
                    zoom: 15,
                    mapTypeId: "roadmap",

               });
               new google.maps.Marker({
                  position: { lat: <?= $shop['lat'] == ''
                      ? '103.3'
                      : $shop['lat'] ?>, lng: <?= $shop['lng'] == ''
    ? '103.3'
    : $shop['lng'] ?> },
                  map2,
                  title: "Merchant location!",
               });
               // let postParam
               let distance = getDistanceFromLatLonInKm( <?= $shop['lat'] == ''
                   ? '103.3'
                   : $shop['lat'] ?>, <?= $shop['lng'] == ''
    ? '103.3'
    : $shop['lng'] ?>,lat,lng);
                     // alert(JSON.stringify(distance) + "km");
               $('.distance').text(distance.toFixed(2) + " KM");
               calculate_delivery_fee(distance);
               console.log(myLatLng);
               let new_position = get_position_from_lat_lng(myLatLng)
               
               new google.maps.Marker({
                  position: myLatLng,
                  map,
                  title: "Your location!",
               });
                  // alert(JSON.stringify(position));
               process_map(map);

            }.bind(this),
            function(error) {
               let map2 = new google.maps.Map(document.getElementById("mapMerchant"), {
                  center: { lat: <?= $shop['lat'] == ''
                      ? '103.3'
                      : $shop['lat'] ?>, lng: <?= $shop['lng'] == ''
    ? '103.3'
    : $shop['lng'] ?> },
   
                    zoom: 15,
                    mapTypeId: "roadmap",

               });
               new google.maps.Marker({
                  position: { lat: <?= $shop['lat'] == ''
                      ? '103.3'
                      : $shop['lat'] ?>, lng: <?= $shop['lng'] == ''
    ? '103.3'
    : $shop['lng'] ?> },
               map2,
               title: "Merchant location!",
            });
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: 1.546948, lng: 103.7781335 },
   
                    zoom: 10,
                    mapTypeId: "roadmap",
                  });
                  process_map(map);
               }
         )

             
             
           
           
           
           }
         
           
         //   function initMap() {
         //       const map = new google.maps.Map(document.getElementById("map"), {
         //         zoom: 8,
         //         center: { lat: 103.76181539999999, lng: 1.4853682 },
         //       });
         //       const geocoder = new google.maps.Geocoder();
         //       const infowindow = new google.maps.InfoWindow();
         //       // document.getElementById("submit").addEventListener("click", () => {
         //         geocodePlaceId(geocoder, map, infowindow);
         //       // });
         //  }
          function initMap() {
               const map = new google.maps.Map(document.getElementById("mapMerchant"), {
                 zoom: 8,
                 center: { lat: <?= $shop['lat'] == ''
                     ? '103.3'
                     : $shop['lat'] ?>, lng: <?= $shop['lng'] == ''
    ? '103.3'
    : $shop['lng'] ?> },
               });
               const geocoder = new google.maps.Geocoder();
               const infowindow = new google.maps.InfoWindow();
               // document.getElementById("submit").addEventListener("click", () => {
                 geocodePlaceId(geocoder, map, infowindow);
               // });
          }
          function geocodePlaceId(geocoder, map, infowindow) {
               // const placeId = "ChIJn9vtiTLMxDERtK0Mv5sya3s";
               alert(placeId)
               geocoder.geocode({ placeId: placeId }, (results, status) => {
                 if (status === "OK") {
                   if (results[0]) {
                     map.setZoom(11);
                     map.setCenter(results[0].geometry.location);
                     const marker = new google.maps.Marker({
                       map,
                       position: results[0].geometry.location,
                     });
                     infowindow.setContent(results[0].formatted_address);
                     infowindow.open(map, marker);
                   } else {
                     window.alert("No results found");
                   }
                 } else {
                   window.alert("Geocoder failed due to: " + status);
                 }
               });
             }
      </script>
      	
    <script>
function go_to_seach_page(){
    location.href= "<?= base_url() ?>/home/restaurants";
}
</script>
	
      <!-- Main JS (Do not remove) -->
   </body>
</html>