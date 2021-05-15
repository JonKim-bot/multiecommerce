<?php foreach($cart as $row){ ?>

<tr>
    <td class="cart__item">
        <div class="cart__item__pic">
            <img src="<?= base_url().  $row['thumbnail'] ?>" alt="">
        </div>
        <div class="cart__item__text">
            <h6>RM <?= $row['price'] ?></h6>
            <?php if($row['product_selection'] != '' ){ ?>
                <?php foreach($row['product_selection'] as $rowselect){ ?>
                    <?php if($rowselect['product_option_name'] != '0'){ ?>
                        <h6><?= $rowselect['product_option_name'] ?> - <?= $rowselect['selection_name'] ?></h6>
                    <?php } ?>

                <?php } ?>
            <?php } ?>

        </div>
    </td>
    <td class="cart__quantity">
        <div class="quantity">
        <div class="pro-qty">
                <span class="fa fa-minus dec qtybtn"></span>
                    <input type="text" value="<?= $row['quantity'] ?>">
                <span class="fa fa-plus inc qtybtn"></span></div>
            </div>
        </div>
    </td>
    <td class="cart__price">RM  <?= $row['total'] ?></td>
    <td class="cart__close"><span class="icon_close"></span></td>
</tr>
<?php } ?>
