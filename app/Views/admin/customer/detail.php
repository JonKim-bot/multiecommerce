<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'customer'
        ) ?>">Customer</a></li>
        <!-- <li class="breadcrumb-item active"><a href="<?= base_url() ?>/customer/detail/<?= $customer[
    'customer_id'
] ?>">Customer Details</a></li> -->
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
                Member Order Info
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
                                                    'created_date'
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
            <div class="col-md-6">
                <div class="card">
                    <div class="c-card-header">
                        Customer Details
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
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Usename</th>
                                                                <td><?= $customer[
                                                                    'username'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Name</th>
                                                                <td><?= $customer[
                                                                    'name'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Contact</th>
                                                                <td><?= $customer[
                                                                    'contact'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td><?= $customer[
                                                                    'email'
                                                                ] ?></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <th scope="row">Address</th>
                                                                <td><?= $customer[
                                                                    'address'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Post code</th>
                                                                <td><?= $customer[
                                                                    'post_code'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">City</th>
                                                                <td><?= $customer[
                                                                    'city'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Downline</th>
                                                                <td>
                                                                    <ul>
                                                                    
                                                                    <?php foreach($downline as $row){ ?>
                                                                        <li><a href="<?= base_url() ?>/customer/detail/<?= $row['customer_id'] ?>" target="_blank"><?= $row['contact'] ?></a></li>

                                                                    <?php } ?>
                                                                    </ul>
                                                                
                                                                </td>
                                                            </tr>
                                                        </tbody>
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
            </div>
            <div class="col-md-12">
                    <div class="card">
                    <div class="c-card-header">
                                <h2>
                                
                                Total Point : <?= $total_point ?>
                                </h2>
                                <div class="card-header-actions">
                                    <a class="card-header-action">
                                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                    </a>
                                
                                </div>
                            </div>
                            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered no-footer datatable" id="wallet_list_table" data-method="get" data-url="<?= base_url("wallet") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Name</th>
                                <th data-sort="contact" data-filter="contact">Contact</th>
                                <th data-sort="" data-filter="">Transaction</th>
                                <th data-sort="remarks" data-filter="remarks">Remarks</th>
                                <th>Created Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($transaction as $row){
                                         ?>
                                            <tr>
                                            <td><?= $i ?></td>

                                            <td><?= $row['name'] ?></td>
                                    <td><?= $row['contact'] ?></td>
                                    <td><?= $row['transaction'] ?></td>
                                    <td><?= $row['remarks'] ?></td>
                                    <td><?= $row['created_date'] ?></td>
                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                    
            </div>
                    </div>
                </div> 
            </div>
        </div>
       