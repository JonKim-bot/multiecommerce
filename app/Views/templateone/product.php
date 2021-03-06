<style>
    .settings {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        /* padding-top: 40px;
  padding-bottom: 40px;
  padding-left: 60px;
  padding-right: 60px; */
        border-radius: 15px;
    }

    .settings h1 {
        margin: 0px;
        font-size: 24px;
        margin-bottom: 25px;
        font-weight: bold;
        color: white;
    }

    .settings form {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        overflow-y: scroll;
        height: 400px;
        flex-direction: column;
    }

    .settings form>label {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        padding-left: 10px;

        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        cursor: pointer;
    }

    .settings form>label input {
        width: 25px;
        height: 25px;
        margin-right: 10px;
        cursor: pointer;
    }

    .settings form>label input:checked {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: #716af3;
        position: relative;
    }

    .settings form>label input:checked::after {
        content: "\2713";
        position: absolute;
        color: white;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 5px;
    }

    .settings form>label span {
        margin-top: 5px;
        margin-bottom: 5px;
        color: black;
        font-size: 16px;
    }

    .settings form>label+label {
        border: 0;
        border-top: 1px solid #eeeeee;
        /* margin-top: 15px; */
        /* border-top: 0.5px solid black; */
    }

    .set-content {
        text-align: right;
        padding: 10px;
    }

    .settings form .settings__content {
        margin-left: -30px;
        background-color: #1e1d2e;
        margin-right: -30px;

        margin-top: 35px;
        margin-bottom: 35px;
    }

    .settings form .settings__content p {
        padding: 30px;
        color: #b3b2c5;
    }

    .settings form .settings__content p a {
        color: #716af3;
    }

    .settings form .settings__footer {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .settings form .settings__footer h1 {
        margin-top: 0px;
        margin-bottom: 35px;
    }

    .settings form .settings__footer label {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        cursor: pointer;
    }

    .settings form .settings__footer label+label {
        margin-top: 15px;
    }

    .settings form .settings__footer label span {
        margin-top: 5px;
        margin-bottom: 5px;
        color: black;
    }

    .settings form .settings__footer label input {
        width: 30px;
        border-radius: 50%;
        margin-right: 10px;
        height: 30px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: white;
        cursor: pointer;
    }

    .settings form .settings__footer label input:checked {
        position: relative;
        background-color: #716af3;
    }

    .settings form .settings__footer label input:checked::after {
        background-color: white;
        content: "";
        border-radius: 50%;
        display: block;
        width: 15px;
        height: 15px;
        position: absolute;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 7px;
    }

    .settings form .settings__footer .send {
        margin-top: 50px;
    }

    .settings form .settings__footer .send input {
        line-height: 65px;
        border-radius: 5px;
        font-weight: bold;
        color: white;
        background-color: #716af3;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    #modal-price {
        text-align: left;
        font-size: 24px;
        color: #404044;
    }

    .item-cart-count-container-menu {
        position: absolute;
        right: 24px;
        bottom: 44px;
        background-color: white;
        border: 1px solid black;
        border-radius: 50px;
        z-index: 9999;
        text-align: center;
        width: 20px;
        height: 20px;
    }

    .item-cart {
        position: absolute;
        top: -3px;
        left: 3px;
    }

    .read_mor_btn2 {
        background: transparent;
        text-align: center;
        width: 120px;
        font-family: "Cantata One", serif;
        color: #333333;
        line-height: 40px;
        display: inline-block;
        font-size: 12px;
        z-index: 2;
        position: relative;
        letter-spacing: 0.42px;
        text-transform: uppercase;
    }

    .modal-title {
        font-size: 23px;
        margin: 0;
        align-items: center;
        text-align: center;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        height: 88px;
        margin: 0px;
    }

    .modal-title>button {
        position: relative;
        top: -29px;
    }
</style>

<main>
    <div class="c-product">
        <div class="c-product-back">
        </div>
        <div class="c-product-card">
            <!--  services-area start-->
            <div class="services-area2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- Single -->

                                    <div class="single-services c-top mb-0">

                                        <div class="col-lg-6 col-md-12 col-sm-12 pcslider c-slider" id="pcslider" style="align-self:center">
                                            <div class="h1-testimonial-active" style="">
                                                <?php foreach ($product_image as $row) { ?>


                                                    <div class="single-testimonial c-slider-img text-center">
                                                        <a class="c-siBox" href="<?= base_url() . $row['product_image'] ?>" class="fancybox" data-fancybox="images">

                                                            <img src="<?= base_url() . $row['product_image'] ?>" width="100%,border-radius:15px;" alt="">
                                                            <!-- <i class="fa fa-eye text-white fa-2x icon_view hvr-glow"></i> -->
                                                        </a>

                                                    </div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 c-Columnflex">

                                            <div class="features-caption">
                                                <div class="c-name">
                                                    <h4><?= $product['product_name'] ?></h4>
                                                </div>

                                                <div class="c-desc">
                                                    <p><?= $product['product_description'] ?></p>
                                                </div>
                                                <?php if($product['product_inner_title'] != ''){ ?>
                                                <div class="c-name" style="margin-top:20px">
                                                    <h4><?= $product['product_inner_title'] ?></h4>
                                                </div>
                                                <?php } ?>
                                                <?php if($product['product_description_two'] != ''){ ?>

                                                <div class="c-desc">
                                                    <p><?= $product['product_description_two'] ?></p>
                                                </div>
                                                <?php } ?>

                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-area2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-12">
                                    <!-- Single -->

                                    <div class="single-services c-detail mb-0">


                                        <div class="col-md-12 col-sm-12 pl-0 pr-0">

                                            <div class="features-caption">
                                                <!-- <h1><?= $product['product_name'] ?></h1>
                                                <p><?= $product['product_description'] ?></p> -->
                                                <!-- <p>By Evan Winter</p> -->
                                                <div class="long-desc">
                                                    <p>
                                                        <?= $product['product_description_three'] ?>
                                                    </p>
                                                </div>
                                                <div class="price">
                                                    <?php if ($product['is_member'] == 1 && $product['is_promo'] == 1 && !empty($customer_data)) { ?>
                                                        <h2 id="product_price">RM <?= $product['promo_price'] ?></h2>
                                                        <p id="initial_price" style='display:none'><?= $product['promo_price'] ?></p>

                                                        <h2 style="text-decoration: line-through;">RM <?= $product['product_price'] ?></h2>
                                                    <?php } else if ($product['is_promo'] == 1 && $product['is_member'] == 0) { ?>
                                                        <p id="initial_price" style='display:none'><?= $product['promo_price'] ?></p>
                                                        <h2 id="product_price">RM <?= $product['promo_price'] ?></h2>
                                                        <h2 style="text-decoration: line-through;">RM <?= $product['product_price'] ?></h2>
                                                    <?php } else { ?>
                                                        <p id="initial_price" style='display:none'><?= $product['product_price'] ?></p>

                                                        <h2 id="product_price">RM <?= $product['product_price'] ?></h2>
                                                    <?php } ?>

                                                </div>
                                                <?php if (in_array(1, $shop_function)) { ?>

                                                    <?php if (empty($customer_data)) { ?>
                                                        <div class="c-discount">
                                                            <p class="c-discount-text"><?= $product['member_text'] ?></p>

                                                        </div>
                                                        <div class="c-btn">
                                                            <a class="r-btn" href="<?= base_url() ?>/main/signup">
                                                                <?= $lang['join_as_member'] ?>
                                                            </a>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>

                                                <?php if (!empty($product_option)) { ?>
                                                    <div class="c-option">
                                                        <div class="select-Categories pb-30">
                                                            <?php foreach ($product_option as $row) { ?>
                                                                <div class="c-optionBOX">
                                                                    <div class="c-title">
                                                                        <p class="menu_title"><?= $row['name']  ?>
                                                                            <span style="color:red">
                                                                                <?= $row['minimum_required'] == 1 ? "*Required" : "" ?>
                                                                            </span>
                                                                        </p>
                                                                    </div>
                                                                    <div class="c-selectionBOX">
                                                                        <?php if ($row['minimum_required'] != 1) { ?>

                                                                            <?php foreach ($row['selection'] as $rowselect) { ?>
                                                                                <!-- <div class="c-selectionBOX"> -->
                                                                                <div class="c-selection">
                                                                                    <div class="form-check c-selection-box">
                                                                                        <label class="form-check-label c-sb-box">
                                                                                            <div class="c-sbb-left">
                                                                                                <input type="checkbox" class="c-single form-check-input" product_option_name="<?= $row['name'] ?>" min_required="<?= $row['minimum_required'] ?>" selection_name="<?= $rowselect['product_option_name'] ?>" product_option_id="<?= $row['product_option_id'] ?>" selection_price="<?= $rowselect['selection_price'] ?>" name="type" value="<?= $rowselect['product_option_selection_id'] ?>">
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="optionName_"><?= $rowselect['product_option_name'] ?> + RM <?= $rowselect['selection_price'] ?></p>
                                                                                            </div>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- </div> -->
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            <?php foreach ($row['selection'] as $rowselect) { ?>
                                                                                <!-- <div class="c-selectionBOX"> -->
                                                                                <div class="c-selection">
                                                                                    <div class="form-check c-selection-box">
                                                                                        <label class="form-check-label c-sb-box">
                                                                                            <div class="c-sbb-left">
                                                                                                <input type="radio" class="c-single form-check-input form-radio" min_required="<?= $row['minimum_required'] ?>" product_option_name="<?= $row['name'] ?>" selection_name="<?= $rowselect['product_option_name'] ?>" product_option_id="<?= $row['product_option_id'] ?>" selection_price="<?= $rowselect['selection_price'] ?>" value="<?= $rowselect['product_option_selection_id'] ?>" name="<?= $row['product_option_id'] ?>">
                                                                                            </div>
                                                                                            <div>
                                                                                                <p class="optionName_"><?= $rowselect['product_option_name'] ?> + RM <?= $rowselect['selection_price'] ?></p>
                                                                                            </div>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- </div> -->
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </div>

                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <div class="c-priceBOX">
                                                    <h2><?= $lang['quantity'] ?></h2>
                                                    <div class="product__details__widget" style="overflow: visible">

                                                        <div class="quantity">
                                                            <div class="pro-qty">
                                                                <span class="fa fa-minus dec qtybtn minus_qty"></span>
                                                                <input type="text" readonly class="" value="1" id="product_quantity">
                                                                <span class="fa fa-plus inc qtybtn add_qty"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="c-btn">
                                                    <div class="r-btn add-to-cart-button" style="cursor:pointer">
                                                        <?= $lang['addto_cart'] ?>
                                                    </div>
                                                </div>

                                                <!--Books review Start -->

                                                <?php if (in_array(3, $shop_function)) { ?>
                                                    <?php if (!empty($upsales_product)) { ?>
                                                        <section class="latest-items section-padding fix c-likes">
                                                            <div class="row">
                                                                <div class="col-xl-12">
                                                                    <div class="section-tittle text-center c-upsales-title">
                                                                        <h2 class="c-title"><?= $lang['upsales'] ?></h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="">
                                                                <div class="latest-items-active">
                                                                    <!-- Single -->
                                                                    <?php foreach ($upsales_product as $row) { ?>
                                                                        <div class="properties pb-30">
                                                                            <div class="properties-card c-Cardflex">
                                                                                <div class="properties-img">
                                                                                    <a href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>">
                                                                                        <img class="c-Pimg" src="<?= base_url() .  $row['image'] ?>" alt="">
                                                                                    </a>
                                                                                    <!-- <div class="socal_icon">

                                                                                    <a href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>"><i class="ti-zoom-in"></i></a>
                                                                                </div> -->
                                                                                </div>

                                                                                <a class="c-name" href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>">
                                                                                    <h4><?= $row['product_name'] ?></h4>
                                                                                </a>
                                                                                <a class="c-desc" href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>">
                                                                                    <p style="color:black"><?= $row['product_description'] ?></p>
                                                                                </a>
                                                                                <a class="c-btm" href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>">
                                                                                    <div class="c-btn"><?= $lang['learn_more'] ?></div>
                                                                                    <div class="c-price">
                                                                                    <?php if($row['is_member'] == 1 && $row['is_promo'] == 1 && !empty($customer_data)){ ?>
                                                                                            <p class="t-promo-price">RM <?= $row['product_price'] ?></p>
                                                                                            <p class="t-price">RM <?= $row['promo_price'] ?></p>
                                                                                        <?php }else if($row['is_promo'] == 1 && $row['is_member'] == 0){ ?>
                                                                                            <p class="t-promo-price">RM <?= $row['product_price'] ?></p>
                                                                                            <p class="t-price">RM <?= $row['promo_price'] ?></p>
                                                                                        
                                                                                        <?php } else { ?>
                                                                                                
                                                                                                <p class="t-price">RM <?= $row['product_price'] ?></p>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </a>
                                                                                <!-- <h3><a href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>"><?= $row['product_name'] ?></a></h3> -->
                                                                                <!-- <div class="properties-caption properties-caption2">
                                                                                <h3><a href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>"><?= $row['product_name'] ?></a></h3>
                                                                                <div class="properties-footer">
                                                                                    <div class="price">
                                                                                        <?php if ($row['is_promo'] == 1) { ?>
                                                                                            <span>RM <?= $row['promo_price'] ?>
                                                                                                <span style="text-decoration: line-through;">RM <?= $row['product_price'] ?></span>
                                                                                            </span>
                                                                                        <?php } else { ?>
                                                                                            
                                                                                            <span>RM <?= $row['product_price'] ?>
                                                                                            </span>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <!-- Single -->
                                                                </div>
                                                            </div>
                                                        </section>
                                                    <?php } ?>

                                                <?php } ?>
                                                <!-- Books review End -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- services-area End-->

            </div>
        </div>
</main>

<script>
    function validate(total_selected) {
        var selected_value = get_selected_value().selected_value;
        console.log(selected_value)

        var selected_value = get_selected_value().selected_value
            .filter(value => value.product_option_id != '0' && value.min_required != '0')
            .map(value => parseFloat(value.product_option_id))
            .sort(function(a, b) {
                return a - b;
            }).join('_');

        console.log(selected_value);
        if (selected_value != "<?= $required_option_id ?>") {
            Swal.fire({
                title: "Option",
                text: "Please select all the required option",
                type: 'error'
            })
            return false;
        }
    }
    var selected_value = [];
    var selected_count = 0;

    $(".form-check-input").on('change click', function() {
        highlight_bg();
        var selected_value = get_selected_value().selected_value;
        var product_price = $('#initial_price').text().replace("RM", '');

        var product_quantity = $('#product_quantity').val();
        var total_price = (product_price * product_quantity);
        item_price = calculate_total(selected_value, total_price);
        $('#product_price').text("RM " + (item_price));

    });


    function calculate_total(selected_value, item_price) {
        var product_quantity = $('#product_quantity').val();

        selected_value.map(option =>
            item_price = parseFloat(item_price) + (parseFloat(option.selection_price) * parseFloat(product_quantity))
        )
        return item_price.toFixed(2)
    }
    $(".add_qty").on('click', function() {
        var product_quantity = parseFloat($('#product_quantity').val()) + 1;
        $('#product_quantity').val(product_quantity);
        calculate_product_price();
    });
    $(".minus_qty").on('click', function() {
        var product_qty = $('#product_quantity').val();
        if (product_qty > 1) {
            var product_quantity = parseFloat($('#product_quantity').val()) - 1;
            $('#product_quantity').val(product_quantity);
            calculate_product_price();
        }


    });


    function calculate_product_price() {
        var total_selection_price = get_selected_value().selected_total_price;

        var product_price = $('#initial_price').text().replace("RM", '');
        var product_price = parseFloat(product_price) + parseFloat(total_selection_price);

        var product_quantity = $('#product_quantity').val();
        var total_price = (product_price * product_quantity);
        $('#product_price').text("RM " + total_price.toFixed(2));
    }

    function highlight_bg() {
        $("input:checkbox[name=type]:not(:checked)").parent().parent().parent().parent().css("background-color", "white");
        $(".form-radio:not(:checked)").parent().parent().parent().parent().css("background-color", "white");
        $(".form-radio:not(:checked)").parent().next().children().css("color", "black");
        $("input:checkbox[name=type]:not(:checked)").parent().next().children().css("color", "black");

        $("input:checkbox[name=type]:checked").each(function() {
            $(this).parent().next().children().css("color", "white");
            $(this).parent().parent().parent().parent().css("background-color", "<?= $shop['colour'] ?>");
        });
        $(".form-radio:checked").each(function() {
            $(this).parent().next().children().css("color", "white");

            $(this).parent().parent().parent().parent().css("background-color", "<?= $shop['colour'] ?>");
        });
    }


    function get_selected_value() {
        selected_count = 0;
        selected_total_price = 0;
        selected_value = [];
        $("input:checkbox[name=type]:checked").each(function() {
            var option_selected = {
                selection_name: $(this).attr("selection_name"),
                selection_price: $(this).attr("selection_price"),
                product_option_name: $(this).attr("product_option_name"),
                product_option_id: $(this).attr("product_option_id"),
                min_required: $(this).attr("min_required"),

                product_option_selection_id: $(this).val(),
            }
            selected_value.push(option_selected);
            if (option_selected.product_option_id > 0) {
                selected_total_price = parseFloat(option_selected.selection_price) + parseFloat(selected_total_price);
                selected_count = selected_count + 1;
                //count total selected value
            }
        });
        $(".form-radio:checked").each(function() {
            var option_selected = {
                product_option_id: $(this).attr("product_option_id"),
                product_option_name: $(this).attr("product_option_name"),
                selection_price: $(this).attr("selection_price"),
                selection_name: $(this).attr("selection_name"),
                product_option_selection_id: $(this).val(),
            }
            selected_value.push(option_selected);
            if (option_selected.product_option_id > 0) {
                selected_total_price = parseFloat(option_selected.selection_price) + parseFloat(selected_total_price);
                selected_count = selected_count + 1;
                //count total selected value
            }
            console.log(selected_value);
        });

        let return_json = {
            selected_value: selected_value,
            selected_total_price: selected_total_price,
            selected_count: selected_count,
        }

        // alert(JSON.stringify(return_json));
        return return_json;
    }

    $(".add-to-cart-button").on('click', function() {
        var selected_count = get_selected_value().selected_count;
        var selected_value = get_selected_value().selected_value;
        var total_selection_price = get_selected_value().selected_total_price;
        var product_price = $('#initial_price').text().replace("RM", '');
        var product_price = parseFloat(product_price) + parseFloat(total_selection_price);

        if (validate(selected_count) == false) {
            return;
        }
        var postParam = {
            product_id: "<?= $product['product_id'] ?>",
            product_single_price: product_price,
            product_name: "<?= $product['product_name'] ?>",
            quantity: $('#product_quantity').val(),
            product_price: $('#product_price').text(),
            product_selection: selected_value
        }
        $.post("<?= base_url('main/add_to_cart') ?>", postParam, function(data) {
            Swal.fire({
                title: "Item added",
                text: "Item added to cart",
                type: 'success'
            })
            get_header_cart();
            get_total();
        });
        // console.log(product)

    });
</script>