<!-- login Area Start -->
<div class="c-register-back">
    <div class="c-header">
        <h1>注册</h1>
    </div>
</div>

<div class="register-form-area c-register-form">
   

<div class="register-form">
<div class="row  login_image">
<?php if (in_array(1, $shop_function)) { ?>

<?php if(!empty($about)){ ?>

        <div class="col-md-4">

            <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" width="100%" alt="">
        </div>
        <div class="col-md-4">

            <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" width="100%" alt="">
        </div>
        <div class="col-md-4">

            <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" width="100%" alt="">
        </div>
    <?php } ?>
</div>
<?php } ?>

        <!-- register Heading -->
        <!-- <div class="register-heading">
            <span>register</span>
            <p>register now to get voucher benefit ! </p>
        </div> -->
        <!-- Single Input Fields -->
        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/main/signup">

            <div class="input-box">
                <?php if (isset($error)) { ?>
                    <div class="alert-message text-danger" role="alert">
                        <h2 class="text-danger">* <?= $error; ?></h2>
                    </div>
                <?php } ?>
                <div class="single-input-fields">
                    <label class="c-label">Full name</label>
                    <input type="text" class="c-input" name="name" placeholder="Enter full name" required>
                </div>
                <div class="single-input-fields">
                    <label class="c-label">Email Address</label>
                    <input class="c-input" type="email" name="email" placeholder="Enter email address" required>
                </div>
                <div class="single-input-fields">
                    <label class="c-label">Contact</label>
                    <input class="c-input" type="tel" name="contact" placeholder="Enter contact" required>
                </div>
                <?php if (in_array(6, $shop_function)) { ?>
                    <div class="single-input-fields">
                        <label class="c-label">Referal Code</label>
                        <input class="c-input" type="text" name="referal_code" value="<?= $referal_code ?>" placeholder="Optional">
                    </div>
                <?php } ?>
                <div class="single-input-fields">
                    <label class="c-label">Password</label>
                    <input class="c-input" type="password" name="password" placeholder="Enter Password" required>
                </div>
                <!-- <div class="single-input-fields register-check">
                            <input type="checkbox" id="fruit1" name="keep-log">
                            <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a>
                        </div> -->
            </div>

            <!-- form Footer -->
            <div class="register-footer">
                <p> Already have an account? <a href="<?= base_url()  ?>/main/login"> Login</a> here</p>
                <button class="submit-btn3 c-btn" type="submit">Sign Up</button>
            </div>
        </form>
       

    </div>
  
</div>
<?php if (in_array(1, $shop_function)) { ?>
    <?php if(!empty($about)){ ?>

        <div class="c-about container login_page_about">
            <h1 class="c-subtitle text-center" ><?= $about['title'] ?></h1>
            <p>
                <?= $about['description'] ?>
            </p>
        </div>
    <?php } ?>

    <?php } ?>
<!-- login Area End -->