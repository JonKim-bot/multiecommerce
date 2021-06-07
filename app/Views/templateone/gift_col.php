<?php foreach($gift as $row){ ?> 
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="properties pb-30">
            <div class="properties-card">
                <div class="properties-img">
                    <a href="<?= base_url() . "/main/gift_detail/" . $shop['slug'] . "/" .  $row['gift_id'] ?>"><img witdh="200px" src="<?= base_url() . $row['banner']?>" alt=""></a>
                    <div class="socal_icon">
                        <!-- <a href="#"><i class="ti-shopping-cart"></i></a> -->
                        <a class="redeem" id="<?= $row['gift_id'] ?>" style="cursor_pointer"><i class="ti-hand-stop"></i></a>
                        <!-- <a href="#"><i class="ti-zoom-in"></i></a> -->
                    </div>
                </div>
                <div class="properties-caption properties-caption2">
                    <h3><a href="pro-details.html"><?= $row['gift'] ?></a></h3>
                    <div class="properties-footer">
                        <div class="price">
                            <!-- <span>$98.00 <span>$120.00</span></span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
                                