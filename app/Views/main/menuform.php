<style>
@import url("https://fonts.googleapis.com/css2?family=Mulish:wght@400;500;600;700&display=swap");
body {
  font-family: "Mulish", sans-serif;
  margin: 5px;
}

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

.settings form > label {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  padding-left:10px;
  
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  cursor: pointer;
}

.settings form > label input {
  width: 25px;
  height: 25px;
  margin-right: 10px;
  cursor: pointer;
}

.settings form > label input:checked {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  background-color: #716af3;
  position: relative;
}

.settings form > label input:checked::after {
  content: "\2713";
  position: absolute;
  color: white;
  top: 50%;
  -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
  left: 5px;
}

.settings form > label span {
  margin-top: 5px;
  margin-bottom: 5px;
  color: black;
  font-size: 16px;
}

.settings form > label + label {
    border: 0;
    border-top: 1px solid #eeeeee;
  /* margin-top: 15px; */
  /* border-top: 0.5px solid black; */
}

.set-content{
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

.settings form .settings__footer label + label {
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
.menu_title{
    background: lightgrey;
    padding: 13px;
    font-weight: bold;
    color: black;
}
#modal-price{
    text-align:left;
        font-size: 24px;
        color: #404044;
}
.item-cart-count-container-menu{
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

.item-cart{
    position: absolute;
    top: -3px;
    left: 3px;
}
.read_mor_btn2{
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
.modal-title{
    font-size: 23px;
    margin: 0;
    align-items: center;
    text-align: center;
}
.modal-footer{
    display: flex;
    justify-content: flex-end;
    height: 88px;
    margin: 0px;
    }
    .modal-title > button{
        position: relative;
    top: -29px;
    }
</style>
<div class="settings">
<div class="modal-header" style="padding:0px">
        <h5 class="modal-title"><?= $product['product_name'] ?></h5>
        <button type="button" class="close" style="position: relative;top:-30px;" data-dismiss="modal" aria-label="Close">
                <i class="fa fa-times fa-2x"></i>
        </button>
      </div>
<form>
  <?php foreach($product_option as $row){ ?>
    <p class="menu_title"><?= $row['name']  ?> <span style="color:red"><?= $row['minimum_required'] == 1 ? "*Required" : "" ?></span></p>

    <?php if($row['minimum_required'] != 1){ ?>
        <?php foreach($row['selection'] as $rowselect){ ?>
            <label>
                <input type="checkbox" class="form-check-input" product-option-name="<?= $row['name'] ?>"  selection_name="<?= $rowselect['product_option_name'] ?>" product-option-id="<?= $row['product_option_id'] ?>" selection_price="<?= $rowselect['selection_price'] ?>"  name="type" value="<?= $rowselect['product_option_selection_id'] ?>">
                <div style="display: flex; justify-content:space-between;width:89%">

                    <span><?= $rowselect['product_option_name'] ?></span> <span> + RM <?= $rowselect['selection_price'] ?></span>
                </div>
            </label>
            <!-- <hr> -->
        <?php } ?>
    <?php }else{ ?>
        <!-- <fieldset id="<?= $row['product_option_id'] ?>"> -->
        <?php foreach($row['selection'] as $rowselect){ ?>
            <label>
                <!-- <input type="radio" name="sendType" id="" checked> -->
                <input type="radio" class="form-check-input form-radio" product-option-name="<?= $row['name'] ?>"  selection_name="<?= $rowselect['product_option_name'] ?>" product-option-id="<?= $row['product_option_id'] ?>" selection_price="<?= $rowselect['selection_price'] ?>" value="<?= $rowselect['product_option_selection_id'] ?>" name="<?= $row['product_option_id'] ?>">
                <div style="display: flex; justify-content:space-between;width:89%">

                    <span><?= $rowselect['product_option_name'] ?></span> <span> + RM <?= $rowselect['selection_price'] ?></span>
                </div>      
                  </label>
            <!-- <hr> -->
            <!-- <div class="form-check"> -->

                <!-- <label class="form-check-label"></label> -->
            <!-- </div> -->

        <?php } ?>
        <!-- </fieldset> -->

    <?php } ?>

  <?php } ?>
 

</form>
<div class="settings__content set-content">

    <span id="modal-price"
             ></span>
            </div>
        </div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary read_mor_btn add-to-cart" style="float:none" data-dismiss="modal">Close</button>

        <span class="item-cart-count-container-menu">
            <p class="item-cart" id="cart_count_menu">0</p>
        </span>
        <button class="add-to-cart-button add-to-cart read_mor_btn" style="width: 220px;clear:both" type="button">
            <div class="default">Add To Cart</div>
            <div class="success"><i class="fa fa-check"></i></div>
            <div class="cart">
                <div>
                <div></div>
                <div></div>
                </div>
            </div>
            <div class="dots"></div>
        </button>
        <!-- <button type="button" class="btn btn-primary add-to-cart-button">Add To Cart</button> -->
      </div>

<script>
$(document).ready(function(){
    function validate(){
        if ($(".form-radio:checked").length < <?= $total_min ?>)
        {
            Swal.fire({
                    title: "Option",
                    text: "Please select all the required option",
                    type: 'error'
            })
            return false;
        }
    }
    let total_count = get_total_item_count(<?= $product['product_id'] ?>);
    // alert(total_count)
    $('#cart_count_menu').text(total_count);
    <?php if($product['is_promo'] == 1){ ?>

    $('#modal-price').text("RM <?= $product['promo_price'] ?>");
     <?php }else{ ?>
      $('#modal-price').text("RM <?= $product['product_price'] ?>");

     <?php } ?>
    function calculate_total(selected_value,item_price){
        selected_value.map(option => 
            item_price = parseFloat(item_price) + parseFloat(option.selection_price)
        )
        // console.log(item_price);

        // item_price = item_price
        return item_price.toFixed(2)
        
    }
    var item_price = $('#modal-price').text();

    var selected_value = [];
    $(".form-check-input").on('click change', function(){
        selected_value = [];
        $("input:checkbox[name=type]:checked").each(function(){
            var option_selected = {
                product_option_id : $(this).attr("product-option-id"),
                product_option_name : $(this).attr("product-option-name"),

                selection_price : $(this).attr("selection_price"),
                selection_name : $(this).attr("selection_name"),
                product_option_selection_id : $(this).val(),
            }
            selected_value.push(option_selected);
        });

        $(".form-radio:checked").each(function(){
            var option_selected = {
                product_option_id : $(this).attr("product-option-id"),
                product_option_name : $(this).attr("product-option-name"),
                selection_price : $(this).attr("selection_price"),
                selection_name : $(this).attr("selection_name"),
                product_option_selection_id : $(this).val(),
            }
            selected_value.push(option_selected);
            console.log(selected_value);
        });
        <?php if($product['is_promo'] == 1){ ?>

          item_price = "RM " + calculate_total(selected_value,"<?= $product['promo_price'] ?>");
 <?php }else{ ?>

        item_price = "RM " + calculate_total(selected_value,"<?= $product['product_price'] ?>");
 <?php } ?>
        $('#modal-price').text((item_price));
    });

    $(".add-to-cart-button").on('click', function(){
        if(validate() == false){
            return;
        }
        var product = {
            product_id : "<?= $product['product_id'] ?>",
            product_name : "<?=  $product['product_name'] ?>",
            product_selection : selected_value
        }
        // console.log(product)
        window.addItemToCart(product, item_price, "<?= base_url() . $product['image'] ?>" ,"<?= $product['product_id'] ?>");
        window.checkIfHaveValue(document.getElementById('cart-count' + "<?= $product['product_id'] ?>").innerText,"<?= $product['product_id'] ?>");


        window.addEventClick();
        window.updateCartTotal();
        let total_count = get_total_item_count(<?= $product['product_id'] ?>);
        $('#cart_count_menu').text(total_count);

    });
});

</script>