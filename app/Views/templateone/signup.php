<!-- login Area Start -->
<div class="c-register-back">
    <div class="c-header">
        <h1><?= $lang['register'] ?></h1>
    </div>
</div>

<div class="register-form-area c-register-form">


    <div class="register-form">
        <?php if (in_array(1, $shop_function)) { ?>

            <?php if (!empty($about)) { ?>
                <div class="row  login_image">

                    <div class="col-md-4">

                        <img src="<?= base_url()  . $about['banner'] ?>" width="100%" alt="">
                    </div>
                    <div class="col-md-4">

                        <img src="<?= base_url() . $about['banner'] ?>" width="100%" alt="">
                    </div>
                    <div class="col-md-4">

                        <img src="<?= base_url() . $about['banner'] ?>" width="100%" alt="">
                    </div>
                </div>
            <?php } ?>
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
                    <label class="c-label"><?= $lang['name'] ?></label>
                    <input type="text" class="c-input" name="name" placeholder="<?= $lang['name'] ?>" required>
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['email'] ?></label>
                    <input class="c-input" type="email" name="email" placeholder="<?= $lang['email'] ?>" required>
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['contact_number'] ?></label>
                    <input class="c-input" type="tel" name="contact" placeholder="<?= $lang['contact_number'] ?>" required>
                </div>
                <?php if (in_array(6, $shop_function)) { ?>
                    <div class="single-input-fields">
                        <label class="c-label"><?= $lang['referal_code'] ?></label>
                        <input class="c-input" type="text" name="referal_code" value="<?= $referal_code ?>" placeholder="<?= $lang['referal_code'] ?>">
                    </div>
                <?php } ?>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['password'] ?></label>
                    <input class="c-input" type="password" name="password" placeholder="<?= $lang['password'] ?>" required>
                </div>
                <!-- <div class="single-input-fields register-check">
                            <input type="checkbox" id="fruit1" name="keep-log">
                            <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a>
                        </div> -->
            </div>

            <!-- form Footer -->
            <div class="register-footer">
                <p><?= $lang['already_have_account'] ?> <a href="<?= base_url()  ?>/main/login"> <?= $lang['login'] ?></a></p>

                <div class="d-flex justify-content-end">
                    <button class="submit-btn3 c-btn" type="submit"><?= $lang['submit'] ?></button>
                </div>
            </div>
        </form>


    </div>

</div>
<?php if (in_array(1, $shop_function)) { ?>
    <?php if (!empty($about)) { ?>

        <div class="c-about container login_page_about">
            <h1 class="c-subtitle text-center"><?= $about['title'] ?></h1>
            <p>
                <?= $about['description'] ?>
            </p>
        </div>
    <?php } ?>

<?php } ?>
<!-- login Area End -->