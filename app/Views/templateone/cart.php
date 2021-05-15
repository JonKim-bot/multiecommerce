
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
                                    <a href="#" class="primary-btn">Continute shopping</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="cart__btn__right">
                                    <a href="#" class="primary-btn">Clear shopping cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="cart__right">
                        <div class="cart__coupon">
                            <h4>Discount Codes</h4>
                            <form action="#">
                                <input type="text" placeholder="Coupon code">
                                <button type="submit">APPLY</button>
                            </form>
                        </div>
                        <div class="billing_details">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Billing Details</h3>
                            <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="first" name="name" />
                                    <span class="placeholder" data-placeholder="First name"></span>
                                </div>
                               
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="number" name="number" />
                                    <span class="placeholder" data-placeholder="Phone number"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="email" name="compemailany" />
                                    <span class="placeholder" data-placeholder="Email Address"></span>
                                </div>
                               
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add1" name="add1" />
                                    <span class="placeholder" data-placeholder="Address line 01"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="add2" name="add2" />
                                    <span class="placeholder" data-placeholder="Post code"></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="city" name="city" />
                                    <span class="placeholder" data-placeholder="Town/City"></span>
                                </div>
                                
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
                        <div class="cart__total">
                            <h4>Cart Total</h4>
                            <ul>
                                <li>Subtotal <span>$284.00</span></li>
                                <li>Total <span>$284.00</span></li>
                            </ul>
                            <a href="payment.php">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--================End Cart Area =================-->
