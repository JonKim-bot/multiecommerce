
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
                    <div class="cart__right" style="padding-left:0px">
                        <div class="billing-address">
                            <div class="row">
                                <div class="col-md-12">
                             
                                    <h4>Tracking Link * Merchant Will put tracking link here if got any</h4>
                                   <p>
                                   <a style="color:blue" target="_blank" href="<?= $orders['tracking_link'] == "" ? base_url() . "/main/view_order_status/" . $orders['order_code'] : $orders['tracking_link'] ?>">
                                   <?= $orders['tracking_link'] == "" ? base_url() . "/main/view_order_status/" . $orders['order_code'] : $orders['tracking_link'] ?>
                                   </a>
                                   </p>
                                </div>
                                <div class="col-md-6">
                                
                                <h4>Status</h4>
                                <p><?= $orders['orders_status'] ?></p>
                                <h4>Receiver</h4>
                    
                                    <p><?= $orders['full_name'] ?></p>
                                    <h4>Contact Number</h4>
                                    <p><?= $orders['contact'] ?></p>
                                </div>
                                <div class="col-md-6">
                                <h4>Payment Status
                                    </h4>
                                    <p><?= $orders['is_paid'] == 1 ? "Paid" : 'Not Paid' ?></p>
                                    <h4>Address
                                    </h4>
                                    <p><?= $orders['address'] ?></p>
                                    <h4>Date & Time:</h4>
                                    <p><?= $orders['created_date_'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-9 col-md-6">

                    <div class="section-top-border">
                        <div class="row">
                            <div class="col-md-4">
                            <h3 class="mb-30">Gift Aligned</h3>

                                <img src="assets/img/elements/d.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-4">
                            <h3 class="mb-30">Gift Aligned</h3>

                                <img src="assets/img/elements/d.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="col-md-4">
                            <h3 class="mb-30">Gift Aligned</h3>

                                <img src="assets/img/elements/d.jpg" alt="" class="img-fluid">
                            </div>
                            
                        </div>
                    </div>
                    
                </div> -->
                <?php if(in_array(2,$shop_function)){ ?>

                <div class="col-lg-10 col-md-6">

                <section class="items-product1 pt-30">
            <div class="container">
            <h1 class="text-center">Purchase to get gift</h1>
                <div class="row">
                <?php foreach($shop_gift as $row){ ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="single-items mb-20">
                            <div class="items-img">
                                <img src="<?= base_url() . $row['banner']?>" alt="">
                            </div>
                            <div class="items-details">
                                <h5 class="text-white"><a href="<?= base_url() . "/main/gift_detail/" .   $row['gift_id'] ?>">Purchase > RM <?= $row['order_amount'] ?></a></h5>
                                <a href="<?= base_url() . "/main/gift_detail/" .   $row['gift_id'] ?>" class="browse-btn" target="_blank">View More</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                   
                </div>
            </div>
        </section>
        </div>
        <?php } ?>


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



                        <?php } ?>
                        <?php } ?>
                        </div>
                        
                      
                        
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
    //premioer pay
    // $.post("<?= base_url('main/make_payment') ?>", postParam, function(data){
    //     data = JSON.parse(data);
      
    //     if(payment_method_id == 3){
    //             // pay by online banking
    //         if(data.code == 0){
    //             location.href = (data.data);
    //         }else{
    //             alert(data.message);
    //         }
    //     }else{
    //         // pay by others
    //         if(data.status){
    //             window.open (data.url);
    //         }
    //     }
    // });
    //senang pay
    $.post("<?= base_url('main/make_payment') ?>", postParam, function(data){
        data = JSON.parse(data);
      
        if(payment_method_id == 3){
                // pay by online banking
                window.open (data.url);

        }else{
            // pay by others
            if(data.status){
                window.open (data.url);
            }
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