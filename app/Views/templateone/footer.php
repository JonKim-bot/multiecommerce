<footer>

    <div class="footer-wrapper gray-bg c-footer">
        <div class="footer-area footer-padding">
            <!--? Subscribe Area Start -->
            <section class="subscribe-area">

            </section>
            <!-- Subscribe Area End -->
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-20">
                                <!-- logo -->
                                <div class="footer-logo mb-35">
                                    <a href="<?= base_url() ?>/main/index"><img src="<?= base_url() . $shop['footer_logo'] ?>" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <!-- <h4>Quick Links</h4> -->
                                <ul>
                                    <li><a class="c-footer-bold" href="<?= base_url() ?>/main/privacy_policy">Privacy policy</a></li>
                                    <li><a class="c-footer-bold" href="<?= base_url() ?>/main/return_refund_policy">RETURN & REFUND POLICY</a></li>
                                    <!-- <li><a class="c-footer-bold" href="<?= base_url() ?>/main/shipping_policy">Shipping policy</a></li> -->
                                    
                                    <li><a class="c-footer-bold" href="<?= base_url() ?>/main/tnc">TERM AND CONDITIONS</a></li>

                                    <li><a class="c-footer-bold" href="<?= base_url() ?>/main/index"><?= $lang['home'] ?></a></li>
                                    <li><a class="c-footer-bold" href="<?= base_url() ?>/main/index#product"><?= $lang['my_product'] ?></a></li>
                                    <li><a class="c-footer-bold" href="<?= base_url() ?>/main/index#product"><?= $lang['filter'] ?></a></li>
                                    <?php if (in_array(1, $shop_function)) { ?>
                                        <?php if (empty($customer_data)) { ?>
                                            <li><a class="c-footer-bold" href="<?= base_url() ?>/main/login"><?= $lang['login'] ?></a></li>
                                            <li><a class="c-footer-bold" href="<?= base_url() ?>/main/signup"><?= $lang['register'] ?></a></li>
                                        <?php } else { ?>
                                            <li><a class="c-footer-bold" href="<?= base_url() ?>/main/member"><?= $lang['my_profile'] ?></a></li>
                                            <li><a class="c-footer-bold" href="<?= base_url() ?>/main/logout"><?= $lang['logout'] ?></a></li>

                                        <?php } ?>
                                    <?php }  ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4 class="c-footer-bold-title"><?= $lang['contact_us'] ?></h4>
                                <ul>
                                <?php if($shop['address'] != ''){ ?>

                                    <li>
                                        <p class="c-footer-bold_"><?= $lang['address'] ?> :</p>
                                        <a class="c-footer-light_" href="mailto:<?= $shop['email'] ?>?subject=Product Enquiry">
                                        <?= $shop['address'] ?>
                                        <!-- NO 16, JALAN PERMATANG 28, TAMAN DESA JAYA -->
                                        </a>
                                    </li>
                                    <?php } ?>
                                    <li>
                                        <p class="c-footer-bold_"><?= $lang['contact_number'] ?> :</p>
                                        <a class="c-footer-light_" href="tel:<?= $shop['contact'] ?>">
                                            <?= $shop['contact'] ?>
                                            <!-- 0167889773 -->
                                        </a>
                                    </li>
                                    <li>
                                        <p class="c-footer-bold_"><?= $lang['email'] ?> :</p>
                                        <a class="c-footer-light_" href="mailto:<?= $shop['contact'] ?>">
                                            <?= $shop['email'] ?>
                                        </a>
                                    </li>

                                    <li>
                                        <p class="c-footer-bold_">Company info:</p>
                                        <a class="c-footer-light_">
                                        PIEGEN SOFTWARE ENTERPRISE (JM0933786M)
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4 class="c-footer-bold-title"><?= $lang['getintouch'] ?></h4>
                                <ul class="c-social">
                                <?php if($shop['facebook'] != ''){ ?>

                                    <li>
                                        <a href="<?= $shop['facebook'] ?>">
                                            <i class="fa fa-facebook-square fa-2x c-social-bold"></i>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <?php if($shop['insta'] != ''){ ?>
                                    <li>
                                    
                                        <a href="<?= $shop['insta'] ?>">
                                            <i class="fa fa-instagram fa-2x c-social-bold"></i>
                                        </a>
                                    </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- footer-bottom area -->


    </div>
</footer>
<!-- Scroll Up -->
<div id="back-top">
    <a class="wrapper" title="Go to Top" href="#">
        <div class="arrows-container">
            <div class="arrow arrow-one">
            </div>
            <div class="arrow arrow-two">
            </div>
        </div>
    </a>
</div>
<div id="myButton"></div>

<!-- JS here -->

<!-- Jquery, Popper, Bootstrap -->

<script src="<?= base_url() ?>/assets/assetsecom/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/bootstrap.min.js"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
<script src="<?= base_url() ?>/assets/bjs.js"></script>
                                        
<!-- Slick-slider , Owl-Carousel ,slick-nav -->
<script src="<?= base_url() ?>/assets/assetsecom/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/slick.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/jquery.slicknav.min.js"></script>

<!--wow , counter , waypoint, Nice-select -->
<script src="<?= base_url() ?>/assets/assetsecom/js/wow.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/jquery.magnific-popup.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/waypoints.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/price_rangs.js"></script>

<!-- contact js -->
<script src="<?= base_url() ?>/assets/assetsecom/js/contact.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/jquery.form.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/mail-script.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/mixitup.js"></script>

<script src="<?= base_url() ?>/assets/assetsecom/js/jquery.ajaxchimp.min.js"></script>

<!--  Plugins, main-Jquery -->
<script src="<?= base_url() ?>/assets/assetsecom/js/plugins.js"></script>
<script src="<?= base_url() ?>/assets/assetsecom/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />


<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.js"></script>

<script src="<?= base_url() ?>/assets/floatwpp/floating-wpp.js"></script>



<script>
    $(document).ready(function() {
        $('.slick-home-mob').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    });
    $(document).ready(function() {
        $('.slick-home-pc').slick({
            autoplay: true,
            autoplaySpeed: 5000,
            dots: false,
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    });
    $(function () {
            $('#myButton').floatingWhatsApp({
                phone: '<?= $shop['contact'] ?>',
                position : 'right',
                popupMessage: 'Hello, how can we help you?',
                message: "Hello",
                showPopup: true,
            });

        });

    $(".mobile_menu").click(function(e) {
        $(".slicknav_nav").css("display", "block");
        $(".shopping-cart").removeClass("active");
        $(".user_drop").removeClass("active");

    });


    $(".c-userDROP").click(function(e) {
        $(".slicknav_nav").css("display", "none");
        $(".shopping-cart").removeClass("active");

    });

    $(".c-cartDROP").click(function(e) {
        $(".slicknav_nav").css("display", "none");
        $(".user_drop").removeClass("active");
    });

    function applyPromo(promo_code = '') {

        var base_url = "<?= base_url() ?>";

        // var order_info = new FormData(order_info);
        // var host = window.location.hostname;
        var promocode = document.getElementById('promo_code').value;

        var promo_id = document.getElementById('promo_id').value;
        if (promo_id != "0") {
            Swal.fire({
                title: "Promocode already applyed",

                text: "Promocode already applyed",
                type: 'error'
            })
            return;
        }
        var url = base_url + "/main/apply_promo";
        var grand_total = $('#grand_total').text().replace("RM", "");
        var subtotal = $('#subtotal').text().replace("RM", "");
        var shop_id = "<?= $shop['shop_id'] ?>";
        var delivery_fee = $('#delivery_fee').text().replace("RM", "");

        $.ajax({

            url: url,
            method: "POST",
            data: {
                grand_total: grand_total,
                delivery_fee: delivery_fee,
                promocode: promocode,
                shop_id: shop_id
            },
            dataType: "json",

            success: function(data) {

                if (data.status) {

                    if (promo_code == '') {
                        Swal.fire({

                            title: "Discount added",
                            text: "Discount added",
                            type: 'success'
                        })

                    }
                    let amount = data.amount
                    let discount = data.discount
                    let promo_id = data.promo_id
                    let promo_type_id = data.promo_type_id;
                    if (promo_type_id == 1) {
                        $('#delivery_fee').text("RM" + 0);
                    }
                    $("#promo_code").prop("readonly", true);
                    $("#apply_promo").text("CANCEL");
                    $("#promo_type_id").val(promo_type_id);
                    document.getElementById('discount').innerText = "RM " + discount
                    document.getElementById('promo_id').value = promo_id
                    document.getElementById('subtotal').innerText = "RM " + parseFloat(parseFloat(subtotal) - parseFloat(discount)).toFixed(2)
                    document.getElementById('grand_total').innerText = "RM " + parseFloat(amount).toFixed(2)


                } else {

                    if (data.error == "Invalid") {

                        Swal.fire({
                            title: "Promocode not valid",
                            text: data.message,
                            type: 'error'
                        })
                    } else {
                        Swal.fire({
                            title: "Minimum spend",
                            text: "Minimum spend RM " + data.min,
                            type: 'error'
                        })
                    }

                }

                // alert(JSON.stringify(order_info))

            }

            // alert("success");
            // window.open(

            //     'https://support.wwf.org.uk/earth_hour/index.php?type=individual',
            //     '_blank' // <- This is what makes it open in a new window.
            //   );


        });
    }

    function get_selected_category() {
        var checked_array = [];
        $(".category_check:checked").each(function() {
            checked_array.push($(this).val());
        });
        return checked_array;
    }
    $(".search_bar").on("keyup", function() {
        get_product_list();
    });
    $('.category_check').click(function(e) {


        get_product_list();
    });
    <?php if ($shop['is_active'] == 0) { ?>
        Swal.fire({
            title: "Dear Customer",
            text: "<?= $shop['closed_msg'] ?>",

            type: 'info'
        })

    <?php } ?>

    $('#contactForm_').submit(function(e) {
        e.preventDefault();
        var postParam = $(this).serializeArray();
        $.post("<?= base_url('main/submit_contact') ?>", postParam, function(data) {
            data = jQuery.parseJSON(data);

            if (data.status) {
                Swal.fire({
                    title: "Thank you !",
                    text: "Form submitted",
                    type: 'success'
                });
            }

        });
    });


    function get_header_cart() {
        $.post("<?= base_url('main/load_shopping_cart') ?>", {
            slug: "<?= $shop['slug'] ?>"
        }, function(html) {
            $('.shopping-cart').html(html);
        });
    }

    function get_ajax_cart() {
        $.post("<?= base_url('main/load_cart') ?>", {}, function(html) {
            $('#ajax_cart').html(html);

        });
    }


    function check_promo() {

        var promo_id = $('#promo_id').val();
        var promo_code = $('#promo_code').val();
        if (promo_id > 0) {
            $('#promo_id').val('0');
            applyPromo(promo_code);
            return true;
        } else {
            return false;
        }
    }


    function check_promo_validate() {
        var promo_id = $('#promo_id').val();
        if (promo_id > 0) {
            return true;
        } else {
            return false;
        }
    }

    function addQuantity(index) {

        var postParam = {
            index: index
        };
        $('#check_out_btn').hide();
        $.post("<?= base_url('main/add_qty') ?>", postParam, function(html) {
            get_ajax_cart();
            get_header_cart();

            get_total();
            $('#check_out_btn').show();

        });
    }

    function reset() {
        $('#grand_total').text("RM 0");
        $('#subtotal').text("RM " + "0");
        $('#discount').text("RM " + '0');
    }

    function cancel_promo() {
        // alert("canceling");
        // window.location.href = window.location.href;
        var promo_type_id = $('#promo_type_id').val();
        $('#promo_id').val('0');
        $("#promo_code").prop("readonly", false);
        $("#apply_promo").text("APPLY");
        var discount = $('#discount').text().replace('RM', "");

        var subtotal = $('#subtotal').text().replace('RM', "");
        var delivery_fee = $('#delivery_fee').text().replace('RM', "");

        var subtotal = parseFloat(subtotal) + parseFloat(discount);
        var grand_total = parseFloat(subtotal) + parseFloat(delivery_fee);
        $('#grand_total').text("RM " + grand_total);
        $('#subtotal').text("RM " + subtotal);
        $('#discount').text("RM " + '0');
        if (promo_type_id == 1) {
            $('#delivery_fee').text("RM " + get_delivery_fee());
        }
        get_total();
    }
    

    function clearCart() {

        $.post("<?= base_url('main/clear_cart') ?>", {}, function(html) {
            get_ajax_cart();
            get_total();
            get_header_cart();

        });
    }

    function get_delivery_fee_(){
        var delivery_place = $('.delivery_place').val();
        var delivery_fee = 0;
        $.post("<?= base_url('main/get_delivery_fee') ?>", { delivery_place : delivery_place}, function(data) {
            data = JSON.parse(data);
            $('#delivery_fee').text("RM " + data.data);
            delivery_fee = data.data;
        });
        // alert(delivery_fee);
        return delivery_fee;

    }

    function get_delivery_fee(){
        var  delivery_fee = $('#delivery_fee').text();
        return delivery_fee.replace("RM",'');

    }

    function get_total() {
        $('#check_out_btn').hide();
        var delivery_place = $('.delivery_place').val();

        $.post("<?= base_url('main/get_total') ?>", { delivery_place : delivery_place}, function(data) {
            data = JSON.parse(data);
            var grand_total = (data.data).toFixed(2);
            // alert(get_delivery_fee());
            var subtotal = grand_total - data.delivery_fee;
            $('.numberCircle').text(data.count);
            $('#grand_total').text("RM " + grand_total);
            $('#subtotal').text("RM " + subtotal.toFixed(2));
            if (data.data == 0) {
                reset();
                return;
            } else {

                check_promo();
            }
            $('.cart_count').text(data.count);
            $('#check_out_btn').show();


        });
    }


    function deleteItem(index) {
        var postParam = {
            index: index
        };

        $.post("<?= base_url('main/delete_item') ?>", postParam, function(data) {
            get_ajax_cart();
            get_header_cart();
            get_total();
            check_promo();
            get_total();
            get_delivery_fee();


        });
    }


    $('#apply_promo').on('click', function() {

        if (check_promo_validate() == false) {
            applyPromo();
        } else {
            cancel_promo();
        }
    });

    function minusQuantity(index) {
        $('#check_out_btn').hide();

        var postParam = {
            index: index
        };

        $.post("<?= base_url('main/minus_qty') ?>", postParam, function(data) {
            get_ajax_cart();

            get_total();
            get_header_cart();
            $('#check_out_btn').show();


        });
    }


    get_total();
    get_header_cart();
    get_ajax_cart();

    // function get_selected_page(){

    // }
    function get_product_list(page = 1) {

        //     background: #1b2839;
        // border-color: #1b2839;

        let post_data = {
            'shop_id': "<?= $shop['shop_id'] ?>"
        }
        var keyword = $('.search_bar').val();
        var checked_array = get_selected_category();
        if (checked_array != []) {
            post_data.category_ids = checked_array;
        }
        if (keyword != "") {
            post_data.keyword = keyword;
        }
        post_data.page = page;
        // post_data.page = $('')
        $.ajax({
            url: "<?= base_url() ?>/main/product_list",
            method: "POST",
            data: post_data,
            success: function(data) {

                $('.product_list').html(data);
                $('#page' + page).css("background-color", "#1b2839");
                $('#page' + page).css("border-color", "#1b2839");
                $('#page' + page).css("color", "white");
                if (page != 1) {

                    window.location.hash = "";
                    window.location.hash = "product";
                }
            }
        });
    }
    get_product_list();

    $('.delivery_place').on('change', function() {
        get_delivery_fee_();
        get_ajax_cart();
        get_header_cart();
        get_total();
    });



    $('.property-controls a').on('click', function() {
        $('.property-controls a').removeClass('active');
        $(this).addClass('active');
    });



    if ($('.property-filter').length > 0) {
        var containerEl = document.querySelector('.property-filter');
        var mixer = mixitup(containerEl);
    }

    (function() {

        $('#close_promo_btn').click(function(e) {

            $('.header-bottom').hide();
        });

        $("a.fancybox").fancybox({
            'transitionIn': 'elastic',
            'transitionOut': 'elastic',
            'speedIn': 600,
            'speedOut': 200,
            'overlayShow': false,
            'cyclic': true,
            'showNavArrows': true
        });

        //  $(document).click(function() {
        $('.closeit').click(function(e) {

            var $item = $(".shopping-cart");
            if ($item.hasClass("active")) {
                $item.removeClass("active");
            }
        });

        $('.shopping-cart').each(function() {
            var delay = $(this).index() * 50 + 'ms';
            $(this).css({
                '-webkit-transition-delay': delay,
                '-moz-transition-delay': delay,
                '-o-transition-delay': delay,
                'transition-delay': delay
            });
        });

        $('.user_drop').each(function() {
            var delay = $(this).index() * 50 + 'ms';
            $(this).css({
                '-webkit-transition-delay': delay,
                '-moz-transition-delay': delay,
                '-o-transition-delay': delay,
                'transition-delay': delay
            });
        });
        $('#cart').click(function(e) {
            e.stopPropagation();
            $(".shopping-cart").toggleClass("active");
        });
        $('#user').click(function(e) {
            e.stopPropagation();
            $(".user_drop").toggleClass("active");
        });

        $('#addtocart').click(function(e) {
            e.stopPropagation();
            $(".shopping-cart").toggleClass("active");
        });



    })();
</script>
<!-- <script src="locksmith/js/main.js"></script> -->
</body>

</html>