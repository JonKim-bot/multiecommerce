
        <!-- Register Area Start -->
        <div class="register-form-area">
            <div class="register-form text-center">
                <!-- Login Heading -->
                <div class="button-group-area mt-40">
                <?php if(in_array(1,$shop_function)){ ?>

					<a href="<?= base_url() ?>/main/voucher" class="genric-btn primary radius">
                    <i class="fa fa-gift"></i>
                    Voucher
                    
                    </a>
                <?php } ?>
                <?php if(in_array(2,$shop_function)){ ?>

					<a href="<?= base_url() ?>/main/gift" class="genric-btn primary radius">
                    <i class="fa fa-gift"></i>

                    Gift</a>
                <?php } ?>
                <?php if(in_array(6,$shop_function)){ ?>

                    <a href="<?= base_url() ?>/main/point_history" class="genric-btn primary radius">
                    <i class="fa fa-credit-card"></i>

                    Point History</a>
                <?php } ?>
				</div>
                <div class="register-heading">

                    <span>Profile</span>
                    <?php if(in_array(6,$shop_function)){ ?>
                    <p>Referal your friend to enjoy voucher reward</p>
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url() ?>/main/signup/<?= $_SESSION['customer_data']['referal_code'] ?>&choe=UTF-8" 
                style="margin: auto; border: 3px solid green; padding: 10px;display: block; margin-left: auto; margin-right: auto;">
                    <?php } ?>
                </div>
                <!-- Single Input Fields -->
                <p>Downline : </p>
                <ul>

                    <?php
                    foreach($downline as $row){ ?>
                        <li><a href="<?= base_url() ?>/customer/detail/<?= $row['customer_id'] ?>" target="_blank" class="text-dark"> - <?= $row['contact'] ?></a></li>

                    <?php } ?>
                </ul>
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/main/profile">

                <div class="input-box">
                    <div class="single-input-fields">
                        <label>Email Address</label>
                        <input type="email" name="email" readonly value="<?= isset($_SESSION['customer_data'])
                                                ? $_SESSION['customer_data']['email']
                                                : '' ?>" placeholder="Enter email address">
                    </div>
                    <div class="single-input-fields">
                        <label>Full name</label>
                        <input type="text" name="name" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['name']
                                              : '' ?>" placeholder="Enter full name">
                    </div>
                    <div class="single-input-fields">
                        <label>Contact</label>
                        <input type="tel" name="contact" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['contact']
                                              : '' ?>" placeholder="Enter contact" required>
                    </div>
                    <div class="single-input-fields">
                        <label>Post code</label>
                        <input type="text" name="post_code" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['post_code']
                                              : '' ?>" placeholder="Enter post code">
                    </div>
                    <div class="single-input-fields">
                        <label>City</label>
                        <input type="text" name="city" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['city']
                                              : '' ?>" placeholder="Enter city">
                    </div>
                    <div class="single-input-fields">
                        <label>Address</label>
                        <input type="text" name="address" value="<?= isset($_SESSION['customer_data'])? $_SESSION['customer_data']['address']: '' ?>" placeholder="Enter address">
                    </div>
                    <div class="single-input-fields">
                        <label>Password * Leave blank if not change password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                  
                </div>
                <!-- form Footer -->
                <div class="register-footer">
                <!-- <p>Don’t have an account? <a href="<?= base_url()  ?>/main/signup">Sign Up</a>  here</p> -->

                    <button class="submit-btn3">Save</button>
                </div>
                </form>

            </div>
        </div>
       