

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
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="ajax_cart">
                                
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="cart__btn">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="cart__btn__continue">
                                    <a href="<?= base_url() ?>/main/product/<?= $shop['slug'] ?>" class="primary-btn">Continute shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="cart__btn__right">
                                    <a class="primary-btn" onclick="clearCart()">Clear shopping cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cart__right">
                        <div class="cart__coupon">
                            <h4>Promo Codes</h4>
                            <form>
                                <input type="text" id="promo_code" placeholder="Promo code">
                                <a id="apply_promo" class="text-white" style="padding-top:12px">APPLY</a>
                                <input type="hidden" id="promo_id" value="0">
                                <input type="hidden" id="promo_type_id" value="0">

                            </form>
                        </div>


                        <form id="checkout_form"  class="row contact_form"  method="post">
                        

                        <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Billing Details</h3>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="first" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['name']
                                              : '' ?>" placeholder="First name" name="name" required/>
                                </div>
                               
                                <div class="col-md-12 form-group p_star">
                                    <input type="tel" class="form-control" id="number" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['contact']
                                              : '' ?>" placeholder="Phone number" name="contact" required/>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="email" class="form-control" id="email" value="<?= isset($_SESSION['customer_data'])
                                                ? $_SESSION['customer_data']['email']
                                                : '' ?>"  placeholder="Email Address" name="email" required/>
                                </div>
                               
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['address']
                                              : '' ?>" placeholder="Address " name="address" required/>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add2" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['post_code']
                                              : '' ?>" placeholder="Post code" name="post_code" required/>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="city" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_data']['city']
                                              : '' ?>" placeholder="Town/City" name="city" required/>
                                </div>
                                <input type="hidden" name="shop_id" value="<?= $shop['shop_id'] ?>">
                                <input type="hidden" name="customer_id" value="<?= isset($_SESSION['customer_data'])
                                              ? $_SESSION['customer_id']
                                              : '0' ?>">

                                
                        </div>
                        
                    </div>
                </div>
                        <div class="cart__total">
                            <h4>Cart Total</h4>
                            <ul>
                            <li>Discount <span id="discount">RM 0</span></li>

                                <li>Delivery Fee  <span id="delivery_fee">RM <?= $shop['delivery_fee'] ?></span></li>

                                

                                <li>Subtotal <span id="subtotal"></span></li>
                                <li>Total <span id="grand_total"></span></li>
                            </ul>
                            <button type="submit" class="text-white">PROCEED TO CHECKOUT</button>
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </section>

    <script>
     $(document).on("submit", "#checkout_form", function(e){
        e.preventDefault();
      
        $('#preloader-active').css({
            'display': 'block'
        });
        var postParam = $(this).serializeArray();
        postParam.push ({name : 'grand_total' , value : $('#grand_total').text().replace("RM","")});
        postParam.push ({name : 'delivery_fee' , value : $('#delivery_fee').text().replace("RM","")});
        postParam.push ({name : 'subtotal' , value : $('#subtotal').text().replace("RM","")});
        postParam.push ({name : 'promo_id' , value : $('#promo_id').val()});

        

        // alert(JSON.stringify(postParam));
        $.post("<?= base_url('main/submit_order') ?>", postParam, function(data){
            data = jQuery.parseJSON(data);
            if(data.status){
                window.location.replace(data.url);
            }else{
                alert(data.message);
            }
            $('#preloader-active').css({
                'display': 'none'
            });
        });
      
    });
    </script>
        <!--================End Cart Area =================-->
