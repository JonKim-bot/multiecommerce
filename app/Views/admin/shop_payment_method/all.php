
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/PaymentMethod">PaymentMethod</a></li>
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
        <div class="card">
            <div class="card-header">
                PaymentMethods
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
                                <table class="table table-striped datatable table-bordered no-footer " id="payment_method_list_table" data-method="get" data-url="<?= base_url("payment_method") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>

                                            <th data-sort="name" data-filter="name">PaymentMethod</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($payment_method as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><?= $i ?></td>
                                               

                                                <td><?= $row['payment_method'] ?></td>
                                                <?php if(in_array($row['payment_method_id'],$shop_payment_method)){?>
                                                <td><a href="<?= base_url() ?>/Shop_payment_method/change_status/<?= $row['payment_method_id']?>" class="btn btn-primary" ><i class="fa fa-superpowers"></i> Active</a></td>
                                                <?php }else{ ?>
                                                    <td><a href="<?= base_url() ?>/Shop_payment_method/change_status/<?= $row['payment_method_id']?>" class="btn btn-primary" ><i class="fa fa-superpowers"></i> Not Active</a></td>

                                                <?php } ?>
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