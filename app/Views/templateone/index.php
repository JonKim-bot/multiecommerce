<main>
    <div class="c-home">
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
                                        <a href="<?= base_url() ?>/main/product" class="btn_1 hero-btn c-slider-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
        <!-- slider Area End-->
        <!-- About Us Start -->
        <div class="c-about">
            <h1 class="c-subtitle">关于我们</h1>
            <p>
                《关于我们》由音乐人梁翘柏作曲，作词人李焯雄联袂为周笔畅量身打造。
                《关于我们》除了诉说周笔畅十年的情愫，同时也用这首歌曲反思青春，另一种方式解读现在的青春热潮。你可能听过《匆匆那年》听过《致青春》，如果这些歌曲是对青春的一种解读，周笔畅的《关于我们》则是对青春的反思。解读是用片刻回忆的重温，而反思则是深层次对友情、亲情、爱情之间关于信任的总结。《关于我们》是青春三部曲最完美的谢幕。
            </p>
        </div>
        <!-- About Us End -->

        <!-- Product Start-->
        <div class="listing-area c-home-listing">
            <h1 class="c-subtitle">我的产品</h1>
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
                                        <h4>Filter</h4>
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
        <div class="c-subAbout">
            <div class="c-text">
                <p>
                    作为周笔畅2015年数字专辑的预热单曲，《关于我们》用质朴的旋律和温情的歌词回顾了笔笔十年前站上这里接受掌声，到现在成就歌手舞台的历程。而笔笔也特意自己为单曲毛笔题词，将这首歌唱给十年来支持她的朋友，她希望通过这首歌来为十年发声，为青春作证。 </p>
            </div>
        </div>
        <!-- Home Bottom End -->
    </div>
</main>