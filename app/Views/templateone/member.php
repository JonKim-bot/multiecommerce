<div class="c-member">
    <div class="c-member-back">
    </div>

    <div class="c-memberCON">
        <div class="container">
            <div class="c-mc-top">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-img">
                        <div class="c-profile-img">
                            <img src="<?= base_url() . $customer['banner']?>" alt="">
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
                            编辑
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-qr">

                        <div class="c-qr-img">
                        <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url() ?>/main/signup/<?= $_SESSION['customer_data']['referal_code'] ?>&choe=UTF-8" >                        </div>
                        <div class="c-btn" data-toggle="modal" data-target="#qrmodal">
                            分享链接
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-mc-bottom">
                <div class="c-nav-pill">
                    <ul class="nav nav-pills mb-3 c-left" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-voucher-tab" data-toggle="pill" href="#pills-voucher" role="tab" aria-controls="pills-voucher" aria-selected="true">
                                优惠卷
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-gift-tab" data-toggle="pill" href="#pills-gift" role="tab" aria-controls="pills-gift" aria-selected="false">
                                礼品
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-point-tab" data-toggle="pill" href="#pills-point" role="tab" aria-controls="pills-point" aria-selected="false">
                                分数
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-donwline-tab" data-toggle="pill" href="#pills-donwline" role="tab" aria-controls="pills-donwline" aria-selected="false">
                                下线
                            </a>
                        </li>
                    </ul>
                    <div class="c-right">
                        <div class="c-point">
                            <p>分数总分</p>
                            <h3><?= $point ?></h3>
                        </div>
                    </div>
                </div>
                <div class="tab-content c-pillCT" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-voucher" role="tabpanel" aria-labelledby="pills-voucher-tab">
                        <div class="voucher_col">

                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-gift" role="tabpanel" aria-labelledby="pills-gift-tab">
                        <div class="c-gift">
                            <h4><span>我的礼品</span></h4>
                            <div class="c-giftLIST">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn" data-toggle="modal" data-target="#giftmodal">查看详情</div>
                                                <div class="c-btn c-red">兑换</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn" data-toggle="modal" data-target="#giftmodal">查看详情</div>
                                                <div class="c-btn c-red">兑换</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn" data-toggle="modal" data-target="#giftmodal">查看详情</div>
                                                <div class="c-btn c-red">兑换</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="c-gift-other">
                            <h4><span>其他礼品</span></h4>
                            <div class="c-giftLIST">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="c-card">
                                            <div class="c-productImg">
                                                <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" alt="">
                                            </div>
                                            <div class="c-btnBOX">
                                                <div class="c-btn" data-toggle="modal" data-target="#giftmodal">查看详情</div>
                                                <!-- <div class="c-btn c-red">兑换</div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-point" role="tabpanel" aria-labelledby="pills-point-tab">
                        <div class="c-points">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">交易</th>
                                            <th scope="col">备注</th>
                                            <th scope="col">创建日期</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10.53</td>
                                            <td>Points for 0123456789 on orders 30001656</td>
                                            <td>2021-06-19- 07:40:19</td>
                                        </tr>
                                        <tr>
                                            <td>10.53</td>
                                            <td>Points for 0123456789 on orders 30001656</td>
                                            <td>2021-06-19- 07:40:19</td>
                                        </tr>
                                        <tr>
                                            <td>10.53</td>
                                            <td>Points for 0123456789 on orders 30001656</td>
                                            <td>2021-06-19- 07:40:19</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-donwline" role="tabpanel" aria-labelledby="pills-donwline-tab">
                        <div class="c-points">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">交易</th>
                                            <th scope="col">备注</th>
                                            <th scope="col">创建日期</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10.53</td>
                                            <td>Points for 0123456789 on orders 30001656</td>
                                            <td>2021-06-19- 07:40:19</td>
                                        </tr>
                                        <tr>
                                            <td>10.53</td>
                                            <td>Points for 0123456789 on orders 30001656</td>
                                            <td>2021-06-19- 07:40:19</td>
                                        </tr>
                                        <tr>
                                            <td>10.53</td>
                                            <td>Points for 0123456789 on orders 30001656</td>
                                            <td>2021-06-19- 07:40:19</td>
                                        </tr>
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
        <div class="modal-dialog" role="document">
            <div class="modal-content c-modal-content">
                <div class="modal-header c-modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close c-close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body c-modal-body">

                    <div class="c-qr-title">
                        <h4>推荐你的好友</h4>
                        <h4>享受优惠卷奖励</h4>
                    </div>
                    <div class="c-qr-img">
                    <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?= base_url() ?>/main/signup/<?= $_SESSION['customer_data']['referal_code'] ?>&choe=UTF-8" >
                
                    </div>
                    <input type="text" class="form-control" id="link" value="<?= base_url() ?>/main/signup/<?= $_SESSION['customer_data']['referal_code'] ?>" readonly>

                </div>
                <div class="modal-footer c-modal-footer">
                    <button type="button" onclick="copy()" class="btn btn-secondary c-btn" >复制链接</button>
                </div>
            </div>
        </div>
    </div>
   
    <div class="modal fade" id="giftmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content c-modal-content">
                <div class="modal-header c-modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close c-close" data-dismiss="modal" aria-label="Close">
                        Close
                    </button>
                </div>
                <div class="modal-body c-modal-body">


                    <div class="c-voucher-img">
                        <img src="<?= base_url() ?>/assets/assets/img/unnamed.png" alt="">
                    </div>
                    <div class="c-voucher-title">
                        <h4>礼品的名字</h4>
                        <p>所需点数: 22</p>
                        <p>有效日期: 2021/7/10</p>
                        <p>有效日期: 2021/7/10</p>

                        <!-- <p>使用日期: 2021/7/12</p> -->
                    </div>
                </div>
                <div class="modal-footer c-modal-footer">
                    <button type="button" class="btn btn-secondary c-btn" data-dismiss="modal">兑换</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="vouchermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content c-modal-content">
                <div class="modal-header c-modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                    <button type="button" class="close c-close" data-dismiss="modal" aria-label="Close">
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
    <p><b>所需点数:</b> <span class="voucher_point"></span></p>
    <p><b>有效日期到: </b ><span class="voucher_valid"></span></p>
    <p><b>你会得到什么:</b ><span class="what_you_get"></span> </p>             
</div>
                </div>
                <div class="modal-footer c-modal-footer">
                    <button type="button" class="btn btn-secondary c-btn redeem_voucher redeem_voucher_btn" data-dismiss="modal">兑换</button>
                </div>
            </div>
        </div>
    </div>

<script>
   
            
    function get_voucher_detail(voucher_id,is_self){
    let postParam = {
                slug : "<?= $shop['slug'] ?>",
                voucher_id : voucher_id,
                is_self : is_self,
            }
            $.post("<?= base_url('main/get_voucher_detail') ?>", postParam, function(data){
                // $('#voucher_detail').html(html);
                data = JSON.parse(data);
                var voucher_data = data.data;
                $(".redeem_voucher_btn").attr("id",voucher_id);
                $('.voucher_point').text(voucher_data.redeem_point);
                $('.what_you_get').text(voucher_data.what_you_get);
                $('.voucher_valid').text(voucher_data.voucher_valid);
                $('.voucher_name').text(voucher_data.voucher);
                $('.voucher_description').text(voucher_data.description);
                $(".voucher_img").attr("src","<?= base_url() ?>" + voucher_data.banner);
                if(is_self == 0){
                       $('.redeem_voucher_btn').show();
                }else{
                    $('.redeem_voucher_btn').hide();

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

function redeem_voucher(voucher_id){
            let postParam = {
                slug : "<?= $shop['slug'] ?>",
                voucher_id : voucher_id,
            }
            $.post("<?= base_url('main/redeem_voucher') ?>", postParam, function(data){
                // $('.voucher_col').html(html);
                data = JSON.parse(data);
                if(data.status){

                    Swal.fire({
                        title: data.title,
                        text: data.message,
                        type: 'success'
                    });
                }else{
                    Swal.fire({
                        title: data.title,
                        text: data.message,
                        type: 'error'
                    });
                }
                load_voucher();
            });
        }
        function redeem(gift_id){
            let postParam = {
                slug : "<?= $shop['slug'] ?>",
                gift_id : gift_id,
            }
            $.post("<?= base_url('main/redeem') ?>", postParam, function(html){
                // $('.gift_col').html(html);
                Swal.fire({
                    title: "Redeem done",
                    text: "Please wait for admin to verify your gift and contact you",
                    type: 'success'
                });
            });
        }
       
    
$(".redeem_voucher").on("click", function() {
        
        var voucher_id = $(this).attr('id');
        var amount = $(this).attr('amount');
       
        redeem_voucher(voucher_id);
    });
    function load_voucher(selected = 1){
             let postParam = {
                 slug : "<?= $shop['slug'] ?>",
             }
             $.post("<?= base_url('main/get_voucher') ?>", postParam, function(html){
                 $('.voucher_col').html(html);
                 
             });
         }
         
         load_voucher();
</script>