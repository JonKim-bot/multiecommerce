<!DOCTYPE HTML>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title><?= $orders['shop_name']  ?> Orders Detail</title>
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
      <link rel="shortcut icon" href="<?= base_url() . "/" . $shop['icon']  ?>">
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
      <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
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
      <!-- Date Picker -->
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/bootstrap-datepicker.css">
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/style.css">
      <link href="<?= base_url() ?>/assets/emenu/redcayne/css/style.css" rel="stylesheet" />
      <link href="<?= base_url() ?>/assets/emenu/redcayne/css/responsive.css" rel="stylesheet" />
      <!-- Modernizr JS -->
      <script src="js/modernizr-2.6.2.min.js"></script>
      <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/custom.css">
      <!-- FOR IE9 below -->
      <!--[if lt IE 9]>
      <script src="js/respond.min.js"></script>
      <![endif]-->
   </head>
   <style>
.confirmation-card {
    padding: 38px;
    background: #f1f6f7;
}
.billing-title {
    font-size: 18px;
    font-weight: 400;
    line-height: 1.3em;
    margin-bottom: 15px;
    border-color: #DDDDDD;
}
.order_details_table {
    background: #e5ecee;
    padding: 30px;
    margin-top: 75px;
    margin-bottom: 75px;

}
.order_details_table h2 {
    color: #222;
    font-size: 18px;
    padding-bottom: 15px;
}

.order_details_table .table {
    margin-bottom: 0px;
}

.order_details_table .table tbody tr td p {
    margin-bottom: 0px;
}

.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}
.confirmation-card tr td:last-child {
    color: #222;
    padding-left: 25px;
}

.order_details_table h2 {
    color: #222;
    font-size: 18px;
    padding-bottom: 15px;
}
.billing-alert {
    font-size: 18px;
    color: #384aeb;
    margin-bottom: 30px;
}

.order_details_table .table {
    margin-bottom: 0px;
}


.order_details_table .table tbody tr td {
    border: 0;
    color: #777777;
}
.table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}
.order_details_table .table tbody tr td h5 {
    color: #222;
    margin-bottom: 0px;
}
.order_details_table .table tbody tr td h5 {
    font-family: "Roboto",sans-serif;
    color: #222;
    margin-bottom: 0px;
    font-size: 15px;
    text-transform: capitalize;
    font-weight: 500;
}
.order_details_table .table tbody tr td p {
    margin-bottom: 0px;
}
.order_details_table .table tbody tr td h4 {
    font-size: 14px;
    text-transform: uppercase;
    margin-bottom: 0px;
    color: #222;
}
@media (max-width: 1000px){

    .order_details_table .table tbody tr:last-child {
        height: 50px;
    }
}
.order_details_table .table tbody tr td h5 {
    color: #222;
    margin-bottom: 0px;
}
@media (max-width: 575px){

    .header_area+section, .header_area+row, .header_area+div {
        margin-top: 0px;
        padding-top: 71px;
    }
}

.h-100 {
    height: 100%!important;
}
.blog-banner-area .blog-banner {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    transform: translate(-50%, -50%);
}
.blog-banner h1 {
    font-size: 30px;
    margin-bottom: 10px;
    color: #222;
    text-transform: capitalize;
    
}
.banner-breadcrumb {
    display: inline-block;
}

.banner-breadcrumb .breadcrumb {
    background: transparent;
    padding: 0;
}
.banner-breadcrumb .breadcrumb-item {
    padding: .1rem;
}
.banner-breadcrumb .breadcrumb-item.active {
    color: #777777;
}
.banner-breadcrumb .breadcrumb-item+.breadcrumb-item::before {
    color: #777777;
    padding-right: .1rem;
    display: inline-block;
    
    content: "-";
}
.blog-banner-area {
    height: 280px;
    position: relative;
    z-index: 1;
}
.blog-banner-area::after {
    content: "";
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #f1f6f7;
    z-index: -1;
}

   </style>
   <section class="blog-banner-area" id="category">
    <div class="container h-100">
      <div class="blog-banner">
        <div class="text-center">
          <h1> <?= $orders['shop_name'] ?> Order Confirmation</h1>
          <nav aria-label="breadcrumb" class="banner-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Orders Status</a></li>
              <li class="breadcrumb-item active text-white" style="background:lightblue;border:1px solid; border-radius:20px;padding:10px;color:black;font-weight:bold" aria-current="page">
                 <?= $orders['orders_status'] ?>
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
<div class="container">
    <p class="text-center billing-alert" style="margin: 20px;">
      Thank you. Your order has been 
      <a href="<?= base_url(). "/main/view_order_status/". $orders['orders_id'] ?>" target="_blank"><?= $orders['orders_status'] ?></a>

      .
    </p>
    <p class="text-center billing-alert" style="margin: 20px;">
      <a target="_blank" href="<?= base_url(). "/main/view_order_status/". $orders['orders_id'] ?>" target="_blank">Click me to view orders status tracking</a>

      .
    </p>
    
  <div class="row mb-5">
      <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
        <div class="confirmation-card">
          <h3 class="billing-title">Order Info</h3>
          <table class="order-rable">
            <tbody>
              <tr>
              <td>Order number</td>
              <td>:  <?= $orders['orders_id'] ?></td>
            </tr>
            <tr>
                    <td>Preorder</td>
                    <td>: <?= $orders['is_preorder']  == 1 ? "YES" : "NO" ?></td>

                </tr>
                
            <tr>
              <td>Date</td>
              <td>:  <?= $orders['created_date'] ?></td>
            </tr>
           
            <tr>
              <td>Total</td>
              <td>: RM <?= $orders['grand_total'] ?></td>
            </tr>
            <tr>
              <td>Payment method</td>
              <td>: <?= $orders['payment_method'] ?></td>
            </tr>

            <?php if($orders['promo_id'] > 0){ ?>
              <tr>
              <td>Promo Code</td>
              <td>: <?= $orders['code'] ?></td>
            </tr>
            <tr>
              <td>Amount</td>
              <td>: RM <?= $orders['amount'] ?></td>
            </tr>
            


            <?php }   ?>
            <?php if(trim(strtolower($orders['payment_method'])) == "credit card"){ ?>
              <tr>
              <td>Receipt Link : </td>
              <td>
              <a href="<?= $orders['receipt_url'] ?>" target="_blank">Click me to view receipt</a>
              </td>
            </tr>


            <?php }   ?>
          </tbody></table>
        </div>
      </div>
      <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
        <div class="confirmation-card">
          <h3 class="billing-title">Customer Info</h3>
          <table class="order-rable">
            <tbody>
            <tr>
              <td>Customer</td>
              <td>: <?= $orders['full_name'] ?></td>
            </tr>
            <tr>
              <td>Contact</td>
              <td>: <?= $orders['contact'] ?></td>
            </tr>
            <tr>
              <td>Country</td>
              <td>: <?= "Malaysia" ?></td>
            </tr>
            <tr>
              <td>Address</td>
              <td>: <?= $orders['address'] ?></td>
            </tr>
          </tbody></table>
        </div>
      </div>

      <div class="col-md-6 col-xl-4 mb-4 mb-xl-0">
        <div class="confirmation-card">
          <h3 class="billing-title"><?= $orders['shop_name'] ?> Bank Info</h3>
          <table class="order-rable">
            <tbody>
            <tr>
              <td>Bank</td>
              <td>: <?= $shop['bank'] ?></td>
            </tr>
            <tr>
              <td>Bank Account</td>
              <td>: <?= $shop['bank_account'] ?></td>
            </tr>
            <tr>
              <td>Bank Holder Name</td>
              <td>: <?= $shop['bank_holder_name'] ?></td>
            </tr>
           
          </tbody></table>
        </div>
      </div>
      
    </div>
    <div class="order_details_table">
      <h2>Order Details</h2>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
            <th scope="col">Image</th>

              <th scope="col">Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Item Price</th>
              <th scope="col">Item Total Price</th>

            </tr>
          </thead>
          <tbody>
            <?php foreach($orders['order_detail'] as $row) { ?>
            <tr>
            <td colspan="1" style="width: 10px;overflow: hidden;">
                    <img src="<?= base_url () . $row['image'] ?>" alt="" width="100px" />
        </td>
              <td>
                <p><?= $row['product_name'] ?>
                         
            <?php if(!empty($row['order_detail_option'])){ ?>
                                                <?php foreach($row['order_detail_option'] as $row_option){ ?>
                                                    <li><?= $row_option['option_name'] ?> - <?= $row_option['product_option_name'] ?><br> RM <?= $row_option['selection_price'] ?></li>
                                                <?php  } ?>
                                                <?php  } ?>
                </p>
              </td>
              <td>
                <h5>x <?= $row['product_quantity'] ?></h5>
              </td>
              <td>
                <p>RM <?= $row['product_price'] ?></p>
              </td>
              <td>
                <p>RM <?= $row['product_total_price'] ?></p>
              </td>
            </tr>
            <?php  } ?>
            <tr>
              <td colspan="2">
                <h4></h4>
              </td>
              <td>
                <h4></h4>
              </td>
              <td>
                <h4>
                <b>Delivery Fee :</b>    
                </h4>
              </td>
              <td>
                <p>RM <?= $orders['delivery_fee'] ?></p>
              </td>
            </tr>
            <tr>
            <td>
                <h4></h4>
              </td>
              <td colspan="2">
                <h4></h4>
              </td>
              <td>
              <h4>
              <b>Total :</b>    

                  </h4>
              </td>
              <td >
                <h4>RM <?= $orders['grand_total'] ?></h4>
              </td>
            </tr>
          </tbody>
        </table>
    </div>
</div>
<a class="btn btn-primary btn-block" style="margin-bottom:60px" target="_blank" href="<?= $orders['url'] ?>">Contact Shop <i class="fa fa-whatsapp"></i> </a>
</div>