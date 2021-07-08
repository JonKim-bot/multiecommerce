<div class="row">
    <input type="hidden" id="max_product_price" value="<?= $product_max_price ?>">
    <?php foreach($product as $row){ ?>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="properties pb-30">
            <div class="properties-card">
                <div class="properties-img">
                <a href="<?= base_url() ."/main/product_detail/" .   $row['product_id'] ?>"><img src="<?= base_url() .  $row['image'] ?>" alt=""></a>
                    <div class="socal_icon">
                        <!-- <a href="#"><i class="ti-shopping-cart"></i></a> -->
                        <!-- <a href="#"><i class="ti-heart"></i></a> -->
                        <a href="<?= base_url() ."/main/product_detail/" .   $row['product_id'] ?>"><i class="ti-zoom-in"></i></a>
                    </div>
                </div>
                <div class="properties-caption properties-caption2">
                
                    <h3><a href="<?= base_url() ."/main/product_detail/" .   $row['product_id'] ?>"><?= $row['product_name'] ?></a></h3>
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
</div>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="product__pag">
        <?php for($i = 1;$i <= $pages;$i++) { ?>
            <a id="page<?= $i?>" onclick="get_product_list('<?= $i ?>')"><?= $i ?></a>
        <?php } ?>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="product__show">
            <p>Showing <?= $active_page ?>–<?= $pages ?> of <?= $product_total ?> results</p>
        </div>
    </div>
</div>