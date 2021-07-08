if (document.readyState == 'loading') {


    document.addEventListener('DOMContentLoaded', ready)
} else {
    ready()
}

// $(".heart").on('click touchstart', function(){
    
//     $(this).toggleClass('is_animating');
//   });
  

//   /*when the animation is over, remove the class*/
//   $(".heart").on('animationend', function(){
//     $(this).toggleClass('is_animating');
//   });
//   $(document).ready(function(){
// /* when a user clicks, toggle the 'is-animating' class */
// });



function ready() {
    var removeCartItemButtons = document.getElementsByClassName('btn-danger')
    for (var i = 0; i < removeCartItemButtons.length; i++) {
        var button = removeCartItemButtons[i]
        button.addEventListener('click', removeCartItem)

    }

    
    var quantityInputs = document.getElementsByClassName('cart-quantity-input')
    for (var i = 0; i < quantityInputs.length; i++) {
        var input = quantityInputs[i]
        input.addEventListener('change', quantityChanged)
    }

       
    var quantityInputs2 = document.getElementsByClassName('item-cart-count')
    for (var i = 0; i < quantityInputs2.length; i++) {
        var input = quantityInputs2[i]
        input.addEventListener('change', quantityChanged)
    }


        // var addToCartButtons = document.getElementsByClassName('shop-item-button')
        // for (var i = 0; i < addToCartButtons.length; i++) {
        //     var button = addToCartButtons[i]
        //     button.addEventListener('click', addToCartClicked)
        // }


    
    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', modalPopUp)
    }


    document.getElementById('btn-promo').addEventListener('click', applyPromo)

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
    document.getElementsByClassName('btn-purchase')[1].addEventListener('click', purchaseClicked)

}
function modalPopUp(){
    
          product_id = $(this).attr('id');
        console.log(product_id);
        var base_url =  document.getElementById('base_url').value;
        base_url = base_url + "/Ajax/fetch_menu"
        $.ajax({
        url:base_url,

        method:"POST",
        
        data:{product_id:product_id},
        success:function(data)
        {
            console.log(data);
            $('#viewModal').modal('show');
            $('#product_detail').html(data);
        }
        });
}


moment.locale();   
$('#date').val(moment().format("M/D/YYYY"));
$("#date,#deliverytime").on('change', function(){
     let date_selected = $("#date").val();
     let date_today =  moment().format("M/D/YYYY");

     var time_selected = ($('#deliverytime').val());
     var timeNow = (moment().format('LT'));
     var time_selected = time_selected.split(":")[0];
     var timeNow = timeNow.split(":")[0];
     var duration = time_selected - timeNow;
     console.log(date_today + "datetoday");
     console.log(date_selected + "date selected");

     if(date_selected != date_today){
        // alert("preorder");
        console.log("no same date");
        $('#lbl_preorder').show();
        $('#is_preorder').val("1");
     }else{
         if(duration >= 2){
            console.log(duration + "show");
            $('#is_preorder').val("1");

            $('#lbl_preorder').show();

         }else if(duration < 2){
             console.log(duration + "hide");
             $('#lbl_preorder').hide();
             $('#is_preorder').val("0");

         }

     }

});


function addEventClick(){
    document.querySelectorAll('.heart').forEach(button => {

        button.addEventListener('click', e => {
        
         button.classList.toggle('is_animating');
       
        });
    });

}

function initializeCount(){
    var itemCount = 0;
document.querySelectorAll('.item-cart-count').forEach(item => {
 // console.log(item.innerHTML);
 itemCount++;
// console.log(item.id);
 // document.getElementById(item.id).innerText = "none";

 checkIfHaveValue(document.getElementById(item.id).innerText,item.id.replace("cart-count",""))
 
});
 }
getTotalCount();    
 initializeCount();
 function refreashCartCount(){
    var cartCount = document.getElementsByClassName('item-cart-count')

    for (var i = 0; i < cartCount.length; i++) {
      
        cartCount[i].innerText = 0;
    }


 }

 function applyPromo(){
    var base_url =  document.getElementById('base_url').value;

    // var order_info = new FormData(order_info);
    // var host = window.location.hostname;
    var promo_id = document.getElementById('promo_id').value;
    if(promo_id != "0"){
        Swal.fire({
            title: "Promocode already applyed",
            text: "Promocode already applyed",
            type: 'error'
        })
        return;

    }

    var url = base_url + "/Ajax/apply_promo";
    var grand_total =  document.getElementById('grand-total').innerText;
    var promocode =  document.getElementById('promo-code').value;
    var grand_total2 =  document.getElementById('grand-total2').innerText;
    var shop_id = document.getElementById('shop_id').value;

    $.ajax({
        url: url,
        method:"POST",
        data:{grand_total :  grand_total, promocode : promocode , shop_id : shop_id},
        dataType: "json",

        success:function(data)
        {
            
            if(data.status){

                Swal.fire({
                    title: "Discount added",
                    text: "Discount added",
                    type: 'success'
                })
                let amount = data.amount
                let discount = data.discount


                let promo_id = data.promo_id
                
                document.getElementById('f_stripe_total').value =  Math.round((amount)*100);
                document.getElementById('f_grand_total').value =  (amount);
                document.getElementById('grand-total2').innerText = "RM " +  parseFloat(amount).toFixed(2)
                document.getElementById('grand-total').innerText = "RM " +  parseFloat(amount).toFixed(2)
                let subtotal = document.getElementById('cart-subtotal2').innerText.replace("RM","");
                document.getElementById('cart-subtotal').innerText = "RM " +  parseFloat(parseFloat(subtotal) - parseFloat(discount)).toFixed(2)
                document.getElementById('cart-subtotal2').innerText = "RM " +  parseFloat(parseFloat(subtotal) - parseFloat(discount)).toFixed(2)
                document.getElementById('promo_id').value = promo_id

                
                document.getElementById('discount').innerText = "RM " +  discount

            }else{
                
                if(data.error == "Invalid"){

                    Swal.fire({
                        title: "Promocode not valid",
                        text: "Invalid Promocode",
                        type: 'error'
                    })
                }else{
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

 function getListOfCartItem(){
    // var cartItems = document.getElementsByClassName('product-wrap')
    var itemOrderedArr = [];
     document.querySelectorAll('.cart-itemss').forEach(item => {
        //  console.log(item);
         var itemId = item.id;
         var itemName  = item.getElementsByClassName('cart-item-title')[0].innerText;
         var itemPrice = item.getElementsByClassName('cart-initial-price')[0].innerText;
         var itemTotalPrice = item.getElementsByClassName('cart-price')[0].innerText;
         var itemQuantity = item.getElementsByClassName('cart-quantity-input')[0].value;
         var itemRemark = item.getElementsByClassName('cart-item-remark')[0].value;
         var itemAddOn = item.getElementsByClassName('menu-addon')[0].id;
         itemAddOn = itemAddOn.split(",")
         if(itemAddOn == "</ul"){
             itemAddOn = 0;
         }        

        //  console.log(itemAddOn + "item addon");
        // alert(JSON.stringify(itemAddOn));

         var itemOrdered = {
             'product_id' : itemId,
             'product_name' : itemName.replace("RM",""),
             'product_price' : itemPrice.replace("RM",""),
             'product_total_price' : itemTotalPrice.replace("RM",""),
             'product_quantity' : itemQuantity,
             'item_remark' : itemRemark,
             'item_addon' : itemAddOn

         }
         itemOrderedArr.push(itemOrdered);

        // console.log(item);
     
        
    });
    console.log(itemOrderedArr);
    // alert(JSON.stringify(itemOrderedArr));
    return (itemOrderedArr);
 }
 function javascript_abort()
{
   throw new Error('This is not an error. This is just to abort javascript');
}

function hide_all_label(){
    var lbl = document.getElementsByClassName('small')

    for (var i = 0; i < lbl.length; i++) {
      
        lbl[i].style.display = "none";
    }
}

function validateField (input,inputName){


     if(input.length == 0){
         hide_all_label();
         if(window.location.hash.replace("#","") == inputName){
            Swal.fire({
                title: "Please fill in your " + inputName,
                // text: "Select a product to order first",
                type: 'error'
            })
            document.getElementById('btn-purchase-now').innerText = "Place an order";
        document.getElementById("btn-purchase-now").disabled = false;
        document.getElementById("loaderprocess").style.display = "none";

        }else{

            window.location.hash = inputName;
            document.getElementById('btn-purchase-now').innerText = "Place an order";
        document.getElementById("btn-purchase-now").disabled = false;
        document.getElementById("loaderprocess").style.display = "none";

            document.getElementById('lbl_'+inputName).style.display = "block";
            javascript_abort();
           //  break;
           
            return ;
        }
     }



 }
 function getRandom (size)
{
  return Math.floor(Math.random() * size);
}

//Creating the layers for the stars
for (i = 2; i < 12; i++)
{
    window.$("#stars").append('<div class="star_layer" style="transform: translateZ(' + i + 'px) scale(' + (15 - i)/(15) +');"></div>')
}

//Creating the stars
for (i = 0; i < 70; i++)
{
  window.$(".star_layer").eq(getRandom(10)).append('<div class="star"></div>');
}

updateStars();


//Change stars every cycle
setInterval(updateStars, 4000);

//Randomising stars. Position and opacity is changed every cycle.
function updateStars ()
{
    window.$(".star").each(function() {
        window.$(this).css({"top": getRandom(200) + "px", "left": getRandom(200) + "px", "opacity": (20 + getRandom(50))/100});
  });
}
 function getDeliveryOption(){
    var delivery = document.getElementById('delivery');
    var self_pick_up = document.getElementById('pickup');

    if(delivery != null && delivery.checked) {
        return "delivery";

    }else if(self_pick_up != null  && self_pick_up.checked) {
        return "self pick up";
    }else{
        document.getElementById('btn-purchase-now').innerText = "Place an order";
        document.getElementById("btn-purchase-now").disabled = false;
        document.getElementById("loaderprocess").style.display = "none";

        Swal.fire({
            title: "Delivery option not valid",
            text: "Please select a delivery option",
            type: 'error'
        })
        javascript_abort();
        return ;
    }
}


function getPaymentMethod(){
    var online_banking = document.getElementById('payment_method_1');
    var cod = document.getElementById('payment_method_2');
    var credit_card = document.getElementById('payment_method_3');
    if(online_banking != null && online_banking.checked ) {
        document.getElementById('lbl_payment_method').style.display = "none";

        return "1";

    }else if( cod != null && cod.checked) {
        document.getElementById('lbl_payment_method').style.display = "none";

        return "2";
    }else if(credit_card != null && credit_card.checked){
        document.getElementById('lbl_payment_method').style.display = "none";

        return "3";

    }else{
        document.getElementById('btn-purchase-now').innerText = "Place an order";
        document.getElementById("btn-purchase-now").disabled = false;
        document.getElementById("loaderprocess").style.display = "none";
        document.getElementById('lbl_payment_method').style.display = "block";
        window.location.hash = "payment_method_1";
        javascript_abort();

        return;

    }
}
function validate_address(){
    var distance = document.getElementsByClassName('distance')[0];
    var distance = distance.innerText;
    var delivery = document.getElementById('delivery');

    if(delivery != null && delivery.checked) {
        if(distance == ""){
            Swal.fire({
                title: "Invalid address",
                text: "Please enter a valid address",
                type: 'error'
            })
            document.getElementById('btn-purchase-now').innerText = "Place an order";
            document.getElementById("btn-purchase-now").disabled = false;
            document.getElementById("loaderprocess").style.display = "none";
            document.getElementById('lbl_payment_method').style.display = "block";
            window.location.hash = "address";
            javascript_abort();
    
            return;
        }
    }
}
function validate_operating_hour(){
    var day = document.getElementById('day').value;
    var shop_id = document.getElementById('shop_id').value;
    var base_url =  document.getElementById('base_url').value;
    var url = base_url + "/Ajax/check_operating_hour";
    $.post(url,{day:day , shop_id : shop_id}, function(data) {
        data = JSON.parse(data);
        if(data.status == true){
            return true;
        }else{
            document.getElementById('btn-purchase-now').innerText = "Place an order";
            document.getElementById("btn-purchase-now").disabled = false;
            document.getElementById("loaderprocess").style.display = "none";
            Swal.fire({
                title: "Shop not in the operating hour",
                text: "Please check the shop operating hour !",
                type: 'error'
            })
            javascript_abort();
            return false;
        }

    });
    // $.ajax({
    //     url: url,
    //     async:false,
    //     method:"POST",
    //     data:{day:day , shop_id : shop_id},
    //     dataType: "json",
    //     success:function(data)
    //     {
            
    //     }
    
    // });

}
function get_order_info(){
    var product = getListOfCartItem();
    var shop_id = document.getElementById('shop_id').value;
    var full_name = document.getElementById('name').value;
    var contact = document.getElementById('contact').value;
    var customer_id = document.getElementById('customer_id').value;
    
    var is_preorder = document.getElementById('is_preorder').value;
    var url = document.getElementById('url').text;

    var email = document.getElementById('email').value;
    var delivery_date = document.getElementById('date').value;
    var delivery_time = document.getElementById('deliverytime').value;
    var delivery_option = getDeliveryOption();
    if(delivery_option == "delivery"){
        var delivery_address = document.getElementById('address').value;
    }else{
        var delivery_address = document.getElementById('merchant_address').value;
    }
    

    validateField(full_name,'name');
    validateField(contact,'contact');
    // validateField(email,'email');
    validateField(delivery_date,'date');
    validateField(delivery_time,'deliverytime');
    validateField(delivery_address,'address');
    validate_address();
    var subtotal =  document.getElementById('cart-subtotal2').innerText;
    var delivery_fee =  document.getElementById('delivery-fee2').innerText;
    var grand_total =  document.getElementById('grand-total2').innerText;
    var promo_id =  document.getElementById('promo_id').value;

    if(product.length == 0){
        document.getElementById('btn-purchase-now').innerText = "Place an order";
        document.getElementById("btn-purchase-now").disabled = false;
        document.getElementById("loaderprocess").style.display = "none";

        Swal.fire({
            title: "Please select a product",
            text: "Select a product to order first",
            type: 'error'
        })
        window.location.hash= "mains_order";
        // javascript_abort();

        return;
    }
    var payment_method_id = getPaymentMethod();


    var order_info = {
        'name' :full_name,
        'contact' : contact,
        'url' : url,
        'is_preorder' : is_preorder,
        'customer_id' : customer_id,        
        'email' : email,
        'delivery_date' : delivery_date,
        'delivery_time' : delivery_time,
        'delivery_option' : delivery_option,
        'payment_method_id' : payment_method_id,
        'delivery_address' : delivery_address,
        'promo_id' : promo_id,
        'delivery_fee' : delivery_fee.replace("RM",""),
        'grand_total' : grand_total.replace("RM",""),
        'subtotal' : subtotal.replace("RM",""),
        'shop_id' : shop_id,
        'product' :product,   
    }
    return order_info;


}

function purchaseClicked() {
    document.getElementById('btn-purchase-now').innerText = "Processing ....";
    document.getElementById("btn-purchase-now").disabled = true;
    document.getElementById("loaderprocess").style.display = "block";

    var day = document.getElementById('day').value;
    var shop_id = document.getElementById('shop_id').value;
    var base_url =  document.getElementById('base_url').value;
    var url = base_url + "/Ajax/check_operating_hour";
    $.post(url,{day:day , shop_id : shop_id}, function(data) {
        data = JSON.parse(data);
        if(data.status == true){
            
        order_info = get_order_info();
        var base_url =  document.getElementById('base_url').value;
    
        // var order_info = new FormData(order_info);
    
        // var host = window.location.hostname;
        var url = base_url + "/Ajax/submit_order";
        if(order_info.payment_method_id == 3){
    
            document.getElementById("stripe_checkout_js").setAttribute("data-amount", Math.round(order_info.grand_total.replace('RM','')*100)); 
            document.getElementById('btn-submit-stripe').click();
    
            document.getElementById('f_subtotal').value = order_info.subtotal.replace("RM","");
            document.getElementById('f_name').value = order_info.name;
            document.getElementById('f_contact').value =  order_info.contact;
            document.getElementById('f_customer_id').value =  order_info.customer_id;
    
            document.getElementById('f_url').value =  order_info.url;
            document.getElementById('f_preorder').value =  order_info.is_preorder;
            document.getElementById('f_promo_id').value =  order_info.promo_id;
    
            document.getElementById('f_email').value =  order_info.email;
            document.getElementById('f_delivery_option').value =  order_info.delivery_option;
            document.getElementById('f_delivery_date').value =  order_info.delivery_date;
            document.getElementById('f_delivery_time').value =  order_info.delivery_time;
            document.getElementById('f_payment_method_id').value =  order_info.payment_method_id;
            document.getElementById('f_delivery_address').value =  order_info.delivery_address;
            document.getElementById('f_delivery_fee').value =  order_info.delivery_fee.replace('RM','');
            document.getElementById('f_shop_id').value =  order_info.shop_id;
            document.getElementById('f_product').value =  JSON.stringify(order_info.product);
            document.getElementById('f_stripe_total').value =  Math.round(order_info.grand_total.replace('RM','')*100);
            document.getElementById('btn-purchase-now').innerText = "Place an order";
            document.getElementById("btn-purchase-now").disabled = false;
            document.getElementById("loaderprocess").style.display = "none";
    
                    
    
            document.getElementById('f_grand_total').value =  order_info.grand_total.replace('RM','');
    
        }else{
    
            // alert(JSON.stringify(order_info));
            $.ajax({
                url: url,
                method:"POST",
                data:order_info,
                dataType: "json",
        
                success:function(data)
                {
                    document.getElementById('btn-purchase-now').innerText = "Place an order";
                    document.getElementById("btn-purchase-now").disabled = false;
                    document.getElementById("loaderprocess").style.display = "none";
    
                    
        
                    // alert(JSON.stringify(order_info))
                    Swal.fire({
                        title: "Thank you for your order",
                        text: "Order success",
                        type: 'success'
                    })
                    var message = "MyOrder|我的订单 -> Note " + data.url;
                    message = encodeURIComponent(message);
                    window.location.href = "https://api.whatsapp.com/send?phone="+data.contact+"&text=" + message;
        
                    var cartItems = document.getElementsByClassName('cd-cart-items')[0]
        
                    while (cartItems.hasChildNodes()) {
                        var itemId = cartItems.firstChild;
                        // console.log(itemId);
                        refreashCartCount();
                        cartItems.removeChild(cartItems.firstChild);
                        // console.log(itemId);
                        // document.getElementById("cart-count"+itemId).innerText = 0;
                    }
    
                    initializeCount();
                    updateCartTotal()
        
                    getTotalCount();
                }
        
                // alert("success");
                // window.open(
                //     'https://support.wwf.org.uk/earth_hour/index.php?type=individual',
                //     '_blank' // <- This is what makes it open in a new window.
                //   );
        
            
            });
        }




        }else{
            document.getElementById('btn-purchase-now').innerText = "Place an order";
            document.getElementById("btn-purchase-now").disabled = false;
            document.getElementById("loaderprocess").style.display = "none";
            Swal.fire({
                title: "Shop not in the operating hour",
                text: "Please check the shop operating hour !",
                type: 'error'
            })
            javascript_abort();
            return false;
        }

    });
 
    // alert(JSON.stringify(order_info));

  
    // alert('Thank you for your purchase')


    

}

function removeCartItem(event) {
    var buttonClicked = event.target

    var itemId = buttonClicked.id;
    var thisElementCount = buttonClicked.parentElement.parentElement.parentElement;
    var product_count = thisElementCount.getElementsByClassName('cart-quantity-input')[0].value;

    // console.log(thisElementCount);

    var current_item_count = document.getElementById('cart-count' + itemId).innerText;
    var total_count = current_item_count - product_count;
    console.log(product_count);
    document.getElementById('cart-count' + itemId).innerText = total_count;
    checkIfHaveValue(document.getElementById('cart-count' + itemId).innerText,itemId);
    var itemToRemove = buttonClicked.parentElement.parentElement.parentElement.parentElement;

    if(itemToRemove.className == "cd-cart-items"){
        itemToRemove = itemToRemove.children;
    }
    // console.log(itemToRemove.children);  
    itemToRemove.remove()
    getTotalCount();

    updateCartTotal()
}

function quantityChanged(event) {

    var input = event.target;
    // console.log(input);
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateCartTotal()
}


function addToCartClicked(event) {
    var button = event.target
    var shopItem = button.parentElement.parentElement.parentElement.parentElement;
    
    var title = shopItem.getElementsByClassName('shop-item-title')[0].innerText
    var price = shopItem.getElementsByClassName('shop-item-price')[0].innerText
    var itemId = shopItem.getElementsByClassName('item-id')[0].innerText


    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
    addItemToCart(title, price, imageSrc,itemId)
    checkIfHaveValue(document.getElementById('cart-count' + itemId).innerText,itemId);
    addEventClick();

    updateCartTotal()
}

function appendItemToCart(imageSrc,product,price,cartRow,cartItems,itemId){
    var cartRowContents = `

        <li id="${itemId}" class="cart-itemss caitem${itemId}">
            <div class="product-wrap" id="product-id-${itemId}">
                <div>
                
                    <figure class="dish-entry"> 
                    <img src="${imageSrc}" class="dish-img" alt="">
                    </figure>
                </div>
                <div class="product-name-wrap" style="align-items: center;">
                <p class="d-none cart-item-id" style="display:none">${itemId}</p>
                    <p class="cd-qty d-inline cart-item-title">${product.product_name}</p>
                    <ul class="menu-addon" id=${product.product_selection.map(element => `${element.product_option_selection_id}`).join(',')}
                          ${product.product_selection.map(element => `<li class="d-inline" style="padding:0px;padding-bottom:8px">${element.product_option_name} - ${element.selection_name}</li>`).join('')}
                    </ul>
                    <div class="cd-price cart-price">RM ${price}</div>
                    <input class="cd-input cart-item-remark" type="text" placeholder="Note : E.g Less sambal"></input>
                    <div class="cd-price cart-initial-price d-none" style="display:none">${price}</div>
                </div>
                <a class="cd-item-remove"  type="button"><i class="fa fa-times-circle" id="${itemId}" aria-hidden="true"></i></a>
            </div>
            <div class="pro-qty">

                <button class="shrink-border inc qtybtn sub" id="${itemId}"><i class="fa fa-minus"></i></button>
                <input type="text" class="cart-quantity-input"  title="Quantity:" value="1">
                <button class="dec qtybtn add shrink-border" id="${itemId}"><i class="fa fa-plus"></i></button>

            </div>
        </li>
        `

        cartRow.innerHTML = cartRowContents
        cartItems.append(cartRow)

        cartRow.getElementsByClassName('add')[0].addEventListener('click', increseButton)
        cartRow.getElementsByClassName('sub')[0].addEventListener('click', decreseButton)

        cartRow.getElementsByClassName('cd-item-remove')[0].addEventListener('click', removeCartItem)
        cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)

}
function calculateGrandTotal (){
    var subtotal = document.getElementById('cart-subtotal').innerText.replace("RM","");
    var deliveryFee = document.getElementById('delivery-fee').innerText.replace("RM","");
    var total = document.getElementById('grand-total');
    var grandTotal = parseFloat(subtotal) + parseFloat(deliveryFee);
    if(subtotal == 0){
        total.innerText = "RM " + "0"

    }else{
        total.innerText = "RM " + grandTotal.toFixed(2)

    }
}
function calculateGrandTotal2(){
    var subtotal = document.getElementById('cart-subtotal2').innerText.replace("RM","");
    // console.log(subtotal);
    var deliveryFee = document.getElementById('delivery-fee2').innerText.replace("RM","");
    var total = document.getElementById('grand-total2');
    var grandTotal = parseFloat(subtotal) + parseFloat(deliveryFee);
    console.log(deliveryFee + "delivery fee")
    console.log(subtotal + "subtotal")
    if(subtotal == 0){
        total.innerText = "RM " + "0"



    }else{
        total.innerText = "RM " + grandTotal.toFixed(2)

    }
}

function getTotalCount(){
    let countInCart = 0;
    try{

        // var cartItems = document.getElementsByClassName('cd-cart-items')[0]
    
        // var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
        // // var cartQuantityInput = cartItems.getElementsByClassName('cart-quantity-input')
        // for (var i = 0; i < cartItemNames.length; i++) {
          
        //     countInCart++;

        // }
        document.getElementById('button').classList.add("shakenow");
        setTimeout(()=>{
            document.getElementById('button').classList.remove("shakenow");

        },500)
        var totalCartItem = document.getElementsByClassName('item-cart-count')
        // console.log(totalCartItem);
        for (var i = 0; i < totalCartItem.length; i++) {
            var quantity = totalCartItem[i]
            countInCart = parseFloat(quantity.innerText) + countInCart;
            // console.log(quantity.innerText)
            // input.addEventListener('change', quantityChanged)
        }



    }catch{
        countInCart = 0;
    }

    if(countInCart == 0 ){
        // document.getElementById('button').classList.add('show')

        document.getElementById('button').classList.remove('show')
    }else{
        document.getElementById('button').classList.add('show')

    }
    document.getElementById('cart-count').innerText = countInCart;
    // alert(countInCart);

}
function checkIfHaveValue (count,itemId){

   
    // alert(count);
    if(count > 0 ){

        document.getElementById("cart-count"+itemId).parentElement.style.display = "block";
    }else{
        document.getElementById("cart-count"+itemId).parentElement.style.display = "none";


    }

}

function get_total_item_count(item_id){
    var items = document.getElementsByClassName('caitem' + item_id);
    var total = 0;
    for (var i = 0; i < items.length; i++) {
        var cart_count = items[i].getElementsByClassName('cart-quantity-input')[0];
        cart_count = cart_count.value;
        console.log("cartcount " + cart_count);
        console.log(total + " total in loop");

        total = parseFloat(total) + parseFloat(cart_count)
    }
    console.log(total + "total");
    return total;
}
function increseButton(event) {
    var buttonClicked = event.target

    var quantityElement = buttonClicked.parentElement;
    var cartQuantityInput = quantityElement.getElementsByClassName('cart-quantity-input')[0];
    var buttonId = buttonClicked.id;
    //( totalItemCount -  parseFloat(cartQuantityInput.value) ) + totalItemCount;
    // console.log(cartQuantityInput); 
    cartQuantityInput.value = parseFloat(cartQuantityInput.value) + 1
    var totalItemCount = get_total_item_count(buttonId);

    document.getElementById('cart-count' + buttonId).innerText = totalItemCount
    checkIfHaveValue(cartQuantityInput.value,buttonId)
    updateCartTotal()

}

function decreseButton(event) {
    var buttonClicked = event.target

    var quantityElement = buttonClicked.parentElement;
    var cartQuantityInput = quantityElement.getElementsByClassName('cart-quantity-input')[0];
    var buttonId = buttonClicked.id;
    if(cartQuantityInput.value != 1){
        // document.getElementById('cart-count' + buttonId).innerText = parseFloat(cartQuantityInput.value) - 1;
        
        cartQuantityInput.value = parseFloat(cartQuantityInput.value) - 1
        var totalItemCount = get_total_item_count(buttonId);

        document.getElementById('cart-count' + buttonId).innerText = totalItemCount
    }
    checkIfHaveValue(cartQuantityInput.value,buttonId)

    updateCartTotal()
    
}

// function appendItemToCart(imageSrc,title,price,cartRow,cartItems){
//     var cartRowContents = `
//         <div class="cart-item cart-column">
//             <img class="cart-item-image" src="${imageSrc}" width="100" height="100">
//             <span class="cart-item-title">${title}</span>
//         </div>
//         <span class="cart-price cart-column">${price}</span>
//         <div class="cart-quantity cart-column">
//             <input class="cart-quantity-input" type="number" value="1">
//             <button class="btn btn-danger" type="button">REMOVE</button>
//         </div>`
//     cartRow.innerHTML = cartRowContents
//     cartItems.append(cartRow)
//     cartRow.getElementsByClassName('btn-danger')[0].addEventListener('click', removeCartItem)
//     cartRow.getElementsByClassName('cart-quantity-input')[0].addEventListener('change', quantityChanged)

// }

function addItemToCart(product, price, imageSrc,itemId) {
    document.getElementById('cart-count' + itemId).innerText = parseFloat(document.getElementById('cart-count' + itemId).innerText) + 1

    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cd-cart-items')[0]

    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    var cartItemId = cartItems.getElementsByClassName('cart-item-id')

    var cartQuantityInput = cartItems.getElementsByClassName('cart-quantity-input')
    var cartItemMenuAddOn = cartItems.getElementsByClassName('menu-addon')

    let isInCart = false;

    for (var i = 0; i < cartItemNames.length; i++) {
      
        if (cartItemId[i].innerText == itemId) {
            let menu_addon = cartItemMenuAddOn[i].id
            // alert(menu_addon);
            menu_addon = menu_addon.split(",")
            let current_selection_array = `${product.product_selection.map(element => `${element.product_option_selection_id}`).join(',')}`;
            // alert(current_selection_array)
            current_selection_array = current_selection_array.split(",");
            if(menu_addon[0] == ["</ul"]){
                menu_addon = [""]
            }
            // console.log(menu_addon)

            // console.log("menu add on , below array")
            // console.log(current_selection_array)
            if(menu_addon.sort().join(',')=== current_selection_array.sort().join(',')){
                // alert('same members');
                isInCart = true;
                //if item in cart
                cartQuantityInput[i].value = parseFloat(cartQuantityInput[i].value) +  1
            }
            

        }
    }
    if(!isInCart){
        //if item not in cart
        appendItemToCart(imageSrc,product,price,cartRow,cartItems,itemId)

    }
    if(cartItemNames.length == 0){

      appendItemToCart(imageSrc,product,price,cartRow,cartItems,itemId)
    }
    // alert("addedd");
    getTotalCount();
}

function updateCartTotal() {
    try {
        var cartItemContainer = document.getElementsByClassName('cd-cart-items')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
    
    var total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]
        // console.log(cartRow)
        var priceElement = cartRow.getElementsByClassName('cart-price')[0]
        var initialPriceElement = cartRow.getElementsByClassName('cart-initial-price')[0]
        // return;
        var quantityElement = cartRow.getElementsByClassName('cart-quantity-input')[0]
        // var price = parseFloat(priceElement.innerText.replace('RM', ''))
        var initialprice = parseFloat(initialPriceElement.innerText.replace('RM',''))
        var quantity = quantityElement.value;
        var itemTotal = (quantity * initialprice);
        priceElement.innerText = "RM " + itemTotal.toFixed(2);
        total = total + (initialprice * quantity)

    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName('cart-total-price')[0].innerText = "RM " + total.toFixed(2)
    document.getElementById('cart-subtotal2').innerText = "RM " + total.toFixed(2)


}
      catch(err) {
        var total = 0

        total = Math.round(total * 100) / 100
        document.getElementById('cart-subtotal2').innerText = "RM " + total.toFixed(2)

        document.getElementsByClassName('cart-total-price')[0].innerText = "RM " + total.toFixed(2)
      }
    calculateGrandTotal();
    calculateGrandTotal2();
}