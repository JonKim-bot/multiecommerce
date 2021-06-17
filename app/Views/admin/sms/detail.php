<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'sms'
        ) ?>">Sms</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/sms/detail/<?= $sms[
    'sms_id'
] ?>">Sms Details</a></li>
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
                            Sms Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url(
                                    'sms/edit'
                                ) .
                                    '/' .
                                    $sms['sms_id']; ?>">
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
                                                        <td><h3>Template</h3></td>
                                                        <td><?= $sms[
                                                            'template'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Call Action</h3></td>
                                                        <td><?= $sms[
                                                            'call_to_action'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Discount Offer</h3></td>
                                                        <td><?= $sms[
                                                            'discount_offer'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Need</h3></td>
                                                        <td><?= $sms[
                                                            'need'
                                                        ] ?></td>

                                                    </tr>

                                                    <tr>
                                                        <td><h3>Status</h3></td>
                                                        <td><?= $sms[
                                                            'is_sent'
                                                        ] == 1 ? "SENT" : "NOT SENT" ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Created Date</h3></td>
                                                        <td><?= $sms[
                                                            'created_date'
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
                        <div class="c-card-header">
                            Sms Top Up
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" >
                                </a>
                                <a class="card-header-action" class="btn btn-primary" data-toggle="modal" data-target="#optionModal">
                                <button class="btn btn-warning">Top Up</button>
                    </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info mb-5">
                                      
                                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                        <table class="table table-striped datatable table-bordered no-footer " id="sms_list_table" data-method="get" data-url="<?= base_url("sms") ?>" style="border-collapse: collapse !important">
                                                <thead>
                                                    <tr role="row">
                                                        <th>No.</th>
                                                        <th data-sort="name" data-filter="name">Amount</th>
                                                        <th data-sort="name" data-filter="name">Receipt</th>
                                                        <th data-sort="name" data-filter="name">Approved ?</th>
                                                        <th data-sort="name" data-filter="name">Approved Date</th>
 
                                                        <th data-sort="name" data-filter="name">Created date</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   

                                            <?php
                                            $i = 1;
                                            foreach($sms_top_up as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><?= $i ?></td>
                       

                                                <td><?= $row['amount'] ?></td>
                                                <td>
                                                <img width="200px" src="<?= base_url() .  $row['receipt'] ?>" alt="">
                                                </td>
                                                <td><?= $row['is_approved'] == 1 ?  "YES" : "NO" ?></td>
                                                <td><?= $row['approval_date']?></td>
                                                <td><?= $row['created_date']?></td>

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
                <div class="col-md-12">
                <div class="container-fluid">
	
	<div class="fade-in">
        <div class="card">
            <div class="card-header">
            
                Sms
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
                            <table class="table table-striped datatable table-bordered no-footer " id="sms_list_table" data-method="get" data-url="<?= base_url("sms") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Contact</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $i = 1;
                                        foreach($sms_sent as $row){
                                    ?>
                                        <tr>
                                            
                                            <td><a href="<?= base_url() ?>/OrderCustomer/detail/<?= $row['order_customer_id']?>"><?= $i ?></a></td>
                

                                            <td><a href="<?= base_url() ?>/OrderCustomer/detail/<?= $row['order_customer_id']?>"><?= $row['contact'] ?></a></td>
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

            <div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="optionModalLabel">SMS Credit Top Up</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/sms/add_credit/' . $sms['sms_id']) ?>">
                            <div class="modal-body">
                            <p>Please submit your receipt to the account below and wait for approval</p>
                            <p>Note : remember to write your shopname on remarks for faster approval</p>
                            <p>Bank Name : CIMB</p>
                            <p>Bank Account : 7065048564</p>
                            <p>Bank Holder Name : Foon Chin Tian</p>

                            <div class="form-group">
                                    <label for="">Amount</label>
                                    <input type="number" class="form-control" name="amount" min="50" placeholder="e.g. Minimum RM 50" required>
                                </div>
                           
                                <div class="form-group">
                                    <label for="">Receipt (Add your shop name into the remarks when submit receipt)</label>
                                    <input type="file" class="form-control" name="receipt" required>
                                </div>
                           
                                
                                
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
                </div>
                    
                    </div>