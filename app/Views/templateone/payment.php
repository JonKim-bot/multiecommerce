<main>
   <div class="c-payment-back">
      <!-- <div class="c-header">
         <h1><?= $lang['login'] ?></h1>
      </div> -->
   </div>
   <!-- Hero area Start-->
   <!-- <div class="hero-area section-bg2">
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
      </div> -->
   <!--  Hero area End -->
   <!--================Cart Area =================-->
   <section class="c-payment-form">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-10" id="cart_product_padding">
               <div class="cart__table">
                  <table>
                     <thead style="border-bottom:1px solid black">
                        <tr>
                           <th><?= $lang['product'] ?></th>
                           <th style="text-align:right"><?= $lang['total'] ?></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($orders['order_detail'] as $row) { ?>
                           <tr>
                              <td class="cart__item">
                                 <div class="cart__item__pic">
                                    <img src="<?= base_url() . $row['image'] ?>" alt="" style="border-radius:10px">
                                 </div>
                                 <div class="cart__item__text ">
                                    <h6><?= $row['product_name'] ?></h6>
                                    <h6><?= $lang['quantity'] ?> : <?= $row['product_quantity'] ?></h6>
                                    <ul>
                                       <?php if (!empty($row['order_detail_option'])) { ?>
                                          <?php foreach ($row['order_detail_option'] as $row_option) { ?>
                                             <li><?= $row_option['option_name'] ?> - <?= $row_option['product_option_name'] ?><br> RM <?= $row_option['selection_price'] ?></li>
                                          <?php
                                          } ?>
                                       <?php
                                       } ?>
                                    </ul>
                                 </div>
                              </td>
                              <td class="cart__price text-right" style="text-align:right">RM <?= $row['product_total_price'] ?></td>
                           </tr>
                        <?php
                        } ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class="col-10" style="">
               <div class="cart__right" style="padding-left:0px">
                  <div class="billing-address">
                     <div class="row">
                        <div class="col-md-12" style="word-break: break-word;">
                           <h4><?= $lang['tracking_link'] ?></h4>
                           <p>
                              <a style="color:blue" target="_blank" href="<?= $orders['tracking_link'] == "" ? base_url() . "/main/view_order_status/" . $orders['order_code'] : $orders['tracking_link'] ?>">
                                 <?= $orders['tracking_link'] == "" ? base_url() . "/main/view_order_status/" . $orders['order_code'] : $orders['tracking_link'] ?>
                              </a>
                           </p>
                        </div>
                        <div class="col-md-6">
                           <h4><?= $lang['order_status'] ?></h4>
                           <p><?= $orders['orders_status'] ?></p>
                           <h4><?= $lang['name'] ?></h4>
                           <p><?= $orders['full_name'] ?></p>
                           <h4><?= $lang['contact_number'] ?></h4>
                           <p><?= $orders['contact'] ?></p>
                        </div>

                        <div class="col-md-6">
                           <h4><?= $lang['payment_status'] ?>
                           </h4>
                           <p><?= $orders['is_paid'] == 1 ? $lang['paid'] : $lang['not_paid'] ?></p>
                           <h4><?= $lang['address'] ?>
                           </h4>
                           <p><?= $orders['address'] ?></p>
                           <h4><?= $lang['order_date'] ?></h4>
                           <p><?= $orders['created_date_'] ?></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-10 c-payment-btm">
               <div class="row">
                  <?php if (in_array(2, $shop_function)) { ?>
                     <div class="col-lg-8 col-md-12">
                        <section class="items-product1 c-cart-left">
                           <div>
                              <h3 class="text-left c-title"><?= $lang['purchase_to_get_gift'] ?></h3>
                              <div class="row">
                                 <?php foreach ($shop_gift as $row) { ?>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                       <div class="single-items mb-20">
                                          <div class="items-img">
                                             <img src="<?= base_url() . $row['banner'] ?>" alt="">
                                          </div>

                                       </div>
                                       <a class="btn p-t-20 m-b-20" style="margin-bottom:20px"><?= $lang['total'] ?> > <?= $row['order_amount'] ?></a>
                                    </div>
                                 <?php
                                 } ?>
                              </div>
                           </div>
                        </section>
                     </div>
                     <div class="col-lg-4 col-md-12">
                        <div class="cart__right c-cart-right text-dark" style="border-radius:5px;">
                           <?php if ($orders['payment_method_id'] == 3 && $orders['is_paid'] == "1") { ?>
                           <?php
                           } else { ?>
                              <div class="">
                                 <h4><?= $lang['payment_method'] ?>
                                 </h4>
                                 <?php foreach ($payment_method as $row) { ?>
                                    <div class="radio">
                                       <?php if (in_array($row['payment_method_id'], $shop_payment_method)) { ?>
                                          <label class="payment_label">
                                             <input type="radio" class="paymentmethod c-single mt-2" name="optradio" id="payment_method_<?= $row['payment_method_id'] ?>">
                                             <?= $row['payment_method'] ?>
                                          </label>
                                       <?php
                                       } ?>
                                    </div>
                                 <?php
                                 } ?>
                                 <?php if ($orders['payment_method_id'] == 3 && $orders['is_paid'] == "1") { ?>
                                    <a class="btn btn-payment" id="" style=""><?= $lang['paid'] ?></a>
                                 <?php
                                 } else { ?>
                                    <a class="btn btn-payment" id="payment_button" style=""><?= $lang['checkout'] ?></a>
                                 <?php
                                 } ?>
                              <?php
                           } ?>
                              </div>
                              <!-- <div class="row">
                                 <?php if ($orders['payment_method_id'] == 3 && $orders['is_paid'] == "1") { ?>
                                    <a class="btn" id="" style="margin-top:20px"><?= $lang['paid'] ?></a>
                                 <?php
                                 } else { ?>
                                    <a class="btn" id="payment_button" style="margin-top:20px"><?= $lang['checkout'] ?></a>
                                 <?php
                                 } ?>
                              </div> -->
                        </div>
                     </div>
                  <?php
                  } else { ?>
                     <div class="col-lg-12 col-md-12">
                        <div class="cart__right text-center mb-5 text-dark mt-3 p-5" style="border-radius:5px;">
                           <?php if ($orders['payment_method_id'] == 3 && $orders['is_paid'] == "1") { ?>
                           <?php
                           } else { ?>
                              <div class="billing-address">
                                 <h4><?= $lang['payment_method'] ?>
                                 </h4>
                                 <?php foreach ($payment_method as $row) { ?>
                                    <div class="radio">
                                       <?php if (in_array($row['payment_method_id'], $shop_payment_method)) { ?>
                                          <label class="payment_label">
                                             <input type="radio" class="paymentmethod c-single mt-2" name="optradio" id="payment_method_<?= $row['payment_method_id'] ?>">
                                             <?= $row['payment_method'] ?>
                                          </label>
                                       <?php
                                       } ?>
                                    </div>
                                 <?php
                                 } ?>
                              <?php
                           } ?>
                              </div>
                              <div class="row">
                                 <?php if ($orders['payment_method_id'] == 3 && $orders['is_paid'] == "1") { ?>
                                    <a class="btn m-auto w-50 p-t-20" id="" style="margin-top:20px"><?= $lang['paid'] ?></a>
                                 <?php
                                 } else { ?>
                                    <a class="btn m-auto w-50 p-t-20" id="payment_button" style="margin-top:20px"><?= $lang['checkout'] ?></a>
                                 <?php
                                 } ?>
                              </div>
                        </div>
                     </div>
                  <?php } ?>

               </div>
            </div>
         </div>
      </div>
   </section>
   </div>
   <!--================End Cart Area =================-->
</main>
<script>
   $(".radio").on('change', function(e) {
      $(".radio").css('background', 'white');

      $(this).css('background', '<?= $shop['colour'] ?>');

   });

   $("#payment_button").on('click', function() {
      var payment_method_id = getPaymentMethod();

      var postParam = {
         orders_id: <?= $orders['orders_id'] ?>,
         payment_method_id: payment_method_id,
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
      $('#payment_button').text("Processing...");
      $('#payment_button').prop('disabled', true);



      $.post("<?= base_url('main/make_payment') ?>", postParam, function(data) {
         data = JSON.parse(data);
         $('#payment_button').text("Pay");
         $('#payment_button').prop('disabled', false);
         if (payment_method_id == 3) {
            // pay by online banking
            windowLocation(data.url);

         } else {
            // pay by others
            if (data.status) {
               windowLocation(data.url);
            }
         }
      });
   });

   function windowLocation(url) {
      var X = setTimeout(function() {
         window.location.replace(url);
         return true;
      }, 300);

      if (window.location = url) {
         clearTimeout(X);
         return true;
      } else {
         if (window.location.href = url) {
            clearTimeout(X);
            return true;
         } else {
            clearTimeout(X);
            window.location.replace(url);
            return true;
         }
      }
      return false;
   };

   function getPaymentMethod() {
      var online_banking = document.getElementById('payment_method_1');
      var cod = document.getElementById('payment_method_2');
      var credit_card = document.getElementById('payment_method_3');
      if (online_banking != null && online_banking.checked) {

         return "1";

      } else if (cod != null && cod.checked) {

         return "2";
      } else if (credit_card != null && credit_card.checked) {

         return "3";

      } else {

         Swal.fire({
            title: "Error",
            text: "Please select a payment method",
            type: 'error'
         })
         return;
      }
   }
</script>