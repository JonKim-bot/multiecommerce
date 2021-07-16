<main>
    <!-- slider Area Start-->
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <?php foreach ($banner as $row) { ?>
                <div class="single-slider slider-height d-flex align-items-center" style="background-image: url(<?= base_url() . $row['banner'] ?>);">
                    <div class="container">
                        <div class="rowr">
                            <div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8  col-sm-10">
                                <div class="hero-caption text-center">
                                    <!-- <span>Fashion Sale</span> -->
                                    <h1 data-animation="bounceIn" data-delay="0.2s"><?= $row['title'] ?></h1>
                                    <p data-animation="fadeInUp" data-delay="0.4s"><?= $row['description'] ?></p>
                                    <a href="<?= base_url() ?>/main/product" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
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

    <div class="listing-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <!--? Left content -->
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <!-- Job Category Listing start -->
                    <div class="category-listing mb-50">
                        <!-- single one -->
                        <div class="single-listing">
                            <!-- select-Categories  -->
                            <!-- <div class="select-Categories pb-30">
                                    <div class="select-job-items2 mb-30">
                                        <div class="col-xl-12">
                                            <select name="select2">
                                                <option value="">Category</option>
                                                <option value="">Category 1</option>
                                                <option value="">Category 2</option>
                                                <option value="">Category 3</option>
                                                <option value="">Category 4</option>
                                            </select>
                                        </div>
                                    </div>
                                   
                                </div> -->
                            <div class="product__sidebar__search">
                                <form>
                                    <input type="text" placeholder="Search" class="search_bar">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                            <!-- select-Categories End -->
                            <!-- Range Slider Start -->
                            <!-- <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">
                                    <div class="small-tittle">
                                        <h4>Filter by Price</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        <div class="range_item">
                                            <input type="text" class="js-range-slider" value="" />
                                            <div class="d-flex align-items-center">

                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount" readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount" readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside> -->
                            <!-- range end -->
                            <!-- select-Categories  -->

                            <!-- select-Categories End -->
                            <!-- select-Categories start -->
                            <div class="select-Categories pb-20">
                                <div class="small-tittle mb-20">
                                    <h4>Filter by Category</h4>
                                </div>
                                <?php foreach ($category as $row) { ?>
                                    <label class="container"><?= $row['category'] ?>
                                        <input type="checkbox" class="category_check" value="<?= $row['category_id'] ?>">
                                        <span class="checkmark"></span>
                                    </label>
                                <?php } ?>

                            </div>
                            <!-- select-Categories End -->
                        </div>
                    </div>
                    <!-- Job Category Listing End -->
                </div>
                <!--?  Right content -->
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="latest-items latest-items2 product_list">

                    </div>

                </div>
            </div>
        </div>

    </div>
</main>