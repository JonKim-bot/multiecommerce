<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'order_customer'
        ) ?>">OrderCustomer</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/order_customer/detail/<?= $order_customer[
    'order_customer_id'
] ?>">OrderCustomer Details</a></li>
    </ol>
    <!-- <div class="c-subheader-nav d-md-down-none mfe-2">
		<a class="c-subheader-nav-link" href="#">
			<i class="cil-settings c-icon"></i>
			&nbsp;Settings
		</a>
	</div> -->
</div>

<main class="c-main">

    <div class="container-fluid">

        <div class="fade-in">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="c-card-header">
                            OrderCustomer Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                               
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
                                </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info">
                                           
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Name</h3></td>
                                                        <td><?= $order_customer[
                                                            'full_name'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Contact</h3></td>
                                                        <td><?= $order_customer[
                                                            'contact'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Address</h3></td>
                                                        <td><?= $order_customer[
                                                            'address'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Email</h3></td>
                                                        <td><?= $order_customer[
                                                            'email'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Total Spent</h3></td>
                                                        <td>RM <?= $orders_total ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Total Number Of Orders</h3></td>
                                                        <td><?= $orders_count ?> x</td>

                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="c-card-header">
                            OrderCustomer Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                              
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info">
                                           
                                            <div class="table-responsive">
                                                <table class="table">
                                                <tr>

                                                    <th>Order Date</th>
                                                    <th>Total Price</th>
                                                    <th>Print</th>

                                                </tr>

                                            <?php foreach ($orders as $row) { ?>
                                 
                                                <td><?= $row[
                                                    'created_at'
                                                ] ?> </td>
                                                <td> RM<?= $row[
                                                    'grand_total'
                                                ] ?></td>
                                                <td>
              <a class="btn btn-primary" href="<?= base_url() .
                  '/orders/view_receipt/' .
                  $row['orders_id'] ?>" target="_blank">Print</a>
              </td>
                                            </tr>
                                            <?php } ?>

                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>