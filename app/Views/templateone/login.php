<!-- login Area Start -->
<div class="c-login-back">
    <div class="c-header">
        <h1>登入</h1>
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
                    <label class="c-label">电子邮件</label>
                    <input class="c-input" type="email" name="email" placeholder="电子邮件">
                </div>
                <div class="single-input-fields">
                    <label class="c-label">密码</label>
                    <input class="c-input" type="password" name="password" placeholder="密码">
                </div>
                <!-- <div class="single-input-fields login-check">
                            <input type="checkbox" id="fruit1" name="keep-log">
                            <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a>
                        </div> -->
            </div>

            <!-- form Footer -->
            <div class="login-footer">
                <p>还未拥有户口？ <a href="<?= base_url()  ?>/main/signup">立即申请</a></p>
                <button class="submit-btn3 c-btn" type="submit">Login</button>
            </div>
        </form>

    </div>
</div>
<!-- login Area End -->