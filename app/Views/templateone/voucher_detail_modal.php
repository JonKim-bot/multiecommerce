<div class="modal-body c-modal-body">

                    <div class="c-voucher-img">
                        <img class="voucher_img" src="<?= base_url() . $voucher['banner'] ?>" alt="">
                    </div>
                    <div class="c-voucher-title">
                        <h4 class='voucher_name'><?= $voucher['voucher'] ?></h4>
                        <p class="voucher_description"><?= $voucher['description'] ?></p>
                        <p><b>所需点数:</b> <span class="voucher_point"><?= $voucher['redeem_point'] ?></span></p>
                        <p><b>有效日期到: </b><?= $voucher['valid_until'] ?></p>
                        <p><b>你会得到什么:</b> <?= $voucher['what_you_get'] ?></p>             
                           </div>
                </div>
                <?php if($is_self == 0){ ?>
                <div class="modal-footer c-modal-footer">
                    <button type="button" id="<?= $voucher['voucher_id'] ?>" class="btn btn-secondary c-btn redeem_voucher" >兑换</button>
                </div>
                <?php  } ?>

                <script>

$(".redeem_voucher").on("click", function() {
        
        var voucher_id = $(this).attr('id');
       
        redeem_voucher(voucher_id);
        
    });
                </script>