<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop | <?= $shop['shop_name'] ?></title>
    <meta name="description" content="<?= $shop['description'] ?><">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() . $shop['header_icon'] ?>">

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/price_rangs.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/slick.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/nice-select.css">

    <script src="https://kit.fontawesome.com/3d15aa1b08.js" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/style.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/locksmith/css/style.css" type="text/css"> -->

    <script src="<?= base_url() ?>/assets/assetsecom/js/vendor/jquery-1.12.4.min.js"></script>


<style>



/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 300px) {
    #pcslider{
      display:none !important;
  }
  .mobileslider{
      display:block !important;
  }
  
}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {
    #pcslider{
      display:block !important;
  }
  .mobileslider{
      display:none !important;
  }

}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {

}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {

}

.shopping-cart {
  background: white;
  width: 320px;
  z-index: 1;
  position: absolute;
  top: 30px;
  right: -10px;
  border-radius: 3px;
  padding: 20px;
  overflow: hidden;
  box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26) !important;
  -webkit-transition: all 0.2s ease;
  transition: all 0.2s ease;
  opacity: 0;
  -webkit-transform-origin: right top 0;
  -webkit-transform: scale(0);
  transform-origin: right top 0;
  transform: scale(0);
}
.shopping-cart.active {
  opacity: 1;
  -webkit-transform-origin: right top 0;
  -webkit-transform: scale(1);
  transform-origin: right top 0;
  transform: scale(1);
}
.cart__table tbody tr td.cart__item .cart__item__pic img {
    border: 1px solid #e8eff4;
    width: 84px;
}

.cart__table tbody tr .p0 {
    padding-top: 0px;
    padding-bottom: 0px;
}
.cart_count{
    color: black;
    background: red;
    border-radius: 50%;
    padding: 0px 10px;
    font-weight: bold;
    /* bottom: 20px; */
    position: relative;
    right: -24px;
    top: 18px;
}

    </style>
</head>
<body>
    <!-- ? Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url() . $shop['header_icon'] ?>" alt="loder">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->
    <header>
        <div class="header-area">
            <!-- <div class="header-top d-none d-sm-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="header-info-left">
                                    <ul>                             
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Privacy</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </div>
                                <div class="header-info-right d-flex">
                                    <ul class="order-list">
                                        <li><a href="#">My Wishlist</a></li>
                                        <li><a href="#">Track Your Order</a></li>
                                    </ul>
                                    <ul class="header-social">  
                                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li> <a href="#"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="header-mid header-sticky">
                <div class="container">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?= base_url() ?>/main/index/<?= $shop['slug'] ?>"><img src="<?= base_url() . $shop['icon'] ?>" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="<?= base_url() ?>/main/index/<?= $shop['slug'] ?>">Home</a></li>
                                    <li><a href="<?= base_url() ?>/main/product/<?= $shop['slug'] ?>">Shop</a></li>

                                    <li><a href="<?= base_url() ?>/main/cart/<?= $shop['slug'] ?>">Cart</a></li>
                                    <?php if(empty($customer_data)){ ?>

                                        <li><a href="<?= base_url() ?>/main/search/<?= $shop['slug'] ?>">Search</a></li>
                                    <?php }else{ ?>
                                        <li><a href="<?= base_url() ?>/main/order_history/<?= $shop['slug'] ?>?keyword=<?= $customer_data['contact'] ?>">Order History</a></li>

                                    <?php } ?>

                                    <?php if(in_array(1,$shop_function)){ ?>
                                        <?php if(empty($customer_data)){ ?>
                                            <li><a href="<?= base_url() ?>/main/login/<?= $shop['slug'] ?>">Login</a></li>
                                            <li><a href="<?= base_url() ?>/main/signup/<?= $shop['slug'] ?>">Signup</a></li>
                                        <?php }else{ ?>
                                            <li><a href="<?= base_url() ?>/main/profile/<?= $shop['slug'] ?>">Profile</a></li>
                                            <li><a href="<?= base_url() ?>/main/logout/<?= $shop['slug'] ?>">Logout</a></li>

                                        <?php } ?>
                                    <?php }  ?>
                                    <!-- <li><a href="#">Pages  <i class="fas fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="product.php">Product Details</a></li>
                                            <li><a href="checkout.html">Product Checkout</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="blog.html">Blog</a>
                                        <ul class="submenu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="elements.html">Element</a></li>
                                            <li><a href="blog-details.html">Blog Details</a></li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->

                        <div class="header-right">
                            <a class="cart_count">0</a>

                            <ul>
                                <!-- <li>
                                    <div class="nav-search search-switch hearer_icon">
                                        <a id="search_1" href="javascript:void(0)"> 
                                            <span class="flaticon-search"></span>
                                        </a>
                                    </div>
                                </li> -->
                                <!-- <li> <a href="login.html"><span class="flaticon-user"></span></a></li> -->
                                <li class="cart"><a id="cart"><span class="flaticon-shopping-cart"></span></a> 

                        <div class="shopping-cart">
                           


                          </div> <!--end shopping-cart -->
<!--                                     
                                    <a href="cart.html">
                                        <span class="flaticon-shopping-cart"></span>
                                    </a> -->
                                 </li>
                            </ul>
                        </div>

                    </div>
                    <!-- Show Search Box -->
                    <!-- <div class="search_input" id="search_input_box">
                        <form class="search-inner d-flex justify-content-between ">
                            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                            <button type="submit" class="btn"></button>
                            <span class="ti-close" id="close_search" title="Close Search"></span>
                        </form>
                    </div> -->
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
            <?php if(!empty($announcement) && $announcement['is_active'] == 1){ ?>
            <div class="header-bottom text-center">
                <p><?= $announcement['title'] ?><a target="_blank" href="<?= $announcement['link'] ?>" class="browse-btn"><?= $announcement['description'] ?></a>
                &nbsp;
                    <i class="fa fa-times" style="cursor:pointer" id="close_promo_btn"></i>
                </a>
                </p>
                
            </div>
            <?php  }?>
        </div>
    </header>