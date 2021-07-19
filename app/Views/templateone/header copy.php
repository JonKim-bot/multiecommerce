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
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/custom.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/3d15aa1b08.js" crossorigin="anonymous"></script>

    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/assetsecom/css/style.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/locksmith/css/style.css" type="text/css"> -->

    <script src="<?= base_url() ?>/assets/assetsecom/js/vendor/jquery-1.12.4.min.js"></script>


    <style>
        /* Small devices (portrait tablets and large phones, 600px and up) */
        /* @media only screen and (min-width: 300px) {
    #pcslider{
      display:none !important;
  }
  .mobileslider{
      display:block !important;
  }
  
} */

        /* Medium devices (landscape tablets, 768px and up) */
        /* @media only screen and (min-width: 768px) {
    #pcslider{
      display:block !important;
  }
  .mobileslider{
      display:none !important;
  }

} */

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (min-width: 992px) {}

        /* Extra large devices (large laptops and desktops, 1200px and up) */
        @media only screen and (min-width: 1200px) {}

        .shopping-cart {
            background: white;
            width: 250px;
            z-index: 1;
            position: absolute;
            top: 40px;
            right: unset;
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

        @media (min-width: 768px) {
            .shopping-cart {
                width: 320px;
                right: -10px;
            }
        }

        .shopping-cart.active {
            opacity: 1;
            -webkit-transform-origin: right top 0;
            -webkit-transform: scale(1);
            transform-origin: right top 0;
            transform: scale(1);
        }

        .user_drop {
            background: white;
            width: 150px;
            z-index: 1;
            position: absolute;
            top: 40px;
            right: -10px;
            border-radius: 3px;
            /* padding: 20px; */
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

        .user_drop.active {
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

        .cart_count {
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
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url() . $shop['header_icon'] ?>" alt="loder">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
        
        <div class="header-area">
        <?php if (!empty($announcement) && $announcement['is_active'] == 1) { ?>
                <div class="header-bottom text-center">
                    <p><?= $announcement['title'] ?><a target="_blank" href="<?= $announcement['link'] ?>" class="browse-btn"><?= $announcement['description'] ?></a>
                        &nbsp;
                        <i class="fa fa-times" style="cursor:pointer" id="close_promo_btn"></i>
                        </a>
                        </a>
                    </p>

                </div>
            <?php  } ?>
            <div class="header-mid header-sticky">
                <div class="container">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo ">
                            <a class="c-logo" href="<?= base_url() ?>/main/index">
                                <img src="<?= base_url() . $shop['icon'] ?>" alt="">
                            </a>
                        </div>
                        <!-- Main-menu -->
                        <div class=" c-flex">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="c-li" href="<?= base_url() ?>/main/index"><?= $lang['home']?></a></li>
                                        <!-- <li><a href="<?= base_url() ?>/main/product">我的产品</a></li> -->

                                        <!-- <li><a href="<?= base_url() ?>/main/cart">Cart</a></li> -->
                                        <li><a class="c-li" href="<?= base_url() ?>/main/index#product"><?= $lang['product']?></a></li>

                                        <?php if (empty($customer_data)) { ?>

                                            <li><a class="c-li" href="<?= base_url() ?>/main/search"><?= $lang['order_history']?></a></li>
                                        <?php } else { ?>
                                            <li><a class="c-li" href="<?= base_url() ?>/main/order_history?keyword=<?= $customer_data['contact'] ?>"><?= $lang['order_history']?></a></li>

                                        <?php } ?>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Right -->

                            <div class="c-logo-mob">
                                <div class="c-lm-img">
                                    <a class="c-cart-logo" id="cart">
                                        <i class="fas fa-shopping-cart c-fa"></i>
                                    </a>
                                    <div class="numberCircle">0</div>

                                    <div class="shopping-cart">
                                    </div>
                                </div>
                                <?php if (in_array(1, $shop_function)) { ?>
                                <div class="c-lm-img_">
                                    <a class="c-cart-logo" id="user">
                                        <i class="fas fa-user c-fa"></i><i class=""></i>
                                    </a>
                                    <div class="user_drop">
                                            <?php if (empty($customer_data)) { ?>
                                                <a class="c-dropdown-a" href="<?= base_url() ?>/main/login">
                                                    <p class=""><?= $lang['login'] ?></p>
                                                </a>
                                                <a class="c-dropdown-a" href="<?= base_url() ?>/main/signup">
                                                    <p class=""><?= $lang['register'] ?></p>
                                                </a>
                                            <?php } else { ?>
                                                <a class="c-dropdown-a" href="<?= base_url() ?>/main/member">
                                                    <p class=""><?= $lang['my_profile'] ?></p>
                                                </a>
                                                <a class="c-dropdown-a" href="<?= base_url() ?>/main/logout">
                                                    <p class=""><?= $lang['logout'] ?></p>
                                                </a>

                                            <?php } ?>
                                        </div>
                                        
                                    </div>
                                    <?php }  ?>
                                <!-- <div class="c-lm-img d-lg-none">

                                    <div class="mobile_menu c-burger d-block"></div>
                                </div> -->

                                <!-- <ul class="c-icon">
                                    <li> <a href="login.html"><span class="flaticon-user"></span></a></li>
                                    <li class="cart">

                                        <a id="cart"><span class="flaticon-shopping-cart"></span></a>
                                        <a class="cart_count">0</a>
                                        <div class="shopping-cart">
                                        </div>
                                    </li>
                                </ul> -->
                            </div>

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
           
        </div>
    </header>