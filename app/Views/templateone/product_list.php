<div class="c-productList">
    <div class="row">
        <input type="hidden" id="max_product_price" value="<?= $product_max_price ?>">
        <?php foreach ($product as $row) { ?>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 d-flex">
                <!-- <a href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>"> -->
                    <a class="c-Cardflex" href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>">
                        <div class="c-listingCard">
                            <div class="c-top">
                                <div class="c-tag">最新!</div>
                                <div class="c-productImg">
                                    <img src="<?= base_url() .  $row['image'] ?>" alt="">
                                </div>
                                <div class="c-name">
                                    <h3><?= $row['product_name'] ?></h3>
                                </div>
                                <div class="c-desc">
                                    <p style="color:black"><?= $row['product_description'] ?></p>
                                </div>
                            </div>
                            <div class="c-btm">
                                <div class="c-btn">了解更多</div>
                                <div class="c-price">
                                <?php if($row['is_member'] == 1 && $row['is_promo'] == 1 && !empty($customer_data)){ ?>
                                        <p class="t-promo-price">RM <?= $row['product_price'] ?></p>
                                        <p class="t-price">RM <?= $row['promo_price'] ?></p>
                                    <?php }else if($row['is_promo'] == 1 && $row['is_member'] == 0){ ?>
                                        <p class="t-promo-price">RM <?= $row['product_price'] ?></p>
                                        <p class="t-price">RM <?= $row['promo_price'] ?></p>
                                    
                                    <?php } else { ?>
                                            
                                            <p class="t-price">RM <?= $row['product_price'] ?></p>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </a>
                <!-- </a> -->
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 d-flex">
            <div class="product__pag">
                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                    <a id="page<?= $i ?>" onclick="get_product_list('<?= $i ?>')"><?= $i ?></a>
                <?php } ?>
            </div>
        </div>
        <!-- <div class="col-lg-6 col-md-6">
        <div class="product__show">
            <p>Showing <?= $active_page ?>–<?= $pages ?> of <?= $product_total ?> results</p>
        </div>
    </div> -->
    </div>
</div>