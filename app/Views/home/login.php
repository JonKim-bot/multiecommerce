
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="<?= base_url() ?>/assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/css/main.css">
<!--===============================================================================================-->

<style>
    .abcRioButtonBlue{
        width: 100%!important;

    }
    #gSignIn2{
        width: 100%!important;
   
    }
</style>

<div id="piegen-page">
		<header style="background:#f0ad4e">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="piegen-navbar-brand">
                        <a class="piegen-logo"><i class="flaticon-cutlery"></i><span>Emenu</span></a>
						</div>
						<a href="#" class="js-piegen-nav-toggle piegen-nav-toggle"><i></i></a>
					</div>
				</div>
			</div>
		</header>
    </div>
	<input type="hidden" value="" name="" id="is_home">

    <input type="hidden" value="<?= base_url() ?>" name="" id="base_url">
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-10">
				<form class="login100-form validate-form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/home/login">
					<span class="login100-form-title p-b-5">
						Login To Piegen Emenu

					</span>
					<span class="login100-form-avatar">
						<img src="https://piegendevelop.com/Piegen2/images/Logo.png" height="100%" alt="AVATAR">
					</span>
                    <?php if (isset($error)) { ?>
                        <p for="" class="text-danger p-t-2 text-center"><?= $error ?></p>
                    <?php } ?>

					<div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter Email">
						<input class="input100" type="email" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

                  
					<div class="wrap-input100 validate-input m-b-35" data-validate="Enter password">
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
                    <div class="container-login100-form-btn p-t-20">
                        <div id="gSignIn2" class="text-center" 
                            -theme="light" data-height="50"
                            data-longtitle="true" style="display:block;margin:auto;"></div>
					</div>

					<ul class="login-more p-t-10">
						<!-- <li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="<?= base_url() ?>/assets/login/#" class="txt2">
								Username / Password?
							</a>
						</li> -->

						<li>
							<span class="txt1">
								Don have an account?
							</span>

							<a href="<?= base_url() ?>/home/signup" class="txt2">
								Sign Up
							</a>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
    <script src="<?= base_url() ?>/assets/emenu/js/jquery.min.js"></script>



</body>
</html>