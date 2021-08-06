<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="piegen">
    <meta name="description" content="#">
    <meta name="keywords" content="#">
    <!-- Page Title -->
    <title>Piegen | Emenu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/listing/css/bootstrap.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    <!-- Simple line Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/listing/css/simple-line-icons.css">
    <!-- Themify Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/listing/css/themify-icons.css">
    <!-- Hover Effects -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/listing/css/swiper.min.css">
	<script src="https://kit.fontawesome.com/3d15aa1b08.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/fonts/flaticon/font/flaticon.css">
	<link rel="manifest" href="<?= base_url() ?>/public/manifest.json">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/listing/css/set1.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/listing/css/magnific-popup.css">

        <link rel="stylesheet" href="<?= base_url() ?>/assets/emenu/css/style.css">
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js"></script>


    <link rel="stylesheet" href="<?= base_url() ?>/assets/listing/css/style.css">
	<script src="https://apis.google.com/js/client:platform.js?onload=renderButton" async defer></script>
<meta name="google-signin-client_id" content="711631038582-tj431nk7at5o7achcliiq91h6adojn43.apps.googleusercontent.com"> 
<script src="<?= base_url() ?>/assets/google_login.js"></script>

</head>
<style>
/* // Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) { 
	.search_shop{
	width:100%;height: 100%;
	}
 }

/* // Medium devices (tablets, 768px and up) */
@media (min-width: 768px) {

	.search_shop{
	width:80%;height: 100%;
	
	}
 }

/* // Large devices (desktops, 992px and up) */
@media (min-width: 992px) {  
	
}

/* // Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) { 
	
}

</style>
<body>
    <!--============================= HEADER =============================-->
    <nav id="piegen-main-nav" role="navigation">
		<a href="#" class="js-piegen-nav-toggle piegen-nav-toggle active"><i></i></a>
		<div class="js-fullheight piegen-table">
			<div class="piegen-table-cell js-fullheight">
				<div class="row">
					<div class="col-md-12 col-md-offset-3">
						<div class="form-group">
							<input type="text" class="form-control" onclick="go_to_seach_page()" style="margin-left:0%" id="search" placeholder="Enter any key to search...">
							<button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<ul>
						<?php
							if (session()->get('login_data') != null) {
							?>
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
							<!-- <li><a href="<?= base_url() ?>/home/special">
							<i class="fa fa-utensils"></i>

							Partners</a></li> -->
					
							<?php
							if (session()->get('login_data') == null) {
							?>
							<li><a href="<?= base_url() ?>/home/login">
							
							<i class="fa fa-user"></i>

							Login</a></li>
							<li><a href="<?= base_url() ?>/home/signup">
							<i class="fa fa-user-plus"></i>

							Sign Up</a></li>
							<?php }else{ ?>
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
	
    <script>
function go_to_seach_page(){
    location.href= "<?= base_url() ?>/home/restaurants";
}
</script>
	