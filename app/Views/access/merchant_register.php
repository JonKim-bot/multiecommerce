<style>
label{
    font-weight: bold;
    font-size:large;
}

</style>
<div class="col-md-6">
    <div class="card-group">
        
        <div class="card p-4">
            <div class="card-body">
                
                <div class="" style="display:flex;">
                    <h5 class="text-muted">Emenu Merchant Portal</h5>
                    <ul class="c-header-nav mfs-auto rm-flex">
                        <li class="c-header-nav-item c-d-legacy-none">
                            <button class="c-class-toggler c-header-nav-btn" type="button" id="header-tooltip" data-target="body" data-class="c-dark-theme" data-toggle="c-tooltip" data-placement="bottom" title="" data-original-title="Toggle Light/Dark Mode" aria-describedby="tooltip615585">
                            <i class="cil-moon c-icon c-d-dark-none"></i>
                            <i class="cil-sun c-icon c-d-default-none"></i>
                            </button>

                        </li>
                    </ul>
                </div>
                <br>
                <form role="form" method="POST" enctype="multipart/form-data" action="<?=base_url('/access/register');?>">
                    <?php if (isset($error)) { ?>
                        <div class="alert-message"  role="alert">
                            <?= $error; ?>						
                        </div>
                    <?php }?>
                    <!-- <p class="text-muted">.DEV Admin Panel</p> -->
                  
                    <div>
                    <h2>Your Shop Detail</h2>

                    <div class="form-group">
                                    <label for="">Shop English Name</label>
                                    <input type="text" class="form-control" name="shop" placeholder="e.g. Restaurant Lim" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Shop Chinese Name (If shop name got chinese character enter here)</label>
                                    <input type="text" class="form-control" name="shop_name" placeholder="e.g. Restaurant 中文">
                                </div>
                                <div class="form-group">
                                    <label for="">Operating Time</label>
                                    <input type="text" class="form-control" name="operating_hour"  placeholder="e.g. Monday-Sunday - 8AM - 10PM" required>
                                </div>
                                <div class="form-group">
                                <label for="">Delivery Fee (PER KM)</label>
                                    <input type="number" class="form-control" name="delivery_fee" placeholder="e.g. RM 3" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Contact</label>
                                    <input type="number" class="form-control" name="contact"  placeholder="e.g. 60121231232" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email"  placeholder="e.g. xxx.com" required>
                                </div>
                                <div class="form-group">
                    <label for="banner">Shop Category</label>

                    <select name="tag_id[]" class="select" id="" required multiple>
                        <?php foreach($tag as $row){ ?>
                    

                                <option value="<?= $row['tag_id'] ?>"><?= $row['tag']?></option>


                           
                        <?php }?>
                        </select>
                    </div>
                                <div class="form-group">
                                    <label for="">Insta</label>
                                    <input type="text" class="form-control"  name="insta" placeholder="e.g. https://www.facebook.com/PieGen-Software-111184540529485/?ref=bookmarks" >
                                </div>

                                <div class="form-group">
                                    <label for="">Facebook</label>
                                    <input type="text" class="form-control"  name="facebook" placeholder="e.g. https://www.instagram.com/piegen_software/" >
                                </div>

                                
                                <div class="form-group">
                                    <label for="banner">Shop Image</label>
                                    <input type="file" class="form-control" name="banner" placeholder="Banner" required>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Shop Logo</label>
                                    <input type="file" class="form-control" name="icon" placeholder="Banner" required>
                                </div>
                                
                                
                                <div class="form-group">
                                <h4>Bank detail are for customer to bank in to you , then you can receive payment</h4>
                                <label for="banner">Select Your Bank</label>

                                <select name="bank_id" class="form-control" class="select" id="" required>
                                    <?php foreach($bank as $row){ ?>
                                            <option value="<?= $row['bank_id'] ?>"><?= $row['bank']?></option>

                                    <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Holder Name</label>
                                    <input type="text" class="form-control" name="bank_holder_name" placeholder="e.g. Lim Jin" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Account</label>
                                    <input type="text" class="form-control" name="bank_account" placeholder="e.g. 123213123123" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea class="form-control textarea" name="address" placeholder="Address"></textarea>
                                </div>
                               
                    </div>
                    <h2>Personal Account Detail (For Login Into The system)</h2>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cil-user c-icon"></i>
                            </span>
                        </div>
                        <input class="form-control" type="text" name="username" placeholder="Username" require>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cil-lock-locked c-icon"></i>
                            </span>
                        </div>
                        <input class="form-control" type="password" name="password" placeholder="Password" require>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cil-lock-locked c-icon"></i>
                            </span>
                        </div>
                        <input class="form-control" type="password" name="password2" placeholder="Confirm Password" require>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cil-user c-icon"></i>
                            </span>
                        </div>
                        <input class="form-control" type="text" name="contact" placeholder="Contact Number" require>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="cil-user c-icon"></i>
                            </span>
                        </div>
                        <input class="form-control" type="email" name="email" placeholder="Email" require>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-primary px-4 w-100" type="submit">Register</button>
                        </div>
                    </div>
                    <div class="row mt-2">
                     
                     <div class="col-12">
                         <a class="btn btn-dark px-4 w-100" href="<?= base_url()  . "/access/loginMerchant" ?>">Login</a>
                     </div>
                 </div>
                </form>
            </div>
        </div>
        
    </div>
</div>

