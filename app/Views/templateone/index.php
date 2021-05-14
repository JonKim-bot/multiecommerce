
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
                                    <a href="#" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>
                <?php } ?>

                <!-- Single Slider -->
                
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
        <section class="about spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-6">
                   <div class="about__text">
                       <div class="label">AbouT us</div>
                       <h2><span>We provide services</span> for multiple customers in various industries and segments</h2>
                       <p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida lacus vel facilisis.</p>
                       <a href="#" class="primary-btn">Contact us</a>
                   </div>
               </div>
               <div class="col-lg-6">
                   <div class="about__video" style="background:url('locksmith/img/about-pic.jpg')">
                </div>
            </div>
        </div>
    </div>
</section>
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
                <div class="col-lg-4 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                        <i class="fa fa-adjust fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="services__item__text">
                            <h4>Locksmith Services</h4>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                        <i class="fa fa-adjust fa-3x" aria-hidden="true"></i>
                    </div>
                        <div class="services__item__text">
                            <h4>Safes & Locks</h4>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                        <i class="fa fa-adjust fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="services__item__text">
                            <h4>Access Control</h4>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                        <i class="fa fa-adjust fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="services__item__text">
                            <h4>Security Doors</h4>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        </div>
                    </div>
                </div> 
                <div class="col-lg-4 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                        <i class="fa fa-adjust fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="services__item__text">
                            <h4>Alarm System</h4>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="services__item">
                        <div class="services__item__icon">
                        <i class="fa fa-adjust fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="services__item__text">
                            <h4>Video Surveillance</h4>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                    <a class="nav-link active" data-filter="all">Men</a>
                                    <a class="nav-link" data-filter=".women">Women</a>
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
                            
                            <div class="col-md-3 mix all">
                                <div class="properties pb-30 ">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                            <a href="product.php"><img src="assets/img/gallery/latest1.jpg" alt=""></a>
                                            <div class="socal_icon">
                                                <a href="#"><i class="ti-shopping-cart"></i></a>
                                                <a href="#"><i class="ti-heart"></i></a>
                                                <a href="#"><i class="ti-zoom-in"></i></a>
                                            </div>
                                        </div>
                                        <div class="properties-caption properties-caption2">
                                            <h3><a href="product.php">Cashmere Tank + Bag</a></h3>
                                            <div class="properties-footer">
                                                <div class="price">
                                                    <span>$98.00 <span>$120.00</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mix women">
                                <div class="properties pb-30 ">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                            <a href="product.php"><img src="assets/img/gallery/latest1.jpg" alt=""></a>
                                            <div class="socal_icon">
                                                <a href="#"><i class="ti-shopping-cart"></i></a>
                                                <a href="#"><i class="ti-zoom-in"></i></a>
                                            </div>
                                        </div>
                                        <div class="properties-caption properties-caption2">
                                            <h3><a href="product.php">Cashmere Tank + Bag</a></h3>
                                            <div class="properties-footer">
                                                <div class="price">
                                                    <span>$98.00 <span>$120.00</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mix women">
                                <div class="properties pb-30 ">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                        <a href="product.php"><img src="assets/img/gallery/latest3.jpg" alt=""></a>
                                            <div class="socal_icon">
                                                <a href="#"><i class="ti-shopping-cart"></i></a>
                                                <a href="#"><i class="ti-zoom-in"></i></a>
                                            </div>
                                        </div>
                                        <div class="properties-caption properties-caption2">
                                            <h3><a href="product.php">Cashmere Tank + Bag</a></h3>
                                            <div class="properties-footer">
                                                <div class="price">
                                                    <span>$98.00 <span>$120.00</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 mix women">
                                <div class="properties pb-30 ">
                                    <div class="properties-card">
                                        <div class="properties-img">
                                        <a href="product.php"><img src="assets/img/gallery/latest2.jpg" alt=""></a>
                                            <div class="socal_icon">
                                                <a href="#"><i class="ti-shopping-cart"></i></a>
                                                <a href="#"><i class="ti-zoom-in"></i></a>
                                            </div>
                                        </div>
                                        <div class="properties-caption properties-caption2">
                                            <h3><a href="product.php">Cashmere Tank + Bag</a></h3>
                                            <div class="properties-footer">
                                                <div class="price">
                                                    <span>$98.00 <span>$120.00</span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                        <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
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
                                        <input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                    </div>
                                </div>
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
                                <h3>Buttonwood, California.</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services Area End -->
    </main>
   