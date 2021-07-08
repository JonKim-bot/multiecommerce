
        <!-- login Area Start -->
        <div class="login-form-area">
            <div class="login-form">
                <!-- Login Heading -->
                <div class="login-heading">
                    <span>Login</span>
                    <p>Login now to get voucher benefit ! </p>
                </div>
                <!-- Single Input Fields -->
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/main/login/<?= $shop['slug'] ?>">

                    <div class="input-box">
                        <?php if (isset($error)) { ?>
                            <div class="alert-message text-danger" role="alert">
                                <h2 class="text-danger">* <?= $error; ?></h2>
                            </div>
                        <?php } ?>
                        <div class="single-input-fields">
                            <label>Email Address</label>
                            <input type="email" name="email"  placeholder="Email address">
                        </div>
                        <div class="single-input-fields">
                            <label>Password</label>
                            <input type="password" name="password"  placeholder="Enter Password">
                        </div>
                        <!-- <div class="single-input-fields login-check">
                            <input type="checkbox" id="fruit1" name="keep-log">
                            <label for="fruit1">Keep me logged in</label>
                        <a href="#" class="f-right">Forgot Password?</a>
                        </div> -->
                    </div>

                <!-- form Footer -->
                <div class="login-footer">
                    <p>Don’t have an account? <a href="<?= base_url()  ?>/main/signup/<?= $shop['slug'] ?>">Sign Up</a>  here</p>
                    <button class="submit-btn3"  type="submit">Login</button>
                </div>
                </form>

            </div>
        </div>
        <!-- login Area End -->
