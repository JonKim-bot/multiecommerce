<!-- login Area Start -->
<div class="c-profile-back">
    <div class="c-header">
        <h1><?= $lang['my_profile'] ?></h1>
    </div>
</div>
<div class="profile-form-area c-profile-form">
    <div class="profile-form">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <img src="<?= base_url() . $customer['banner']?>" class="profile_picture" alt="">

            </div>
            <div class="col-md-12 text-center mt-2">
                 <button class="submit-btn3 c-btn_" data-toggle="modal" data-target="#imageModal"><?= $lang['change_photo'] ?></button>
            </div>

        </div>
   
        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/main/profile">

                <div class="input-box">
                <?php if (isset($error)) { ?>
                    <div class="alert-message text-danger" role="alert">
                        <h2 class="text-danger">* <?= $error; ?></h2>
                    </div>
                <?php } ?>
                
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['email'] ?></label>
                    <input class="c-input" type="email" name="email" readonly value="<?= isset($_SESSION['customer_data'])
                                                ? $_SESSION['customer_data']['email']
                                                : '' ?>" placeholder="<?= $lang['email'] ?>">
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['name'] ?></label>
                    <input  class="c-input" type="text" name="name" value="<?= isset($_SESSION['customer_data'])
                                            ? $_SESSION['customer_data']['name']
                                            : '' ?>" placeholder="<?= $lang['name'] ?>">
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['email'] ?></label>
                    <input  class="c-input" type="tel" name="contact" value="<?= isset($_SESSION['customer_data'])
                                            ? $_SESSION['customer_data']['contact']
                                            : '' ?>" placeholder="<?= $lang['email'] ?>" required>
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['postcode'] ?></label>
                    <input  class="c-input" type="text" name="post_code" value="<?= isset($_SESSION['customer_data'])
                                            ? $_SESSION['customer_data']['post_code']
                                            : '' ?>" placeholder="<?= $lang['postcode'] ?>">
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['city'] ?></label>
                    <input  class="c-input" type="text" name="city" value="<?= isset($_SESSION['customer_data'])
                                            ? $_SESSION['customer_data']['city']
                                            : '' ?>" placeholder="<?= $lang['city'] ?>">
                </div>
                <div class="single-input-fields">
                    <label class="c-label"><?= $lang['address'] ?></label>
                    <input  class="c-input" type="text" name="address" value="<?= isset($_SESSION['customer_data'])? $_SESSION['customer_data']['address']: '' ?>" placeholder="<?= $lang['address'] ?>">
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
            <div class="profile-footer">
                <button class="c-btn btn" type="submit">Save</button>
            </div>
        </form>

    </div>
</div>

<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Change Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data"  method="POST" action="<?=base_url('/main/edit_profile_image/');?>">
        <div class="modal-body">
        <div class="form-group">
                <input type="file" class="form-control"  name="banner" >
        </div>
    
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    </div>
</div>
</div>
<!-- login Area End -->