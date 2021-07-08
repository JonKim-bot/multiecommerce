
    <!-- header_lock Section End -->

    <!-- Breadcrumb Begin -->
 

    <!-- Wishlist Section Begin -->
    <section class="wishlist spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="wishlist__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Order Code</th>
                                    <th>Order Date</th>
                                    <th>Total</th>
                                    <th>Is Paid </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($order_history as $row){ ?>
                                <tr>
                                   <td class="wishlist__price"><?= $row['order_code'] ?></td>

                                   <td class="wishlist__price"><?= $row['created_at'] ?></td>

                                    <td class="wishlist__price">RM <?= $row['grand_total'] ?></td>
                                    <td class="wishlist__cart"><a href="<?= base_url() ?>/main/payment/<?= $shop['slug'] ?>/<?= $row['order_code'] ?>" class="primary-btn"><?= $row['is_paid'] == 1 ? "PAID" : "NOT PAID" ?></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wishlist Section End -->
