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


    var addToCartButtons = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToCartButtons.length; i++) {
        var button = addToCartButtons[i]
        button.addEventListener('click', addToCartClicked)
    }

    document.getElementsByClassName('btn-purchase')[0].addEventListener('click', purchaseClicked)
}

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
console.log(item.id);
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

         var itemOrdered = {
             'product_id' : itemId,
             'product_name' : itemName.replace("RM",""),
             'product_price' : itemPrice.replace("RM",""),
             'product_total_price' : itemTotalPrice.replace("RM",""),
             'product_quantity' : itemQuantity,

         }
         itemOrderedArr.push(itemOrdered);

        // console.log(item);
     
        
    });

    return (itemOrderedArr);
 }
 function javascript_abort()
{
   throw new Error('This is not an error. This is just to abort javascript');
}
 function validateField(input,inputName){
     if(input.length == 0){
         alert(inputName + " cannot be empty");
         javascript_abort();
         return
     }


 }
function getPaymentMethod(){
    return "1";
}

function purchaseClicked() {
    var product = getListOfCartItem();
    var shop_id = 1;
    var full_name = document.getElementById('name').value;
    var contact = document.getElementById('contact').value;
    var email = document.getElementById('email').value;
    var delivery_date = document.getElementById('date').value;
    var delivery_time = document.getElementById('deliverytime').value;
    var delivery_option = 1;
    if(delivery_option == 1){

        var delivery_address = document.getElementById('address').value;
    }else{
        var delivery_address = document.getElementById('merchant_address').value;
    }
    validateField(full_name,'full name');
    validateField(contact,'contact');
    validateField(email,'email');
    validateField(delivery_date,'delivery date');
    validateField(delivery_time,'delivery time');
    validateField(delivery_address,'address');

    var subtotal =  document.getElementById('cart-subtotal2').innerText;
    var delivery_fee =  document.getElementById('delivery-fee2').innerText;
    var grand_total =  document.getElementById('grand-total2').innerText;
    var payment_method_id = getPaymentMethod();


    var order_info = {
        'name' :full_name,
        'contact' : contact,
        'email' : email,
        'delivery_date' : delivery_date,
        'delivery_time' : delivery_time,
        'delivery_option' : delivery_option,
        'payment_method_id' : payment_method_id,
        'delivery_address' : delivery_address,
        'delivery_fee' : delivery_fee.replace("RM",""),
        'grand_total' : grand_total.replace("RM",""),
        'subtotal' : subtotal.replace("RM",""),
        'shop_id' : shop_id,
        'product' :product,
        
    }
    // console.log(order_info);
    
    // var order_info = new FormData(order_info);
    // var host = window.location.hostname;
    $.ajax({
        url: "https://piegensoftware.com/restaurant/emenu/Ajax/submit_order",
        method:"POST",
        data:order_info,
        dataType: "json",

        success:function(data)
        {
            // alert(JSON.stringify(data))
            var message = "MyOrder|我的订单 -> Note " + data.url;
            message = encodeURIComponent(message);
            window.location.href = "https://api.whatsapp.com/send?phone="+data.contact+"&text=" + message;
            alert("success");
        }
    });
    // alert(JSON.stringify(order_info));

  
    alert('Thank you for your purchase')


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

function removeCartItem(event) {
    var buttonClicked = event.target

    var itemId = buttonClicked.id;
    document.getElementById('cart-count' + itemId).innerText = 0;
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

    document.getElementById('cart-count' + itemId).innerText = parseFloat(document.getElementById('cart-count' + itemId).innerText) + 1

    var imageSrc = shopItem.getElementsByClassName('shop-item-image')[0].src
    addItemToCart(title, price, imageSrc,itemId)
    checkIfHaveValue(document.getElementById('cart-count' + itemId).innerText,itemId);
    addEventClick();
    updateCartTotal()
}

function appendItemToCart(imageSrc,title,price,cartRow,cartItems,itemId){
    var cartRowContents = `

        <li id="${itemId}" class="cart-itemss">


            <div class="product-wrap" id="product-id-${itemId}">
                <div>
                    <figure class="dish-entry"> 
                    <img src="${imageSrc}" class="dish-img" alt="">
                    </figure>
                </div>
                
                <div class="product-name-wrap" style="align-items: center;">
                    <p class="cd-qty d-inline cart-item-title">${title}</p>
                    <div class="cd-price cart-price">RM ${price}</div>
                    <div class="cd-price cart-initial-price d-none" style="display:none">${price}</div>

                </div>
                <a class="cd-item-remove"  type="button"><i class="fa fa-times-circle" id="${itemId}" aria-hidden="true"></i></a>
            </div>
            <div class="pro-qty">

                <button class="shrink-border inc qtybtn sub" id="${itemId}"><i class="fa fa-minus"></i></button>
                <input type="text" class="cart-quantity-input" title="Quantity:" value="1">
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
        total.innerText = "RM " + grandTotal

    }
}
function calculateGrandTotal2(){
    var subtotal = document.getElementById('cart-subtotal2').innerText.replace("RM","");
    // console.log(subtotal);
    var deliveryFee = document.getElementById('delivery-fee2').innerText.replace("RM","");
    var total = document.getElementById('grand-total2');
    var grandTotal = parseFloat(subtotal) + parseFloat(deliveryFee);
    if(subtotal == 0){
        total.innerText = "RM " + "0"

    }else{
        total.innerText = "RM " + grandTotal

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

function increseButton(event) {
    var buttonClicked = event.target

    var quantityElement = buttonClicked.parentElement;
    var cartQuantityInput = quantityElement.getElementsByClassName('cart-quantity-input')[0];
    var buttonId = buttonClicked.id;
    document.getElementById('cart-count' + buttonId).innerText = parseFloat(cartQuantityInput.value) + 1;
    console.log(cartQuantityInput); 
    cartQuantityInput.value = parseFloat(cartQuantityInput.value) + 1
    checkIfHaveValue(cartQuantityInput.value,buttonId)
    updateCartTotal()

}

function decreseButton(event) {
    var buttonClicked = event.target

    var quantityElement = buttonClicked.parentElement;
    var cartQuantityInput = quantityElement.getElementsByClassName('cart-quantity-input')[0];
    var buttonId = buttonClicked.id;
    if(cartQuantityInput.value != 1){
        document.getElementById('cart-count' + buttonId).innerText = parseFloat(cartQuantityInput.value) - 1;
        
        cartQuantityInput.value = parseFloat(cartQuantityInput.value) - 1
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

function addItemToCart(title, price, imageSrc,itemId) {
    var cartRow = document.createElement('div')
    cartRow.classList.add('cart-row')
    var cartItems = document.getElementsByClassName('cd-cart-items')[0]

    var cartItemNames = cartItems.getElementsByClassName('cart-item-title')
    var cartQuantityInput = cartItems.getElementsByClassName('cart-quantity-input')
    let isInCart = false;
    for (var i = 0; i < cartItemNames.length; i++) {
      
        if (cartItemNames[i].innerText == title) {
            isInCart = true;
            //if item in cart
            cartQuantityInput[i].value = parseFloat(cartQuantityInput[i].value) +  1
        }
    }
    if(!isInCart){
        //if item not in cart
        appendItemToCart(imageSrc,title,price,cartRow,cartItems,itemId)

    }
    if(cartItemNames.length == 0){

      appendItemToCart(imageSrc,title,price,cartRow,cartItems,itemId)
    }
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
    document.getElementsByClassName('cart-total-price')[0].innerText = "RM" + total
    document.getElementById('cart-subtotal2').innerText = "RM" + total

}
      catch(err) {
        var total = 0

        total = Math.round(total * 100) / 100
        document.getElementById('cart-subtotal2').innerText = "RM" + total

        document.getElementsByClassName('cart-total-price')[0].innerText = "RM" + total
      }
    calculateGrandTotal();
    calculateGrandTotal2();
}