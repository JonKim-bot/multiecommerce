<div class="col-lg-12">
    <div class="cart__table">
        <table>
            <tbody>
            <?php foreach($cart as $row){ ?>
                <tr>
                    <td class="cart__item p0">
                        <div class="cart__item__pic">
                            <img src="<?= base_url().  $row['thumbnail'] ?>" alt="">
                        </div>
                        <div class="cart__item__text ">
                            <h6><?= $row['product_name'] ?></h6>
                        </div>
                    </td>
                    <td class="cart__price text-right p0" style="text-align:right">RM <?= $row['total'] ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td class="cart__price text-left" style="text-align:left;font-size:25px">RM <?= $total ?></td>
                    <td class="cart__price">
                    <a class="btn btn-primary btn-block w-100" href="cart.php" style="margin-top:20px">Pay</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>