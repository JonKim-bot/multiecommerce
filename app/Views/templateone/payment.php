<?php include 'header.php' ?>

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
                               
                                <tr>
                                    <td class="cart__item">
                                        <div class="cart__item__pic">
                                            <img src="locksmith/img/cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="cart__item__text ">
                                            <h6>Vanilla Salted Caramel</h6>
                                            <span>$ 15.00</span>
                                        </div>
                                    </td>
                                   
                                    <td class="cart__price text-right" style="text-align:right">$ 30.00</td>
                                </tr>
                                <tr>
                                    <td class="cart__item">
                                        <div class="cart__item__pic">
                                            <img src="locksmith/img/cart/cart-1.jpg" alt="">
                                        </div>
                                        <div class="cart__item__text ">
                                            <h6>Vanilla Salted Caramel</h6>
                                            <span>$ 15.00</span>
                                        </div>
                                    </td>
                                   
                                    <td class="cart__price text-right" style="text-align:right">$ 30.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
                <div class="col-lg-9 col-md-6">
                    <div class="cart__right">
                        <div class="billing-address">
                            <div class="row">
                                <div class="col-md-6">
                                <h4>Receiver</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, illo!</p>
                                    <h4>Contact Number</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, illo!</p>
                                </div>
                                <div class="col-md-6">

                                    <h4>Address
                                    </h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, illo!</p>
                                    <h4>Date & Time:</h4>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut, illo!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-9 col-md-6">
                    <div class="cart__right">
                        <div class="billing-address">
                            <div class="row">
                               <a class="btn btn-primary m-auto w-50 p-t-20" href="success.php" style="margin-top:20px">Pay</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <!--================End Cart Area =================-->
    </main>
    <?php include 'footer.php' ?>
