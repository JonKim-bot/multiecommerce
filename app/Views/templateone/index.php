<main>
    <div class="c-home">
        <!-- slider Area Start-->
        <div class="c-section-banner-pc">
            <div class="slick-home-pc m-0">
                <?php foreach ($banner as $row) { ?>

                    <div class="c-carousel ">
                        <div class="c-carouselimg">
                            <img src="<?= base_url() . $row['banner'] ?>" class="" alt="">
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <div class="c-section-banner-mob">
            <div class="slick-home-mob m-0">
                <?php foreach ($banner_mobile as $row) { ?>

                    <div class="c-carousel ">
                        <div class="c-carouselimg">
                            <img src="<?= base_url() . $row['banner'] ?>" class="" alt="">
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
        <!-- slider Area End-->
        <!-- About Us Start -->
        <div class="c-about">
            <?php if (!empty($about)) { ?>
                <?php foreach ($about as $row) { ?>

                    <h1 class="c-subtitle"><?= $row['title'] ?></h1>
                    <p>
                        <?= $row['description'] ?>
                    </p>
                <?php } ?>

            <?php } ?>

        </div>
        <div></div>
        <!-- About Us End -->
        <!-- Product Start-->
        <div id="product" class="listing-area c-home-listing">
            <h1 class="c-subtitle"><?= $lang['my_product'] ?></h1>
            <div class="container">
                <div class="row">

                    <!--? Left content -->
                    <div class="col-xl-3 col-lg-4 col-md-4 c-home-listing-left">
                        <!-- Job Category Listing start -->
                        <div class="category-listing c-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <div class="product__sidebar__search c-hll-search">
                                    <form>
                                        <input type="text" placeholder="Search" class="search_bar c-searchbar">
                                        <button class="c-btn"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <div class="select-Categories pb-20">
                                    <div class="small-tittle mb-20">
                                        <h4><?= $lang['filter'] ?></h4>
                                    </div>
                                    <?php foreach ($category as $row) { ?>
                                        <label class="container"><?= $row['category'] ?>
                                            <input type="checkbox" class="category_check" value="<?= $row['category_id'] ?>">
                                            <span class="checkmark c-checkmark"></span>
                                        </label>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 col-md-8">
                        <div class="latest-items latest-items2 product_list">

                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Product End-->

        <!-- Home Bottom Start -->
        <?php if (!empty($about_bottom)) { ?>

            <div class="c-subAbout" style="background-image: url('<?= base_url() . $about_bottom['banner'] ?>');">
                <div class="c-text">
                    <p>
                        <?= $about_bottom['description'] ?></p>
                </div>
            </div>
        <?php } ?>
        <!-- Home Bottom End -->
    </div>
</main>