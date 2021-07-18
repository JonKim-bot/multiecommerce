<!-- login Area Start -->
<div class="c-register-back">
    <div class="c-header">
        <h1>注册</h1>
    </div>
</div>

<div class="register-form-area c-register-form">
   

<div class="register-form">
<div class="row  login_image">

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
<div class="c-about container login_page_about">
            <h1 class="c-subtitle text-center" >关于我们</h1>
            <p>
                《关于我们》由音乐人梁翘柏作曲，作词人李焯雄联袂为周笔畅量身打造。
                《关于我们》除了诉说周笔畅十年的情愫，同时也用这首歌曲反思青春，另一种方式解读现在的青春热潮。你可能听过《匆匆那年》听过《致青春》，如果这些歌曲是对青春的一种解读，周笔畅的《关于我们》则是对青春的反思。解读是用片刻回忆的重温，而反思则是深层次对友情、亲情、爱情之间关于信任的总结。《关于我们》是青春三部曲最完美的谢幕。
            </p>
        </div>
<!-- login Area End -->