
    <!--//END HEADER -->
    <!--============================= BOOKING =============================-->
    
    <div id="piegen-page">
		<header style="
        right: 0;
    z-index: 9;
    margin: 0 auto;
    background:#f0ad4e;
    position:relative;
        ">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="piegen-navbar-brand">
                        <a class="piegen-logo"><span>Emenu</span></a>
						</div>
						<a href="#" class="js-piegen-nav-toggle piegen-nav-toggle"><i></i></a>
					</div>
				</div>
			</div>
		</header>
    </div>
    <div>
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php foreach ($special_image as $row) { ?>
                <div class="swiper-slide">
                    <a href="<?= base_url() .
                        $row['special_image'] ?>" class="grid image-link">
                    <img src="<?= base_url() .
                        $row['special_image'] ?>" height= "200px" alt="">
                    </a>
                </div>
                
                <?php } ?>
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination swiper-pagination-white"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
        </div>
    </div>
    <!--//END BOOKING -->
    <!--============================= RESERVE A SEAT =============================-->
    <section class="reserve-block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5><?= $special['title'] ?></h5>
                    <p class="reserve-description"><?= $special[
                        'short_description'
                    ] ?></p>
                </div>
                <!-- <div class="col-md-6">
                    <div class="reserve-seat-block">
                        <div class="reserve-rating">
                            <span>9.5</span>
                        </div>
                        <div class="review-btn">
                            <a href="#" class="btn btn-outline-danger">WRITE A REVIEW</a>
                            <span>34 reviews</span>
                        </div>
                        <div class="reserve-btn">
                            <div class="featured-btn-wrap">
                                <a href="#" class="btn btn-danger">RESERVE A SEAT</a>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!--//END RESERVE A SEAT -->
    <!--============================= BOOKING DETAILS =============================-->
    <section class="light-bg booking-details_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-8 responsive-wrap">
                    <div class="booking-checkbox_wrap">
                        <div class="booking-checkbox">
                        <?= $special['description'] ?>
                            <hr>
                        </div>
                        <div class="row">
                            <?php
                            $special_list = explode(
                                '+',
                                $special['special_list']
                            );
                            foreach ($special_list as $row) { ?>
                            <div class="col-md-4">
                                <label class="custom-checkbox">
                        <span class="fa fa-check"></span>
                        <span class="custom-control-description"><?= $row ?></span>
                      </label> </div>
                      <?php }
                            ?>
                            
                        </div>
                    </div>
                    <!-- <div class="booking-checkbox_wrap mt-4">
                        <h5>34 Reviews</h5>
                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="<?= base_url() ?>/assets/listing/images/customer-img1.jpg" class="img-fluid" alt="#">
                                <p>Amanda G</p>
                                <span>35 Reviews</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        <h6>Best noodles in the Newyork city</h6>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span class="round-icon-blank"></span>
                                        <p>Reviewed 2 days ago</p>
                                    </div>
                                    <div class="customer-rating">8.0</div>
                                </div>
                                <p class="customer-text">I love the noodles here but it is so rare that I get to come here. Tasty Hand-Pulled Noodles is the best type of whole in the wall restaurant. The staff are really nice, and you should be seated quickly. I usually get the
                                    hand pulled noodles in a soup. House Special #1 is amazing and the lamb noodles are also great. If you want your noodles a little chewier, get the knife cut noodles, which are also amazing. Their dumplings are great
                                    dipped in their chili sauce.
                                </p>
                                <p class="customer-text">I love how you can see into the kitchen and watch them make the noodles and you can definitely tell that this is a family run establishment. The prices are are great with one dish maybe being $9. You just have to remember
                                    to bring cash.
                                </p>
                                <ul>
                                    <li><img src="<?= base_url() ?>/assets/listing/images/review-img1.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="<?= base_url() ?>/assets/listing/images/review-img2.jpg" class="img-fluid" alt="#"></li>
                                    <li><img src="<?= base_url() ?>/assets/listing/images/review-img3.jpg" class="img-fluid" alt="#"></li>
                                </ul>
                                <span>28 people marked this review as helpful</span>
                                <a href="#"><span class="icon-like"></span>Helpful</a>
                            </div>
                        </div>
                        <hr>
                        <div class="customer-review_wrap">
                            <div class="customer-img">
                                <img src="<?= base_url() ?>/assets/listing/images/customer-img2.jpg" class="img-fluid" alt="#">
                                <p>Kevin W</p>
                                <span>17 Reviews</span>
                            </div>
                            <div class="customer-content-wrap">
                                <div class="customer-content">
                                    <div class="customer-review">
                                        <h6>A hole-in-the-wall old school shop.</h6>
                                        <span class="customer-rating-red"></span>
                                        <span class="round-icon-blank"></span>
                                        <span class="round-icon-blank"></span>
                                        <span class="round-icon-blank"></span>
                                        <span class="round-icon-blank"></span>
                                        <p>Reviewed 3 months ago</p>
                                    </div>
                                    <div class="customer-rating customer-rating-red">2.0</div>
                                </div>
                                <p class="customer-text">The dumplings were so greasy...the pan-fried shrimp noodles were the same. So much oil and grease it was difficult to eat. The shrimp noodles only come with 3 shrimp (luckily the dish itself is cheap) </p>
                                <p class="customer-text">The beef noodle soup was okay. I added black vinegar into the broth to give it some extra flavor. The soup has bok choy which I liked - it's a nice textural element. The shop itself is really unclean (which is the case
                                    in many restaurants in Chinatown) They don't wipe down the tables after customers have eaten. If you peak into the kitchen many of their supplies are on the ground which is unsettling... </p>
                                <span>10 people marked this review as helpful</span>
                                <a href="#"><span class="icon-like"></span>Helpful</a>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-4 responsive-wrap">
                    <div class="contact-info">
                        <!-- <img src="<?= base_url() ?>/assets/listing/images/map.jpg" class="img-fluid" alt="#"> -->
                        <div class="address">
                            <span class="fa fa-map-pin"></span>
                            <p><a href="<?= $special[
                                'google_link'
                            ] ?>"><?= $special['address'] ?></a></p>
                        </div>
                        <div class="address">
                            <span class="fa fa-phone"></span>
                            <p><?= $special['contact'] ?></p>
                        </div>
                        <div class="address">
                            <span class="fa fa-link"></span>
                            <p><a href="<?= $special[
                                'website_link'
                            ] ?>"><?= $special['website_link'] ?></a></p>
                        </div>
                        <div class="address">
                            <span class="fa fa-facebook"></span>
                            <p><a href="<?= $special[
                                'facebook'
                            ] ?>"><?= $special['facebook'] ?></a></p>
                        </div>
                        <div class="address">
                            <span class="fa fa-instagram"></span>
                            <p><a href="<?= $special['insta'] ?>"><?= $special[
    'insta'
] ?></a></p>
                        </div>
                        <div class="address">
                            <span class="fa fa-clock"></span>
                            <p><?= $special['operating_hour'] ?> <br>
                        </div>
                        <!-- <a href="#" class="btn btn-outline-danger btn-contact">SEND A MESSAGE</a> -->
                    </div>
                    <div class="follow">
                        <!-- <div class="follow-img">
                            <img src="<?= base_url() ?>/assets/listing/images/follow-img.jpg" class="img-fluid" alt="#">
                            <h6>Christine Evans</h6>
                            <span>New York</span>
                        </div>
                        <ul class="social-counts">
                            <li>
                                <h6>26</h6>
                                <span>Listings</span>
                            </li>
                            <li>
                                <h6>326</h6>
                                <span>Followers</span>
                            </li>
                            <li>
                                <h6>12</h6>
                                <span>Followers</span>
                            </li>
                        </ul> -->
                        <?php $enquiry = 'Hi is this ' . $special['title']; ?>
                        <a href='https://api.whatsapp.com/send?phone=<?= $special[
                            'contact'
                        ] ?>&text=<?= rawurldecode(
    $enquiry
) ?>' target="_blank">
Contact
      </a>
      </div>
                </div>
            </div>
        </div>
    </section>
    <!--//END BOOKING DETAILS -->
    <!--============================= FOOTER =============================-->
  
    <!--//END FOOTER -->


