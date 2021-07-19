<div class="c-dc-header">
    <p>Your Cart 您的订单</p>
</div>
<div class="c-dc-scroll">
    <?php foreach ($cart as $key => $row) { ?>
        <div class="c-cart-item">
            <a class="c-dc-delete" onclick="deleteItem('<?= $key ?>')">
                <i class="fas fa-times"></i>
            </a>
            <div class="c-cart-img">
                <img src="<?= base_url() .  $row['thumbnail'] ?>" alt="">
            </div>
            <div class="c-cart-desc">
                <div class="c-title">
                    <div class="c-dc-name">
                        <h3><?= $row['product_name'] ?></h3>
                    </div>
                    <p class="c-price">RM <?= number_format($row['total'], 2) ?></p>
                </div>

                <div class="c-quantity-box">
                    <!-- <h4 class="c-quan">Quantity</h4> -->
                    <div class="c-quantity">
                        <div class="input-group">
                            <span class="input-group-prepend">
                                <button type="button" onclick="minusQuantity('<?= $key ?>')" class="btn btn-outline-secondary btn-number c-btn-left" data-type="minus" data-field="quant[1]">
                                    <span class="fa fa-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[1]" readonly value="<?= $row['quantity'] ?>" class="form-control input-number c-input" value="<?= $row['quantity'] ?>" min="1" max="10">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary btn-number c-btn-right" data-type="plus" onclick="addQuantity('<?= $key ?>','<?= $row['product_id'] ?>')" data-field="quant[1]">
                                    <span class="fa fa-plus"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- <div class="c-button-box">
                            <button type="button" onclick="deleteItem('94_')" class="btn btn-danger c-button">
                                Remove
                            </button>
                        </div> -->
            </div>
        </div>


    <?php } ?>
</div>


<div class="c-pay-button-box">
    <button type="button" class="btn btn-danger c-button">
        <a href="<?= base_url() ?>/main/cart">
            Checkout
        </a>
    </button>
</div>
<div class="c-dc-total">
    <h5>Total</h5>
    <h5 class="cart_total">RM 0</h5>
</div>