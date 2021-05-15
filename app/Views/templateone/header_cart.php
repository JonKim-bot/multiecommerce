<style>
.header-area .header-mid .menu-wrapper .header-right .cart::after {
    content: "<?= $cart_count ?>";
}
.c-quantity .button {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    color: #a3a4ff;
    background: #EFEFEF;
    align-self: center;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    line-height: 1.5;
    cursor: pointer;
}
 .custom-control {
    width: 15%;
    border-radius: 20px;
    text-align: center;
    padding-left: 0;
    padding-right: 0;
    font-weight: bold;
    border: unset;
}
</style>
<div class="col-lg-12">
    <div class="c-cartnoti show" style="display: flex;
    justify-content: space-between;">
        <span class="title-cart">Your Cart</span>
        <span class="c-close closeit" aria-expanded="true">
          <i class="fas fa-times"></i>
        </span>
    </div>
    <div class="cart__table">
        <table>
            <tbody>
            <?php foreach($cart as $key=> $row){ ?>
                <tr>
                    <td class="cart__item p0">
                        <div class="cart__item__pic">
                            <img src="<?= base_url().  $row['thumbnail'] ?>" alt="">
                        </div>
                        <div class="cart__item__text ">
                            <h6><?= $row['product_name'] ?></h6>
                        </div>
                    </td>
                    <td class="cart__price text-right p0" style="text-align:right">RM <?=number_format($row['total'], 2)?></td>
                </tr>
                <tr colspan="2">
                    <td class="cart__quantity"  colspan="2">
                        <div class="c-quantity" style="display:flex;justify-content: flex-end;">
                            <div class="dec button mr-2 qtybtn" onclick="minusQuantity('<?= $key ?>')">-</div>
                            <input type="text" class="custom-control" value="<?= $row['quantity'] ?>">
                            <div class="inc button ml-2 qtybtn" onclick="addQuantity('<?= $key ?>')">+</div>
                        </div>
                    </td>
                </tr>
            <?php } ?>
                <tr>
                    <td class="cart__price text-left" style="text-align:left;font-size:25px">RM <?= $total ?></td>
                    <td class="cart__price">
                    <a class="btn btn-primary btn-block w-100" href="<?= base_url() ?>" style="margin-top:20px">Pay</a>
                    </td>

                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
 $(document).ready(function() {

$('.closeit').click(function(e) {

var $item = $(".shopping-cart");
if ($item.hasClass("active")) {
  $item.removeClass("active");
}
});
});

</script>