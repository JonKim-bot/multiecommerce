
    <main>
        <!-- Hero area Start-->
        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Cart</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Cart</a></li> 
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <!--  Hero area End -->
        <!--================Cart Area =================-->
        <section class="cart spad">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th style="text-align:right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php foreach($orders['order_detail'] as $row){ ?>
                                <tr>
                                    <td class="cart__item">
                                        <div class="cart__item__pic">
                                            <img src="<?= base_url() . $row['image'] ?>" alt="">
                                        </div>
                                        <div class="cart__item__text ">
                                            <h6><?= $row['product_name'] ?></h6>
                                            <h6>Quantity : <?= $row['product_quantity'] ?></h6>

                                            <span>RM <?= $row['product_price'] ?></span>
                                            <?php if(!empty($row['order_detail_option'])){ ?>
                                            <?php foreach($row['order_detail_option'] as $row_option){ ?>
                                                <li><?= $row_option['option_name'] ?> - <?= $row_option['product_option_name'] ?><br> RM <?= $row_option['selection_price'] ?></li>
                                            <?php  } ?>
                                            <?php  } ?>
                                        </div>
                                    </td>
                                   
                                    <td class="cart__price text-right" style="text-align:right">RM <?= $row['product_total_price'] ?></td>
                                </tr>
                                <?php } ?>
                               
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="cart__right">
                        <div class="billing-address">
                            <div class="row">
                                <div class="col-md-6">
                                <h4>Status</h4>
                                <p><?= $orders['orders_status'] ?></p>
                                <h4>Receiver</h4>
                    
                                    <p><?= $orders['full_name'] ?></p>
                                    <h4>Contact Number</h4>
                                    <p><?= $orders['contact'] ?></p>
                                </div>
                                <div class="col-md-6">
                                <?php if($orders['payment_method_id'] == 3){ ?>
                                <h4>Payment Status
                                    </h4>
                                    <p><?= $orders['is_paid'] == 1 ? "Paid" : 'Not Paid' ?></p>
                                    <?php } ?>
                                    <h4>Address
                                    </h4>
                                    <p><?= $orders['address'] ?></p>
                                    <h4>Date & Time:</h4>
                                    <p><?= $orders['created_at'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                


                <div class="col-lg-9 col-md-6">
                    <div class="cart__right text-center mb-5 bg-dark text-white mt-3 p-5" style="border-radius:5px;">
                    <?php if($orders['payment_method_id'] == 3 && $orders['is_paid'] == "1"){ ?>

                        <?php }else{ ?>

                        <div class="billing-address">
                        <h4>Payment Method
                                    </h4>
                        <?php foreach ($payment_method as $row) { ?>
                                <div class="radio">
                                <?php if (
                                    in_array(
                                        $row['payment_method_id'],
                                        $shop_payment_method
                                    )
                                ) { ?>
                                <label><input type="radio" class="paymentmethod mt-2" name="optradio" id="payment_method_<?= $row[
                                    'payment_method_id'
                                ] ?>" > 
                                <?= $row['payment_method'] ?>
                                </label>
                                <?php } ?>
                                </div>
                            </div>



                        <?php } ?>
                        <?php } ?>
                        
                      
                        
                            <div class="row">
                            <?php if($orders['payment_method_id'] == 3 && $orders['is_paid'] == "1"){ ?>

                               <a class="btn btn-primary m-auto w-50 p-t-20" id="" style="margin-top:20px">Paid</a>
                            <?php }else{ ?>
                                <a class="btn btn-primary m-auto w-50 p-t-20" id="payment_button" style="margin-top:20px">Pay</a>

                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--================End Cart Area =================-->
    </main>

<script>

$("#payment_button").on('click', function(){
    var payment_method_id = getPaymentMethod();
    var postParam = {
        orders_id : <?= $orders['orders_id'] ?>,
        payment_method_id : payment_method_id,
    }
    $.post("<?= base_url('main/make_payment') ?>", postParam, function(data){
        data = JSON.parse(data);
        if(data.status){
            window.open (data.url);
        }
    });

});
function getPaymentMethod(){
    var online_banking = document.getElementById('payment_method_1');
    var cod = document.getElementById('payment_method_2');
    var credit_card = document.getElementById('payment_method_3');
    if(online_banking != null && online_banking.checked ) {

        return "1";

    }else if( cod != null && cod.checked) {

        return "2";
    }else if(credit_card != null && credit_card.checked){

        return "3";

    }else{
        
        Swal.fire({
                title: "Error",
                text: "Please select a payment method",
                type: 'error'
        })
        return;
    }
}


</script>