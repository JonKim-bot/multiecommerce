<div class="c-voucher">
                            <h4><span><?= $lang['my_gift'] ?></span></h4>
                            <div class="c-voucherLIST">
                                <div class="row">
                                    <?php foreach($gift_self as $row){ ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() . $row['banner']?>" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn view_gift_detail" id="<?= $row['gift_id'] ?>" is_self="1" >查看详情</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="c-voucher-other">
                            <h4><span><?= $lang['others_gift'] ?></span></h4>
                            <div class="c-voucherLIST">
                                <div class="row">
                                <?php foreach($gift_shop as $row){ ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() . $row['banner']?>" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn view_gift_detail" id="<?= $row['gift_id'] ?>" is_self="0">查看详情</div>
                                                <div class="c-btn c-red redeem_gift_" amount = "<?= $row['order_amount'] ?>" chance = "<?= $row['count'] ?>" style="cursor:pointer" id="<?= $row['gift_id'] ?>" >兑换</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                       


                        <script>

$(".view_gift_detail").on("click", function() {
    $('#giftmodal').modal('show');

        var gift_id = $(this).attr('id');
        var is_self = $(this).attr('is_self');

        get_gift_detail(gift_id,is_self)
    });
            
$(".redeem_gift_").on("click", function() {
        
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
    });
                        </script>