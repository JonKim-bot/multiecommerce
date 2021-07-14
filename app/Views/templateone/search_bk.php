
    <!-- header_lock Section End -->

    <!-- Breadcrumb Begin -->
    <!-- Breadcrumb End -->

    <!-- Contact Section Begin -->
    <div class="contact spad">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-12 col-md-6">
                    <div class="contact__widget">
                       
                        <div class="contact__widget__item">
                            <div class="contact__widget__item__icon">
                                <span class="icon_mail_alt"></span>
                            </div>
                            <div class="contact__widget__item__text">
                                <h4>Search</h4>
                                <p>Enter your email or tel number to find your order history</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-6">
                    <div class="contact__form">
                        <form novalidate action="<?= base_url() ?>/main/order_history" method="GET">
                            <input type="email" name="keyword" placeholder="Email or phone number">
                            <button type="submit" class="site-btn">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>