<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'gift'
        ) ?>">Gift</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/gift/detail/<?= $gift[
    'gift_id'
] ?>">Gift Details</a></li>
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
                            Gift Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url(
                                    'gift/edit'
                                ) .
                                    '/' .
                                    $gift['gift_id']; ?>">
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
                                </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info mb-5">
                                      
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Title</h3></td>
                                                        <td><?= $gift[
                                                            'gift'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Description</h3></td>
                                                        <td><?= $gift[
                                                            'description'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Valid until</h3></td>
                                                        <td><?= $gift[
                                                            'valid_until'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Order Amount Above</h3></td>
                                                        <td><?= $gift[
                                                            'order_amount'
                                                        ] ?></td>

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
                    <div class="fade-in">
        <div class="card">
            <div class="card-header">
                Gifts
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
                            <table class="table table-striped datatable table-bordered no-footer " id="gift_list_table" data-method="get" data-url="<?= base_url("gift") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Customer</th>
                                            <th data-sort="name" data-filter="name">Gift</th>


                                            <th data-sort="name" data-filter="name">Redeem Date</th>
                                            <th data-sort="name" data-filter="name">Is Approve</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($customer_gift as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><?= $i ?></td>
                                             
                                             
                                                <td><a href="<?= base_url() ?>/customer/detail/<?= $row['customer_id']?>"><?= $row['name'] ?></a></td>

                                                <td><?= $row['gift'] ?></td>
                                                <td><?= $row['redeem_date'] ?></td>
                                                <td>
                                                
                                                <?php if($row['is_approve'] == 0) { ?>
                                            <a class="btn btn-danger" href="<?= base_url("gift/approve/") . "/" . $row['customer_gift_id'] ?>">Not Approved</a>
                                        <?php }else{ ?>
                                       
                                        <a class="btn btn-primary" href="<?= base_url("gift/approve/") . "/" . $row['customer_gift_id'] ?>">Approved</a>
                                        <?php } ?>
                                                </td>
                                                <td><a href="<?= base_url() ?>/gift/delete_customer_gift/<?= $row['customer_gift_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>

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
            </div>
                    </div>
        