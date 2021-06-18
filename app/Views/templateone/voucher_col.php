<?php foreach($voucher as $row){ ?> 
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="properties pb-30">
            <div class="properties-card">
                <div class="properties-img">
                    <a href="<?= base_url() . "/main/voucher_detail/" .   $row['voucher_id'] ?>"><img witdh="200px" src="<?= base_url() . $row['banner']?>" alt=""></a>
                    <div class="socal_icon">
                        <!-- <a href="#"><i class="ti-shopping-cart"></i></a> -->
                        <?php if($selected == 1) {  ?>  
                        <a class="redeem_voucher" class="genric-btn primary radius" amount = "<?= $row['redeem_point'] ?>" 
                            style="cursor:pointer" id="<?= $row['voucher_id'] ?>" style="cursor_pointer"><i class="ti-hand-stop"></i></a>
                        <!-- <a href="#"><i class="ti-zoom-in"></i></a> -->
                        <?php } ?>
                    </div>
                </div>
                <div class="properties-caption properties-caption2">
                    <h3><a href="<?= base_url() . "/main/voucher_detail/" .   $row['voucher_id'] ?>""><?= $row['voucher'] ?></a></h3>
                    <div class="properties-footer">
                        <div class="price">
                            <span>Point Required : <?= $row['redeem_point'] ?></span>
                            <br>
                            <?php if($selected == 2){ ?>
                                <span>Redeem Date : <?= $row['redeem_date'] ?></span>
                               <br>
                                <span>Used Date : <?= $row['used_date'] ?></span>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
                                

<script>
    $(".redeem_voucher").on("click", function() {
        
        var voucher_id = $(this).attr('id');
        var amount = $(this).attr('amount');
       
        redeem_voucher(voucher_id);
    });




</script>