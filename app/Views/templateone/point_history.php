
    <!-- header_lock Section End -->

    <!-- Breadcrumb Begin -->
 

    <!-- Wishlist Section Begin -->
    <section class="wishlist spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Total Point : <?= $total_point ?></h1>
                    <div class="wishlist__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Transaction</th>
                                    <th>Remarks</th>
                                    <th>Created Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($point_history as $row){ ?>
                                <tr>
                                   <td class="wishlist__price"><?= $row['transaction'] ?></td>

                                   <td class="wishlist__price"><?= $row['remarks'] ?></td>

                                    <td class="wishlist__price"> <?= $row['created_date'] ?></td>
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
