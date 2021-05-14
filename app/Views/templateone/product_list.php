<div class="row">
    <input type="hidden" id="max_product_price" value="<?= $product_max_price ?>">
    <?php foreach($product as $row){ ?>
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="properties pb-30">
            <div class="properties-card">
                <div class="properties-img">
                <a href="product.php"><img src="<?= base_url() .  $row['image'] ?>" alt=""></a>
                    <div class="socal_icon">
                        <a href="#"><i class="ti-shopping-cart"></i></a>
                        <a href="#"><i class="ti-heart"></i></a>
                        <a href="#"><i class="ti-zoom-in"></i></a>
                    </div>
                </div>
                <div class="properties-caption properties-caption2">
                    <h3><a href="product.php"><?= $row['product_name'] ?></a></h3>
                    <div class="properties-footer">
                        <div class="price">
                            <span>RM<?= $row['product_price'] ?>
                            <?php if($row['is_promo'] == 1){ ?>
                                <span>RM<?= $row['promo_price'] ?></span>
                            <?php } ?>
                            
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>