
    <main class="login-bg">
        <!-- Register Area Start -->
        <div class="register-form-area">
            <div class="register-form text-center">
                <!-- Login Heading -->
                <div class="register-heading">
                    <span>Sign Up</span>
                    <p>Create your account to get full access</p>
                </div>
                <!-- Single Input Fields -->
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/main/signup/<?= $shop['slug'] ?>">

                <div class="input-box">
                     <?php if (isset($error)) { ?>
                        <div class="alert-message" role="alert">
                            <?= $error; ?>
                        </div>
                    <?php } ?>
                    <div class="single-input-fields">
                        <label>Full name</label>
                        <input type="text" name="name" placeholder="Enter full name" required>
                    </div>
                    <div class="single-input-fields">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Enter email address" required>
                    </div>
                    <div class="single-input-fields">
                        <label>Contact</label>
                        <input type="tel" name="contact" placeholder="Enter contact" required>
                    </div>
                    <?php if(in_array(6,$shop_function)){ ?>
                        <div class="single-input-fields">
                            <label>Referal Code</label>
                            <input type="text" name="contact" placeholder="Optional">
                        </div>
                    <?php } ?>
                    <div class="single-input-fields">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required>
                    </div>
          
                </div>
                <!-- form Footer -->
                <div class="register-footer">
                    <p> Already have an account? <a href="<?= base_url()  ?>/main/login/<?= $shop['slug'] ?>"> Login</a> here</p>
                    <button class="submit-btn3" type="submit">Sign Up</button>
                </div>
                </form>
            </div>
        </div>
        <!-- Register Area End -->
    </main>
