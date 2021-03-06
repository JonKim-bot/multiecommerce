<div class="c-voucher">
                            <h4><span><?= $lang['my_voucher'] ?></span></h4>
                            <div class="c-voucherLIST">
                                <div class="row">
                                    <?php foreach($voucher_self as $row){ ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() . $row['banner']?>" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn view_voucher_detail" c_id= "<?= $row['customer_voucher_id'] ?>" id="<?= $row['voucher_id'] ?>" is_self="1" ><?=  $lang['view'] ?></div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="c-voucher-other">
                            <h4><span><?= $lang['others_voucher'] ?></span></h4>
                            <div class="c-voucherLIST">
                                <div class="row">
                                <?php foreach($voucher_shop as $row){ ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() . $row['banner']?>" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn view_voucher_detail" c_id= "0" id="<?= $row['voucher_id'] ?>" is_self="0"><?=  $lang['view'] ?></div>
                                                <div class="c-btn c-red redeem_voucher_" amount = "<?= $row['redeem_point'] ?>" 
                            style="cursor:pointer" id="<?= $row['voucher_id'] ?>"><?= $lang['exchange'] ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                       



                        <script>

$(".view_voucher_detail").on("click", function() {
    $('#vouchermodal').modal('show');
    var customer_voucher_id = $(this).attr('c_id');
    $('#customer_voucher_id_').val(customer_voucher_id);
        var voucher_id = $(this).attr('id');
        var is_self = $(this).attr('is_self');

        get_voucher_detail(voucher_id,is_self)
    });
            
$(".redeem_voucher_").on("click", function() {
        
        var voucher_id = $(this).attr('id');
        var amount = $(this).attr('amount');
       
        redeem_voucher(voucher_id);
    });
                        </script>