<?php foreach($gift as $row){ ?> 
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
        <div class="properties pb-30">
            <div class="properties-card">
                <div class="properties-img">
                    <a href="<?= base_url() . "/main/gift_detail/" .   $row['gift_id'] ?>"><img witdh="200px" src="<?= base_url() . $row['banner']?>" alt=""></a>
                    <div class="socal_icon">
                        <?php if($selected == 1){ ?>
                        <!-- <a href="#"><i class="ti-shopping-cart"></i></a> -->
                            <a class="redeem" amount = "<?= $row['order_amount'] ?>" chance = "<?= $row['count'] ?>" style="cursor:pointer" id="<?= $row['gift_id'] ?>" style="cursor_pointer"><i class="ti-hand-stop"></i></a>
                        <!-- <a href="#"><i class="ti-zoom-in"></i></a> -->
                        <?php } ?>
                    </div>
                </div>
                <div class="properties-caption properties-caption2">
                    <h3><a href="<?= base_url() . "/main/gift_detail/" .   $row['gift_id'] ?>""><?= $row['gift'] ?></a></h3>
                    <div class="properties-footer">
                        <div class="price">
                            <span>Purchase over > RM <?= $row['order_amount'] ?></span>
                            <br>
                            <?php if($selected == 2){ ?>
                                <span>Redeem Date : <?= $row['redeem_date'] ?></span>

                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
                                

<script>
    $(".redeem").on("click", function() {
        
        var gift_id = $(this).attr('id');
        var chance = $(this).attr('chance');
        var amount = $(this).attr('amount');
        if(chance <= 0){
            Swal.fire({
                title: "Redeem failed",
                text: "You minimum purchase amount must over " + amount,
                type: 'error'
            });
            return;
        }
        redeem(gift_id);
        load_gift();
    });




</script>