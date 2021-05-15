
    <main>
        <!-- Hero area Start-->
        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Product Details</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Product Details</a></li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!--  Hero area End -->
        <!--  services-area start-->
        <div class="services-area2 pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Single -->
                                <div class="h1-testimonial-active mobileslider">
                                    <?php foreach($product_image as $row){ ?>
                                    <div class="single-testimonial text-center">
                                    <a href="<?= base_url() . $row['product_image'] ?>" class="fancybox" data-fancybox="images">
                                            <i class="fa fa-eye text-dark fa-2x icon_view hvr-glow"></i>
   
                                            <img src="<?= base_url() . $row['product_image'] ?>" width="100%" alt="">
                                            </a>
                                    </div>
                                    <!-- Single Testimonial -->
                 
                                    <?php } ?>
                                </div>
                                <div class="single-services mb-0">

                                    <div class="col-md-6 pcslider" id="pcslider" style="align-self:center">
                                    <div class="h1-testimonial-active" style="width:90%">
                                    <?php foreach($product_image as $row){ ?>

                                        <div class="single-testimonial text-center">
                                        <a href="<?= base_url() . $row['product_image'] ?>" class="fancybox" data-fancybox="images">
                                            <i class="fa fa-eye text-white fa-2x icon_view hvr-glow"></i>
   
                                            <img src="<?= base_url() . $row['product_image'] ?>" width="100%" alt="">
                                            </a>

                                        </div>
                                        <?php } ?>

                                    </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">

                                        <div class="features-caption">
                                            <h3><?= $product['product_name'] ?></h3>
                                            <!-- <p>By Evan Winter</p> -->
                                            <div class="price">
                                                <span id="product_price">RM <?= $product['product_price'] ?></span>
                                            </div>
                                            <div class="select-Categories pb-30">
                                                <?php foreach($product_option as $row){ ?>
                                                <div class="select-job-items2 mb-30">
                                                    <div class="col-xl-12">
                                                    <?php if($row['minimum_required'] != 1){ ?>

                                                        <select name="select2[]" class="product_option_select">
                                                    <?php }else{ ?>
                                                        <select name="select2[]" class="product_option_select" require>

                                                    <?php } ?>
                                                           <?php foreach($row['selection'] as $key=> $rowselect){ ?>
                                                                <?php if($key == 0){ ?>
                                                                    <option value="0" selection_price="0"
                                                                    product_option_name="0"

                                                                    selection_name="0"
                                                                    product_option_id="0"><?= $row['name'] ?></option>
                                                                <?php }else{ ?>
                                                                    <option value="<?= $rowselect['product_option_selection_id'] ?>"
                                                                    product_option_name="<?= $row['name'] ?>"
                                                                     selection_price="<?= $rowselect['selection_price'] ?>" 
                                                                     selection_name="<?= $rowselect['product_option_name'] ?>"
                                                                     product_option_id="<?= $row['product_option_id'] ?>">
                                                                     <?= $rowselect['product_option_name'] ?> + RM <?= $rowselect['selection_price'] ?></option>

                                                                <?php } ?>

                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                               
                                            </div>
                                            
                                            
                                            <div class="product__details__widget" style="overflow: visible">
                                                <div class="quantity" style="float:left">
                                                <div class="pro-qty">
                                                  <span class="fa fa-minus dec qtybtn"></span>
                                                       <input type="text" value="1">
                                                  <span class="fa fa-plus inc qtybtn"></span></div>
                                                </div>
                                                <a  class="white-btn mr-10">Add to Cart</a>
                                                <a href="#" class="border-btn share-btn"><i class="fas fa-share-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- services-area End-->
        <!--Books review Start -->
        <section class="our-client section-padding best-selling">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-xl-10">
                        <div class="nav-button f-left">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Description</a>
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
                    <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                        <!-- Tab 1 -->  
                        <div class="row">
                            <div class="offset-xl-1 col-lg-9">
                                <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and</p>

                                <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less.</p>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <!-- Books review End -->
    </main>

    <script>
 
    </script>