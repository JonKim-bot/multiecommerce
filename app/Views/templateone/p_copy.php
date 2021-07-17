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
        <!-- Hero area Start-->
        <div class="hero-area">
            <div class="pcslider" id="pcslider" style="align-self:center">
                <div class="h1-testimonial-active" style="width:100%">
                    <?php foreach ($product_image as $row) { ?>
                        <div class="single-testimonial text-center">
                            <a href="<?= base_url() . $row['product_image'] ?>" class="fancybox" data-fancybox="images">
                                <img src="<?= base_url() . $row['product_image'] ?>" width="100%" alt="">
                                <i class="fa fa-eye text-white fa-2x icon_view hvr-glow"></i>
                            </a>
                        </div>
                    <?php } ?>
                </div>

                <!-- <div class="h1-testimonial-active mobileslider">
                <?php foreach ($product_image as $row) { ?>
                    <div class="single-testimonial text-center">
                        <a href="<?= base_url() . $row['product_image'] ?>" class="fancybox" data-fancybox="images_">
                            <img src="<?= base_url() . $row['product_image'] ?>" width="100%" alt="">
                            <i class="fa fa-eye text-dark fa-2x icon_view hvr-glow"></i>
                        </a>
                    </div>
                <?php } ?>
            </div> -->
            </div>
        </div>
        <!--  Hero area End -->
        <!--  services-area start-->
        <div class="services-area2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Single -->

                                <div class="single-services c-detail mb-0">


                                    <div class="col-md-12 col-sm-12">

                                        <div class="features-caption">
                                            <h1><?= $product['product_name'] ?></h1>
                                            <p><?= $product['product_description'] ?></p>
                                            <!-- <p>By Evan Winter</p> -->
                                            <div class="price">
                                                <?php if ($product['is_promo'] == 1) { ?>
                                                    <h2 id="product_price">RM <?= $product['promo_price'] ?></h2>
                                                    <h2 style="text-decoration: line-through;">RM <?= $product['product_price'] ?></h2>
                                                <?php } else { ?>
                                                    <h2 id="product_price">RM <?= $product['product_price'] ?></h2>
                                                <?php } ?>
                                            </div>
                                            <div class="c-discount">
                                                <p class="c-discount-text">加入会员可享受30%折扣</p>
                                                <p class="c-discount-text">加入会员可享受30%折扣</p>
                                                <p class="c-discount-text">加入会员可享受30%折扣</p>
                                                <p class="c-discount-text">加入会员可享受30%折扣</p>
                                                <p class="c-discount-text">加入会员可享受30%折扣</p>
                                            </div>
                                            <div class="c-btn">
                                                <div class="r-btn">
                                                    加入会员
                                                </div>
                                            </div>



                                            <div class="product__details__widget" style="overflow: visible">
                                                <div class="quantity">
                                                    <div class="pro-qty">
                                                        <span class="fa fa-minus dec qtybtn minus_qty"></span>
                                                        <input type="text" readonly class="" value="1" id="product_quantity">
                                                        <span class="fa fa-plus inc qtybtn add_qty"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="c-option">

                                                <div class="select-Categories pb-30">
                                                    <?php foreach ($product_option as $row) { ?>
                                                        <p class="menu_title"><?= $row['name']  ?> <span style="color:red"><?= $row['minimum_required'] == 1 ? "*Required" : "" ?></span></p>


                                                        <?php if ($row['minimum_required'] != 1) { ?>
                                                            <div class="row no-gutters c-option">
                                                                <?php foreach ($row['selection'] as $rowselect) { ?>
                                                                    <div class="col-4 c-selection">
                                                                        <div class="form-check c-selection-box">
                                                                            <label class="form-check-label c-sb-box">
                                                                                <div class="c-sbb-left">
                                                                                    <input type="checkbox" class="form-check-input" product_option_name="<?= $row['name'] ?>" min_required="<?= $row['minimum_required'] ?>" selection_name="<?= $rowselect['product_option_name'] ?>" product_option_id="<?= $row['product_option_id'] ?>" selection_price="<?= $rowselect['selection_price'] ?>" name="type" value="<?= $rowselect['product_option_selection_id'] ?>">
                                                                                    <p><?= $rowselect['product_option_name'] ?></p>
                                                                                </div>
                                                                                <p>+ RM <?= $rowselect['selection_price'] ?></p>

                                                                                <!-- <input type="radio" class="form-check-input form-radio" min_required="<?= $row['minimum_required'] ?>" product_option_name="<?= $row['name'] ?>" selection_name="<?= $rowselect['product_option_name'] ?>" product_option_id="<?= $row['product_option_id'] ?>" selection_price="<?= $rowselect['selection_price'] ?>" value="<?= $rowselect['product_option_selection_id'] ?>" name="<?= $row['product_option_id'] ?>">Option 1 -->
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>

                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="row c-option">
                                                                <?php foreach ($row['selection'] as $rowselect) { ?>
                                                                    <div class="col-4 c-selection">
                                                                        <div class="form-check c-selection-box">
                                                                            <label class="form-check-label c-sb-box">
                                                                                <div class="c-sbb-left">
                                                                                    <input type="radio" class="form-check-input form-radio" min_required="<?= $row['minimum_required'] ?>" product_option_name="<?= $row['name'] ?>" selection_name="<?= $rowselect['product_option_name'] ?>" product_option_id="<?= $row['product_option_id'] ?>" selection_price="<?= $rowselect['selection_price'] ?>" value="<?= $rowselect['product_option_selection_id'] ?>" name="<?= $row['product_option_id'] ?>">
                                                                                    <p><?= $rowselect['product_option_name'] ?></p>
                                                                                </div>
                                                                                <p>+ RM <?= $rowselect['selection_price'] ?></p>

                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>

                                                            </div>


                                                        <?php } ?>

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
            </div>
        </div>


        <!-- services-area End-->
        <!--Books review Start -->
        <section class="our-client section-padding best-selling">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-1 col-xl-10">
                        <div class="nav-button f-left">
                            <!--Nav Button  -->
                            <nav>
                                <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                    <a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Description</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                        <!-- Tab 1 -->
                        <div class="row">
                            <div class="offset-xl-1 col-lg-9">
                                <p><?= $product['product_description'] ?></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php if (in_array(3, $shop_function)) { ?>
            <section class="latest-items section-padding fix">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section-tittle text-center mb-40">
                            <h2>You May Like</h2>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="latest-items-active">
                        <!-- Single -->
                        <?php foreach ($upsales_product as $row) { ?>
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>"><img src="<?= base_url() .  $row['image'] ?>" alt=""></a>
                                        <div class="socal_icon">

                                            <a href="<?= base_url() . "/main/product_detail/" .   $row['product_id'] ?>"><i class="ti-zoom-in"></i></a>
                                        </div>
                                    </div>
                                    <div class="properties-caption properties-caption2">
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
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Single -->
                    </div>
                </div>
            </section>
        <?php } ?>
        <!-- Books review End -->
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
        var selected_value = get_selected_value().selected_value;
        <?php if ($product['is_promo'] != 1) { ?>
            var product_price = <?= $product['product_price'] ?>;
        <?php } else { ?>
            var product_price = <?= $product['promo_price'] ?>;
        <?php } ?>
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
        <?php if ($product['is_promo'] != 1) { ?>
            var product_price = <?= $product['product_price'] ?>;
            var product_price = product_price + parseFloat(total_selection_price);
        <?php } else { ?>
            var product_price = <?= $product['promo_price'] ?>;
            var product_price = product_price + parseFloat(total_selection_price);
        <?php } ?>

        var product_quantity = $('#product_quantity').val();
        var total_price = (product_price * product_quantity);
        $('#product_price').text("RM " + total_price.toFixed(2));
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
        <?php if ($product['is_promo'] != 1) { ?>
            var product_price = <?= $product['product_price'] ?> + parseFloat(total_selection_price);
        <?php } else { ?>
            var product_price = <?= $product['promo_price'] ?> + parseFloat(total_selection_price);
        <?php } ?>

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