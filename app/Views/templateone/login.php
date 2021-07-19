<!-- login Area Start -->
<div class="c-login-back">
    <div class="c-header">
        <h1><?= $lang['login'] ?></h1>
    </div>
</div>
<div class="login-form-area c-login-form">
    <div class="login-form">
        <!-- Login Heading -->
        <!-- <div class="login-heading">
            <span>Login</span>
            <p>Login now to get voucher benefit ! </p>
        </div> -->
        <!-- Single Input Fields -->
        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/main/login">

            <div class="input-box">
                <?php if (isset($error)) { ?>
                    <div class="alert-message text-danger" role="alert">
                        <h2 class="text-danger">* <?= $error; ?></h2>
                    </div>
                <?php } ?>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['email'] ?></label>
                    <input class="c-input" type="email" name="email" placeholder="<?= $lang['email'] ?>">
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['password'] ?></label>
                    <input class="c-input" type="password" name="password" placeholder="<?= $lang['password'] ?>">
                </div>
                <!-- <div class="single-input-fields login-check">
                            <input type="checkbox" id="fruit1" name="keep-log">
                            <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a>
                        </div> -->
            </div>

            <!-- form Footer -->
            <div class="login-footer">
                <p><?= $lang['dont_have_account'] ?> <a href="<?= base_url()  ?>/main/signup"><?= $lang['register'] ?></a></p>
                <button class="submit-btn3 c-btn" type="submit"><?= $lang['submit'] ?></button>
            </div>
        </form>

    </div>
</div>
<!-- login Area End -->