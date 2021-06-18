<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url('promo') ?>">Promo</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/promo/detail/<?= $promo['promo_id'] ?>">Promo Details</a></li>
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
                            Promo Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url('promo/edit/') . $promo['promo_id'] ?>">
                                    <i class="cil-pencil c-icon"></i>
                                </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                    <?php if($promo['is_active'] == 0) { ?>
                                        <a class="btn btn-primary" href="<?= base_url("promo/change_status/") . "/" . $promo['promo_id'] ?>">Active</a>
                                        <?php }else{ ?>
                                            <a class="btn btn-danger" href="<?= base_url("promo/change_status/") . "/" . $promo['promo_id'] ?>">Unactive</a>
                                       
                                        <?php } ?>
                                        <div class="general-info mb-5">
                                            
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Code</h3></td>
                                                        <td><?= $promo['code']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Promo Type</h3></td>
                                                        <td><?= $promo['promo_type']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Discount Type</h3></td>
                                                        <td><?php if($promo['discount_type_id'] == 2) { ?>
                                                            Amount
                                                            <?php }else if($promo['discount_type_id'] == 3) { ?>
                                                            Percent
                                                            <?php }else{ ?>
                                                            Free Shipping
                                                            <?php } ?>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                    <?php if($promo['discount_type_id'] == 1) { ?>
                                                        <td><h3>Offer Amount</h3></td>
                                                        <td><?= $promo['offer_amount']; ?></td>
                                                    <?php } else if($promo['discount_type_id'] == 2) {?>
                                                        <td><h3>Offer Percent</h3></td>
                                                        <td><?= $promo['offer_percent']; ?></td>
                                                    <?php } ?>
                                                    </tr>
                                                    <tr>
                                                    <label for="">New Member Only * For those member who havent make purchase</label>
                                                        <td><?= $promo['is_newmemberonly'] == 1 ? "YES" : "NO" ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3>Refered member only</h3></td>
                                                        <td><?= $promo['is_affliate'] == 1 ? "YES" : "NO" ?></td>
                                                    </tr>
                                                    <tr>
                                                    <?php if ($promo['promo_type_id'] == 3) {?>
                                                        <td><h3>SKU</h3></td>
                                                        <td><?= $promo['product_id']; ?></td>
                                                    <?php } ?>
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
                    <div class="card-body">
                    <?php if ($order_with_promo) {?>
                    <h5 class="card-title"><a class="btn btn-primary" href="<?= base_url() . "/orders/export_orders/" . $promo['promo_id'] ?>">Export Orders To Csv</a></h5>
                    <?php } ?>
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div>
                        Order History
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="product_category_list_table" data-method="get" data-url="<?= base_url("product_category") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="name" data-filter="name">No</th>

                                            <th data-sort="name" data-filter="name">Contact</th>
                                            <th data-sort="name" data-filter="name">Total</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($order_with_promo as $row){
                                         ?>
                                            <tr>
                                                
                                            <td><?= $i ?></td>
                                                
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>" target="_blank"><?= $row['r_contact'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>" target="_blank">RM <?= $row['total'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>" target="_blank" class="btn btn-primary">View</a></td>

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