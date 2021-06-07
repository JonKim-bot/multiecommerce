<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <base href="./"> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Ecommerce Admin Panel</title>
    <link rel="stylesheet" href="https://unpkg.com/@coreui/icons@1.0.0/css/all.min.css">
    <!-- Main styles for this application-->
    <link rel="stylesheet" href="<?= base_url('assets/plugins/select2/select2.css') ?>">
    <link href="<?= base_url() ?>/assets/css/core/style.css" rel="stylesheet">
    
    <link href="<?= base_url() ?>/assets/css/core/custom.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/plugins/chartjs/css/chartjs.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3d15aa1b08.js" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatable/css/dataTables.bootstrap4.css"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css"> -->
    <!--FONT AWESOME 5 FREE-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/fonts/flaticon/font/flaticon.css">
  
    <!-- <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
            
            
            <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"> -->

    <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/animate.css">
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/hover.css">
      <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/bootstrap.css"> -->
      <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css"> -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/css/style.css">
      <script src="https://kit.fontawesome.com/3d15aa1b08.js" crossorigin="anonymous"></script>
      <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-messaging.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js"></script>

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <link href="<?=base_url('assets/plugins/colorpicker/jquery.minicolors.css')?>" rel="stylesheet">
        <script src="<?=base_url('assets/plugins/colorpicker/jquery.minicolors.js')?>"></script>

<!-- include summernote css/js -->
<script src="https://cdn.tiny.cloud/1/k2b6d8s5puch1kgdbkgjnz7s6d5hxg4k9e3dzo0dj5axcg6i/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<style>
    /* .select2-container--default .select2-selection--single {
        display: none !important;
    } */


</style>
<body class="c-app">
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-md-down-none">
            <!-- <svg class="c-sidebar-brand-full" width="118" height="46" alt="DevUI Logo">
                    <use xlink:href="assets/brand/coreui-pro.svg#full"></use>
                </svg>
                <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="DevUI Logo">
                    <use xlink:href="assets/brand/coreui-pro.svg#signet"></use>
				</svg> -->
            <span class="c-sidebar-brand-full" style="font-size:20px;">Ecommerce </span>
            <span class="c-sidebar-brand-minimized" style="font-size:20px;">JlnJln</span>
            <audio id="notification" src="<?= base_url() ?>assets/emenu/4.mp3" style="visibility:hidden" muted></audio>

        </div>
        <?php
        $uri = service('uri');
        // $session = session();
        // $session = \Config\Services::session();
        ?>
        <ul class="c-sidebar-nav ps ps--active-y">
            <li class="c-sidebar-nav-title">Components</li>
            <?php
            if (session()->get('admin_data')['type'] == "ADMIN") {
            ?>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'admin' ? 'c-active' : null) ?>" href="<?= base_url() ?>/admin">
                        <i class="cil-user c-sidebar-nav-icon"></i>
                        Admin
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'merchant' ? 'c-active' : null) ?>" href="<?= base_url() ?>/merchant">
                        <i class="cil-user c-sidebar-nav-icon"></i>
                        Merchant
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'OrderCustomer' ? 'c-active' : null) ?>" href="<?= base_url() ?>/OrderCustomer">
                        <i class="fa fa-shopping-cart c-sidebar-nav-icon"></i>
                        Customer
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'tag' ? 'c-active' : null) ?>" href="<?= base_url() ?>/tag">
                        <i class="cil-user c-sidebar-nav-icon"></i>
                        Tag
                    </a>
                </li>
                
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'bank' ? 'c-active' : null) ?>" href="<?= base_url() ?>/bank">
                        <i class="cil-user c-sidebar-nav-icon"></i>
                        Bank
                    </a>
                </li>
                

                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'paymentmethod' ? 'c-active' : null) ?>" href="<?= base_url() ?>/paymentmethod">
                        <i class="cil-user c-sidebar-nav-icon"></i>
                        Payment Method
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'orders_status' ? 'c-active' : null) ?>" href="<?= base_url() ?>/orders_status">
                        <i class="cil-user c-sidebar-nav-icon"></i>
                        Orders Status
                    </a>
                </li>

                
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'shop' ? 'c-active' : null) ?>" href="<?= base_url() ?>/shop">
                        <i class="cil-user c-sidebar-nav-icon"></i>
                        Shop
                    </a>
                </li>
                   
                
                
            <?php
            } 
            ?>
             <?php
            if (session()->get('admin_data')['type'] == "MERCHANT") {
            ?>
            
            <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'shop' ? 'c-active' : null) ?>" href="<?= base_url() ?>/shop">
                        <i class="fa fa-store c-sidebar-nav-icon"></i>
                        Shop
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'ProductCategory' ? 'c-active' : null) ?>" href="<?= base_url() ?>/ProductCategory">
                        <i class="fa fa-server c-sidebar-nav-icon"></i>
                        Product Category (Step 1)
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'product' ? 'c-active' : null) ?>" href="<?= base_url() ?>/product">
                        <i class="fa fa-product-hunt c-sidebar-nav-icon"></i>
                        Product (Step 2)
                    </a>
                </li>

                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'contact' ? 'c-active' : null) ?>" href="<?= base_url() ?>/contact">
                        <i class="fa fa-phone c-sidebar-nav-icon"></i>
                        Contact 
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'orders' ? 'c-active' : null) ?>" href="<?= base_url() ?>/orders">
                        <i class="fa fa-shopping-cart c-sidebar-nav-icon"></i>
                        Orders
                    </a>
                </li>

                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'OrderCustomer' ? 'c-active' : null) ?>" href="<?= base_url() ?>/OrderCustomer">
                        <i class="fa fa-shopping-cart c-sidebar-nav-icon"></i>
                        Customer
                    </a>
                </li>
               
                
                 <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'about' ? 'c-active' : null) ?>" href="<?= base_url() ?>/about">
                        <i class="fa fa-cog c-sidebar-nav-icon"></i>
                        About (For home page)
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'banner' ? 'c-active' : null) ?>" href="<?= base_url() ?>/banner">
                        <i class="fa fa-picture-o c-sidebar-nav-icon"></i>
                        Banner (For home page)
                    </a>
                </li>

              
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'brand' ? 'c-active' : null) ?>" href="<?= base_url() ?>/brand">
                        <i class="fa fa-picture-o c-sidebar-nav-icon"></i>
                        Brand 
                    </a>
                </li>
                     
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'shoprate' ? 'c-active' : null) ?>" href="<?= base_url() ?>/Shoprate">
                        <i class="fa fa-picture-o c-sidebar-nav-icon"></i>
                        Shop rate 
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'voucher' ? 'c-active' : null) ?>" href="<?= base_url() ?>/voucher">
                        <i class="fa fa-picture-o c-sidebar-nav-icon"></i>
                        Voucher
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'gift' ? 'c-active' : null) ?>" href="<?= base_url() ?>/gift">
                        <i class="fa fa-picture-o c-sidebar-nav-icon"></i>
                        Gift
                    </a>
                </li>
                <li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'transaction' ? 'c-active' : null) ?>" href="<?= base_url() ?>/transaction">
                        <i class="fa fa-picture-o c-sidebar-nav-icon"></i>
                        Transaction
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'customer' ? 'c-active' : null) ?>" href="<?= base_url() ?>/customer">
                        <i class="fa fa-picture-o c-sidebar-nav-icon"></i>
                        Member
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'annoucement' ? 'c-active' : null) ?>" href="<?= base_url() ?>/Announcement">
                        <i class="fa fa-bullhorn c-sidebar-nav-icon"></i>
                        Announcement

                    </a>
                </li>
               
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'promo' ? 'c-active' : null) ?>" href="<?= base_url() ?>/promo">
                        <i class="fa fa-credit-card c-sidebar-nav-icon"></i>
                        Promocode
                    </a>
                </li>
                <li>
                    <a class="c-sidebar-nav-link <?= ($uri->getSegment(1) == 'shop_payment_method' ? 'c-active' : null) ?>" href="<?= base_url() ?>/shop_payment_method">
                        <i class="fa fa-credit-card c-sidebar-nav-icon"></i>
                     Payment Method
                    </a>
                </li>

            <?php
            } 
            ?>

            <li class="c-sidebar-nav-divider"></li>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 577px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 256px;"></div>
            </div>
        </ul>
        <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-unfoldable"></button>
    </div>
    <div class="c-wrapper c-fixed-components">
        <header class="c-header c-header-light c-header-fixed">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show" style="line-height: 1;">
                <i class="cil-menu c-icon c-icon-lg"></i>
            </button>
            <a class="c-header-brand d-lg-none c-header-brand-sm-up-center" href="<?= base_url() ?>/dashboard">
                <!-- <svg width="118" height="46" alt="CoreUI Logo">
                    <use xlink:href="assets/brand/coreui-pro.svg#full"></use>
                </svg> -->DEV
            </a>
            <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true" style="line-height: 1;">
                <i class="cil-menu c-icon c-icon-lg"></i>
            </button>
            <ul class="c-header-nav d-md-down-none">
                <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="<?= base_url() ?>/dashboard">Dashboard</a></li>
            </ul>
            <ul class="c-header-nav mfs-auto">
                <li class="c-header-nav-item px-3 c-d-legacy-none">
                    <button class="c-class-toggler c-header-nav-btn" type="button" id="headertooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="" data-original-title="Toggle Light/Dark Mode" aria-describedby="">
                        <i class="cil-moon c-icon c-d-dark-none"></i>
                        <i class="cil-sun c-icon c-d-default-none"></i>
                    </button>

                </li>
            </ul>
            <ul class="c-header-nav">
                <!-- <li class="c-header-nav-item dropdown d-md-down-none mx-2">
                    <a class="c-header-nav-link">
                        <i class="cil-bell c-icon"></i>
                        <span class="badge badge-pill badge-danger">5</span>
                    </a>
                </li>
                <li class="c-header-nav-item dropdown d-md-down-none mx-2">
                    <a class="c-header-nav-link">
                        <i class="cil-list-rich c-icon"></i>
                        <span class="badge badge-pill badge-warning">15</span>
                    </a>

                </li>
                <li class="c-header-nav-item dropdown d-md-down-none mx-2">
                    <a class="c-header-nav-link">
                        <i class="cil-envelope-open c-icon"></i>
                        <span class="badge badge-pill badge-info">7</span>
                    </a>
                </li> -->

                <li class="c-header-nav-item dropdown">
                    <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <div class="c-avatar">
                            <i class="fa fa-user fa-2x"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right pt-0">
                        <div class="dropdown-header bg-light py-2">
                            <?php
                            if (session()->get('admin_data')['type'] == "ADMIN") {
                            ?>
                                <strong> <?= session()->get('admin_data')['name']; ?></strong>
                            <?php
                            } else if (session()->get('admin_data')['type'] == "USER") {
                            ?>
                                <strong> <?= session()->get('admin_data')['username']; ?></strong>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- <a class="dropdown-item" href="#">
                            <i class="cil-user c-icon mfe-2"></i>
                            Profile
                        </a> -->
                        <!-- <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="<?= base_url() ?>/access/logout">
                            <i class="cil-account-logout c-icon mfe-2"></i>
                            Logout
                        </a>
                    </div>
                </li>
                <li class="c-header-nav-item px-2 c-d-legacy-none"></li>
            </ul>

        </header>
        <div class="c-body">
        