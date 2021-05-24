
  <main>
        <!-- slider Area Start-->
        <section class="slider-area ">
            <div class="slider-active">
                <!-- Single Slider -->
                <?php foreach($banner as $row){ ?>
                <div class="single-slider slider-height d-flex align-items-center" style="background-image: url(<?= base_url() . $row['banner'] ?>);">
                    <div class="container">
                        <div class="rowr">
                            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8  col-sm-10">
                                <div class="hero-caption text-center">
                                    <!-- <span>Fashion Sale</span> -->
                                    <h1 data-animation="bounceIn" data-delay="0.2s"><?= $row['title'] ?></h1>
                                    <p data-animation="fadeInUp" data-delay="0.4s"><?= $row['description'] ?></p>
                                    <a href="<?= base_url() ?>/main/product/<?= $shop['slug'] ?>" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
                <?php } ?>
            </div>
        </section>
        <!-- slider Area End-->
        <!-- items Product 1  Start-->
        <!-- <section class="items-product1 pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-items mb-20">
                            <div class="items-img">
                                <img src="assets/img/gallery/items1.jpg" alt="">
                            </div>
                            <div class="items-details">
                                <h4><a href="product.php">Men's Fashion</a></h4>
                                <a href="product.php" class="browse-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-items mb-20">
                            <div class="items-img">
                                <img src="assets/img/gallery/items2.jpg" alt="">
                            </div>
                            <div class="items-details">
                                <h4><a href="product.php">Women's Fashion</a></h4>
                                <a href="product.php" class="browse-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-items mb-20">
                            <div class="items-img">
                                <img src="assets/img/gallery/items3.jpg" alt="">
                            </div>
                            <div class="items-details">
                                <h4><a href="product.php">Baby Fashion</a></h4>
                                <a href="product.php" class="browse-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <?php if(!empty($about)){ ?>
        <section class="about spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about__text">
                            <div class="label">AbouT us</div>
                            <h2><?= $about['title'] ?></h2>
                            <p><?= $about['description'] ?></p>
                            <a href="<?= base_url() ?>/main/index/<?= $shop['slug'] ?>#contactForm_" class="primary-btn">Contact us</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about__video" style="background:url('<?= base_url() . $about['banner'] ?>')">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } ?>
        <?php if(!empty($brand)){ ?>
        <section class="services spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title center-title">
                        <span>Our Brand</span>
                        <h2>Services We Offer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            <?php foreach($brand as $row){ ?>

                <div class="col-lg-4 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                        <i class="fa <?= $row['icons'] ?> fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="services__item__text">
                            <h4><?= $row['title'] ?></h4>

                            <p><?= $row['description'] ?></p>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <?php } ?>
        <!--items Product  End -->
        <!-- Latest-items Start -->
        <div class="latest-items section-padding fix">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-12">
                        <div class="nav-button">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav-tittle">
                                    <h2>Trending This Week</h2>
                                </div>
                                <div class="nav nav-tabs property-controls" id="nav-tab" role="tablist">
                                    <a class="nav-link active" data-filter="all">All</a>
                                  <?php foreach ($category as $key => $row) { ?>

                                    <a class="nav-link" data-filter=".category<?= strtolower(
                                        $row['category_id']
                                    ) ?>"><?= $row['category'] ?></a>
                                    <?php } ?>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                        <!-- Tab 1 -->  
                        <div class="latest-items-active property-filter row">
                            <!-- Single -->
                            <?php foreach ($product as $row) { ?>

                            <div class="col-md-3 mix all <?php
                                if(strpos($row['category_id'], ',') !== false){
                                    echo str_replace(',',' category',strtolower($row['category_id']));
                                }else{
                                    echo 'category' . $row['category_id'];
                                }
                                ?>">

                                <div class="properties pb-30 ">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                            <a href="<?= base_url() ."/main/product_detail/" .  $shop['slug'] . "/" . $row['product_id'] ?>"><img src="<?= base_url() .  $row['image'] ?>" alt=""></a>
                                            <div class="socal_icon">
                                                <!-- <a href="#"><i class="ti-shopping-cart"></i></a> -->
                                                <!-- <a href="#"><i class="ti-heart"></i></a> -->
                                                <a href="<?= base_url() ."/main/product_detail/" .  $shop['slug'] . "/" . $row['product_id'] ?>"><i class="ti-zoom-in"></i></a>
                                            </div>
                                        </div>
                                        <div class="properties-caption properties-caption2">
                                            <h3><a href="<?= base_url() ."/main/product_detail/" .  $shop['slug'] . "/" . $row['product_id'] ?>"><?= $row['product_name'] ?></a></h3>
                                            <div class="properties-footer">
                                                <div class="price">
                                                <?php if($row['is_promo'] == 1){ ?>
                                                    <span>RM <?= $row['promo_price'] ?>
                                                        <span style="text-decoration: line-through;">RM <?= $row['product_price'] ?></span>
                                                    </span>
                                                    <?php }else{ ?>
                                                        <span>RM <?= $row['product_price'] ?>
                                                    </span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>

                            <!-- Single -->
                            
                            <!-- Single -->
                            
                            <!-- Single -->
                            
                            <!-- Single -->
                      
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Latest-items End -->
        <!-- Testimonial Start -->
      
        <!-- Testimonial End -->
        <!-- Latest-items 02 Start -->
        <section class="contact-section">
            <div class="container">

               
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact "  id="contactForm_" >
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email" require>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="contact" id="contact" type="tel" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter contact'" placeholder="Enter contact" require>
                                    </div>
                                </div>
                                <input type="hidden" value="<?= $shop['shop_id'] ?>" name="shop_id">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3><?= $shop['address'] ?></h3>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3><?= $shop['contact'] ?></h3>
                                <p><?= $shop['operating_hour'] ?></p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3><?= $shop['email'] ?></h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Area End -->
    </main>
   