    <main>
        <!-- Hero area Start-->
        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Category</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Category</a></li> 
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
        <!-- listing Area Start -->
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
                                    <form action="#">
                                        <input type="text" placeholder="Search">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <!-- select-Categories End -->
                                <!-- Range Slider Start -->
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">
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
                                </aside>
                                <!-- range end -->
                                <!-- select-Categories  -->
                               
                                <!-- select-Categories End -->
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-20">
                                    <div class="small-tittle mb-20">
                                        <h4>Filter by Category</h4>
                                    </div>
                                    <?php foreach($category as $row){ ?>
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
        <!-- listing-area Area End -->
    </main>