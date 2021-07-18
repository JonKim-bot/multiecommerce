<div class="c-voucher">
                            <h4><span>我的优惠卷</span></h4>
                            <div class="c-voucherLIST">
                                <div class="row">
                                    <?php foreach($voucher_self as $row){ ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() . $row['banner']?>" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn" data-toggle="modal" data-target="#vouchermodal">查看详情</div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="c-voucher-other">
                            <h4><span>其他优惠卷</span></h4>
                            <div class="c-voucherLIST">
                                <div class="row">
                                <?php foreach($voucher_shop as $row){ ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() . $row['banner']?>" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn" data-toggle="modal" data-target="#vouchermodal">查看详情</div>
                                                <div class="c-btn c-red redeem_voucher" amount = "<?= $row['redeem_point'] ?>" 
                            style="cursor:pointer" id="<?= $row['voucher_id'] ?>">兑换</div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <script>

                              
$(".redeem_voucher").on("click", function() {
        
        var voucher_id = $(this).attr('id');
        var amount = $(this).attr('amount');
       
        redeem_voucher(voucher_id);
    });
                        </script>