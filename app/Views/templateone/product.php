

    <main>
        <!-- Hero area Start-->
        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Product Details</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Product Details</a></li> 
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
        <!--  services-area start-->
        <div class="services-area2 pt-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                            <div class="col-xl-12">
                                <!-- Single -->
                                <div class="h1-testimonial-active mobileslider">
                                    <?php foreach($product_image as $row){ ?>
                                    <div class="single-testimonial text-center">
                                    <a href="<?= base_url() . $row['product_image'] ?>" class="fancybox" data-fancybox="images">
                                            <i class="fa fa-eye text-dark fa-2x icon_view hvr-glow"></i>
   
                                            <img src="<?= base_url() . $row['product_image'] ?>" width="100%" alt="">
                                            </a>
                                    </div>
                                    <!-- Single Testimonial -->
                 
                                    <?php } ?>
                                </div>
                                <div class="single-services mb-0">

                                    <div class="col-md-6 pcslider" id="pcslider" style="align-self:center">
                                    <div class="h1-testimonial-active" style="width:90%">
                                    <?php foreach($product_image as $row){ ?>

                                        <div class="single-testimonial text-center">
                                        <a href="<?= base_url() . $row['product_image'] ?>" class="fancybox" data-fancybox="images">
                                            <i class="fa fa-eye text-white fa-2x icon_view hvr-glow"></i>
   
                                            <img src="<?= base_url() . $row['product_image'] ?>" width="100%" alt="">
                                            </a>

                                        </div>
                                        <?php } ?>

                                    </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">

                                        <div class="features-caption">
                                            <h3><?= $product['product_name'] ?></h3>
                                            <!-- <p>By Evan Winter</p> -->
                                            <div class="price">
                                                <span id="product_price">RM <?= $product['product_price'] ?></span>
                                            </div>
                                            <div class="select-Categories pb-30">
                                                <?php foreach($product_option as $row){ ?>
                                                <div class="select-job-items2 mb-30">
                                                    <div class="col-xl-12">
                                                    <?php if($row['minimum_required'] != 1){ ?>
                                                        <select name="select2[]" class="product_option_select">
                                                    <?php }else{ ?>
                                                        <select name="select2[]" class="product_option_select" require>
                                                    <?php } ?>
                                                           <?php foreach($row['selection'] as $key=> $rowselect){ ?>
                                                                <?php if($key == 0){ ?>
                                                                    <option value="0" selection_price="0"
                                                                    product_option_name="0"

                                                                    selection_name="0"
                                                                    product_option_id="0"><?= $row['name'] ?> <?= $row['minimum_required'] == 1 ? "*Required" : '' ?></option>
                                                                <?php }else{ ?>
                                                                    <option value="<?= $rowselect['product_option_selection_id'] ?>"
                                                                    product_option_name="<?= $row['name'] ?>"
                                                                     selection_price="<?= $rowselect['selection_price'] ?>" 
                                                                     selection_name="<?= $rowselect['product_option_name'] ?>"
                                                                     product_option_id="<?= $row['product_option_id'] ?>">
                                                                     <?= $rowselect['product_option_name'] ?> + RM <?= $rowselect['selection_price'] ?></option>

                                                                <?php } ?>

                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                               
                                            </div>
                                            
                                            
                                            <div class="product__details__widget" style="overflow: visible">
                                                <div class="quantity" style="float:left">
                                                <div class="pro-qty">
                                                  <span class="fa fa-minus dec qtybtn minus_qty"></span>
                                                       <input type="text" class="text-white" value="1" id="product_quantity">
                                                  <span class="fa fa-plus inc qtybtn add_qty"></span></div>
                                                </div>
                                                <a  class="white-btn mr-10 add-to-cart-button">Add to Cart</a>
                                                <a href="#" class="border-btn share-btn"><i class="fas fa-share-alt"></i></a>
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
        <!-- Books review End -->
    </main>

    <script>
   function validate(total_selected){
        if (total_selected < <?= $total_min ?>)
        {
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

    $(".product_option_select").on('change', function(){
        var selected_value = get_selected_value().selected_value;
        var product_price = <?= $product['product_price'] ?>;
        var product_quantity = $('#product_quantity').val();
        var total_price =  ( product_price * product_quantity );
       

        item_price =  calculate_total(selected_value,total_price);
        $('#product_price').text((item_price));

    });
    function calculate_total(selected_value,item_price){
        var product_quantity = $('#product_quantity').val();

        selected_value.map(option => 
           item_price = parseFloat(item_price) + (parseFloat(option.selection_price) * parseFloat(product_quantity)) 
        )
        return item_price.toFixed(2)
    }
    $(".add_qty").on('click', function(){
        var product_quantity = parseFloat($('#product_quantity').val()) + 1;
        $('#product_quantity').val(product_quantity);
        calculate_product_price();
    });
    $(".minus_qty").on('click', function(){
        var product_quantity = parseFloat($('#product_quantity').val()) - 1;
        $('#product_quantity').val(product_quantity);
        calculate_product_price();
    });


    function calculate_product_price(){
       var total_selection_price = get_selected_value().selected_total_price;

       var product_price = <?= $product['product_price'] ?> + parseFloat(total_selection_price);
       var product_quantity = $('#product_quantity').val();
       var total_price =  ( product_price * product_quantity );
       $('#product_price').text(total_price.toFixed(2));
    }
    function get_selected_value(){
        selected_count = 0;
        selected_total_price = 0;
        selected_value = [];
        $(".product_option_select option:selected").each(function(){
            var option_selected = {
                selection_name : $(this).attr("selection_name"),
                selection_price : $(this).attr("selection_price"),
                product_option_name : $(this).attr("product_option_name"),
                product_option_id : $(this).attr("product_option_id"),
                product_option_selection_id : $(this).val(),
            }
            selected_value.push(option_selected);
            if(option_selected.product_option_id > 0){
                selected_total_price = parseFloat(option_selected.selection_price) + parseFloat(selected_total_price);
                selected_count = selected_count + 1;
                //count total selected value
            }
        });
        return {
            selected_value : selected_value,
            selected_total_price : selected_total_price,
            selected_count : selected_count,
        };

    }

    $(".add-to-cart-button").on('click', function(){
        var selected_count = get_selected_value().selected_count;
        var selected_value = get_selected_value().selected_value;
        var total_selection_price = get_selected_value().selected_total_price;

        var product_price = <?= $product['product_price'] ?> + parseFloat(total_selection_price);

        if(validate(selected_count) == false){
            return;
        }
        var postParam = {
            product_id : "<?= $product['product_id'] ?>",
            product_single_price : product_price,
            product_name : "<?=  $product['product_name'] ?>",
            quantity : $('#product_quantity').val(),
            product_price :  $('#product_price').text(),
            product_selection : selected_value
        }
        $.post("<?= base_url('main/add_to_cart') ?>", postParam, function(data){
            Swal.fire({
                    title: "Item added",
                    text: "Item added to cart",
                    type: 'success'
            })
                get_header_cart();
        });
        // console.log(product)

    });
    </script>