
    <!-- header_lock Section End -->

    <!-- Breadcrumb Begin -->
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <div class="c-login-back" style="height:15vh">
    <div class="c-header">
        <h1><?= $lang['order_history'] ?></h1>
    </div>
</div>
    <div class="contact spad" style='padding-top:0px' >
        <div class="container">
            
            <div class="row" id="cart_product_padding">
                <div class="col-lg-12 col-md-6">
                    <div class="contact__widget">
                       
                        <div class="contact__widget__item">
                            
                            <div class="contact__widget__item__text">
                                <h4><?= $lang['order_history'] ?></h4>
                                <p><?= $lang['etel'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="contact__form">
                        <form novalidate action="<?= base_url() ?>/main/order_history" method="GET">
                            <input type="email" name="keyword" placeholder="<?= $lang['etel'] ?>">
                            <button type="submit" class="site-btn button_b"><?= $lang['submit'] ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>