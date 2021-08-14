<div class="c-member">
    <div class="c-member-back">
    </div>

    <div class="c-memberCON">
        <div class="container c-container">
            <div class="c-mc-top">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-img">
                        <div class="c-profile-img">
                            <img src="<?= base_url() . $customer['banner'] ?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-info">
                        <div class="c-name">
                            <h4><?= $customer['name'] ?></h4>
                        </div>
                        <div class="c-contact">
                            <p><?= $customer['email'] ?></p>
                            <p><?= $customer['contact'] ?></p>
                        </div>
                        <div class="c-address">
                            <p><?= $customer['address'] ?></p>
                        </div>
                        <a class="c-btn" href="<?= base_url() ?>/main/profile">

                            <?= $lang['edit_profile_detail'] ?>
                        </a>
                    </div>
                    <?php if (in_array(6, $shop_function) || in_array(8, $shop_function)) { ?>

                        <div class="col-lg-3 col-md-12 col-sm-12 col-qr">

                            <div class="c-qr-img">
                                <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url() ?>/main/signup/<?= $_SESSION['customer_data']['referal_code'] ?>&choe=UTF-8">
                            </div>
                            <div class="c-btn" data-toggle="modal" data-target="#qrmodal">
                                <?= $lang['share_link'] ?>

                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="c-mc-bottom">
                <div class="c-nav-pill">
                    <ul class="nav nav-pills mb-3 c-left" id="pills-tab" role="tablist">
                        <?php if (in_array(1, $shop_function)) { ?>

                            <li class="nav-item">
                                <a class="nav-link active" id="pills-voucher-tab" data-toggle="pill" href="#pills-voucher" role="tab" aria-controls="pills-voucher" aria-selected="true">
                                    <?= $lang['voucher'] ?>

                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(2, $shop_function)) { ?>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-gift-tab" data-toggle="pill" href="#pills-gift" role="tab" aria-controls="pills-gift" aria-selected="false">
                                    <?= $lang['gift'] ?>

                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(6, $shop_function)) { ?>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-point-tab" data-toggle="pill" href="#pills-point" role="tab" aria-controls="pills-point" aria-selected="false">
                                    <?= $lang['point'] ?>

                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array(6, $shop_function) || in_array(8, $shop_function)) { ?>

                            <li class="nav-item">
                                <a class="nav-link" id="pills-donwline-tab" data-toggle="pill" href="#pills-donwline" role="tab" aria-controls="pills-donwline" aria-selected="false">
                                    <?= $lang['downline'] ?>

                                </a>
                            </li>
                        <?php } ?>

                    </ul>
                    <?php if (in_array(6, $shop_function)) { ?>

                        <div class="c-right">
                            <div class="c-point">
                                <p><?= $lang['total_point'] ?></p>
                                <h3><?= $point ?></h3>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="tab-content c-pillCT" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-voucher" role="tabpanel" aria-labelledby="pills-voucher-tab">
                        <div class="voucher_col">

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-gift" role="tabpanel" aria-labelledby="pills-gift-tab">
                        <div class="gift_col">

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-point" role="tabpanel" aria-labelledby="pills-point-tab">
                        <div class="c-points">
                            <div class="table-responsive" style="height:300px">

                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?= $lang['transaction'] ?></th>
                                            <th scope="col"><?= $lang['remarks'] ?></th>
                                            <th scope="col"><?= $lang['created_date'] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($point_history as $row) { ?>
                                            <tr>
                                                <td><?= $row['transaction'] ?></td>
                                                <td><?= $row['remarks'] ?></td>
                                                <td><?= $row['created_date'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-donwline" role="tabpanel" aria-labelledby="pills-donwline-tab">
                        <div class="c-points">
                            <div class="table-responsive" style="height:300px">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?= $lang['email'] ?></th>
                                            <th scope="col"><?= $lang['contact'] ?></th>
                                            <th scope="col"><?= $lang['register_date'] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($downline as $row) { ?>
                                            <tr>
                                                <td><?= $row['email'] ?></td>

                                                <td><?= $row['contact'] ?></td>
                                                <td><?= $row['created_date'] ?></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="qrmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content c-modal-content">
                <div class="modal-header c-modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close c-close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body c-modal-body">

                    <div class="c-qr-title">
                        <h4><?= $lang['refer_friend'] ?></h4>
                        <h4><?= $lang['enjoy_voucher'] ?></h4>
                        <h4>---<?= $customer['referal_code'] ?>---</h4>
                    </div>
                    <div class="c-qr-img">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url() ?>/main/signup/<?= $_SESSION['customer_data']['referal_code'] ?>&choe=UTF-8">


                    </div>
                    <input type="text" class="form-control" id="link" value="<?= base_url() ?>/main/signup/<?= $_SESSION['customer_data']['referal_code'] ?>" readonly>

                </div>
                <div class="modal-footer c-modal-footer">
                    <button type="button" onclick="copy()" class="btn btn-secondary c-btn"><?= $lang['copy_link'] ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="giftmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content c-modal-content">
                <div class="modal-header c-modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close c-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body c-modal-body">


                    <div class="c-voucher-img">
                        <img class="gift_img" alt="">
                    </div>
                    <div class="c-voucher-title">
                        <h4 class='gift_name'></h4>
                        <p class="gift_description"></p>
                        <p><b><?= $lang['point_needed'] ?>:</b> <span class="gift_point"></span></p>
                        <p><b><?= $lang['valid_until'] ?>: </b><span class="gift_valid"></span></p>
                        <p><b><?= $lang['what_you_get'] ?>:</b><span class="what_you_get"></span> </p>
                    </div>
                </div>
                <div class="modal-footer c-modal-footer">
                    <!-- <button type="button" class="btn btn-secondary c-btn redeem_gift redeem_gift_ redeem_gift_btn" data-dismiss="modal"><?= $lang['exchange'] ?></button> -->
                    <button type="button" class="btn btn-secondary c-btn  order_btn_gift" data-dismiss="modal"><?= $lang['order'] ?></button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="vouchermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content c-modal-content">
                <div class="modal-header c-modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close c-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body c-modal-body">


                    <div class="c-voucher-img">
                        <img class="voucher_img" alt="">
                    </div>
                    <div class="c-voucher-title">
                        <h4 class='voucher_name'></h4>
                        <p class="voucher_description"></p>
                        <p><b><?= $lang['point_needed'] ?>:</b> <span class="voucher_point"></span></p>
                        <p><b><?= $lang['valid_until'] ?>: </b><span class="voucher_valid"></span></p>
                        <p><b><?= $lang['what_you_get'] ?>:</b><span class="what_you_get"></span> </p>
                    </div>
                </div>
                <div class="modal-footer c-modal-footer">
                    <button type="button" class="btn btn-secondary c-btn redeem_voucher redeem_voucher_btn" data-dismiss="modal"><?= $lang['exchange'] ?></button>
                    <button type="button" class="btn btn-secondary c-btn  order_btn" data-dismiss="modal"><?= $lang['order'] ?></button>

                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="customer_voucher_id_">
    <input type="hidden" id="customer_gift_id_">

    <script>
        function get_gift_detail(gift_id, is_self) {
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
                gift_id: gift_id,
                is_self: is_self,
            }
            $.post("<?= base_url('main/get_gift_detail') ?>", postParam, function(data) {
                // $('#gift_detail').html(html);
                data = JSON.parse(data);
                var gift_data = data.data;
                $(".redeem_gift_btn").attr("id", gift_id);
                $('.gift_point').text(gift_data.order_amount);
                $('.what_you_get').text(gift_data.what_you_get);
                $('.gift_valid').text(gift_data.valid_until);
                $('.gift_name').text(gift_data.gift);
                $('.gift_description').text(gift_data.description);
                $(".gift_img").attr("src", "<?= base_url() ?>" + gift_data.banner);
                if (is_self == 0) {
                    $('.redeem_gift_btn').show();
                    $('.order_btn_gift').hide();
                } else {
                    $('.redeem_gift_btn').hide();
                    $('.order_btn_gift').show();

                }


            });
        }
        function order_voucher(){
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
                customer_voucher_id: $('#customer_voucher_id_').val(),
            }
            $.post("<?= base_url('main/submit_order_voucher') ?>", postParam, function(data) {
                // $('#voucher_detail').html(html);
                data = JSON.parse(data);
                if(data.status){
                    Swal.fire({
                        text: "Voucher order being processed",
                        type: 'success'
                    })
                    window.location.reload();
                }else{
                    Swal.fire({
                        text: data.message,
                        type: 'error'
                    })
                }


            });
        }

        function order_gift(){
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
                customer_gift_id: $('#customer_gift_id_').val(),
            }
            $.post("<?= base_url('main/submit_order_gift') ?>", postParam, function(data) {
                // $('#voucher_detail').html(html);
                data = JSON.parse(data);
                if(data.status){
                    Swal.fire({
                        text: "Gift order being processed",
                        type: 'success'
                    })
                    window.location.reload();
                }
                else{
                    Swal.fire({
                        text: data.message,
                        type: 'error'
                    })
                }
            });
        }

        function get_voucher_detail(voucher_id, is_self) {
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
                voucher_id: voucher_id,
                is_self: is_self,
            }
            $.post("<?= base_url('main/get_voucher_detail') ?>", postParam, function(data) {
                // $('#voucher_detail').html(html);
                data = JSON.parse(data);
                var voucher_data = data.data;
                $(".redeem_voucher_btn").attr("id", voucher_id);
                $('.voucher_point').text(voucher_data.redeem_point);
                $('.what_you_get').text(voucher_data.what_you_get);
                $('.voucher_valid').text(voucher_data.valid_until);
                $('.voucher_name').text(voucher_data.voucher);
                $('.voucher_description').text(voucher_data.description);
                $(".voucher_img").attr("src", "<?= base_url() ?>" + voucher_data.banner);
                if (is_self == 0) {
                    $('.redeem_voucher_btn').show();
                    $('.order_btn').hide();

                } else {
                    $('.redeem_voucher_btn').hide();
                    $('.order_btn').show();

                }

            });
        }
        
        function copy() {
            var copyText = document.getElementById("link");
            copyText.select();
            copyText.setSelectionRange(0, 99999)
            document.execCommand("copy");
            Swal.fire({
                text: "Copied the text: " + copyText.value,
                type: 'success'
            })
        }

        function redeem_voucher(voucher_id) {
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
                voucher_id: voucher_id,
            }
            $.post("<?= base_url('main/redeem_voucher') ?>", postParam, function(data) {
                // $('.voucher_col').html(html);
                data = JSON.parse(data);
                if (data.status) {

                    Swal.fire({
                        title: data.title,
                        text: data.message,
                        type: 'success'
                    });
                } else {
                    Swal.fire({
                        title: data.title,
                        text: data.message,
                        type: 'error'
                    });
                }
                load_voucher();
            });
        }

        function redeem(gift_id) {
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
                gift_id: gift_id,
            }
            $.post("<?= base_url('main/redeem') ?>", postParam, function(html) {
                // $('.gift_col').html(html);
                Swal.fire({
                    title: "Redeem done",
                    text: "Please wait for admin to verify your gift and contact you",
                    type: 'success'
                });
            });
            load_gift();
        }

        function redeem(gift_id) {
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
                gift_id: gift_id,
            }
            $.post("<?= base_url('main/redeem') ?>", postParam, function(html) {
                // $('.gift_col').html(html);
                Swal.fire({
                    title: "Redeem done",
                    text: "Please wait for admin to verify your gift and contact you",
                    type: 'success'
                });
            });
        }
        $(".order_btn").on("click", function() {
            order_voucher();
        });

        $(".order_btn_gift").on("click", function() {
            order_gift();
        });

        $(".c-close").on("click", function() {
            $('#giftmodal').modal('hide');
            $('#voucherModal').modal('hide');
            $('#redeem_voucher').modal('hide');
        });
        $(".redeem_voucher").on("click", function() {

            var voucher_id = $(this).attr('id');
            var amount = $(this).attr('amount');

            redeem_voucher(voucher_id);
        });

        function load_voucher(selected = 1) {
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
            }
            $.post("<?= base_url('main/get_voucher') ?>", postParam, function(html) {
                $('.voucher_col').html(html);

            });
        }

        function load_gift(selected = 1) {
            let postParam = {
                slug: "<?= $shop['slug'] ?>",
            }
            $.post("<?= base_url('main/get_gift') ?>", postParam, function(html) {
                $('.gift_col').html(html);

            });
        }
        load_gift();
        load_voucher();
    </script>