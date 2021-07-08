
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/customer">Member</a></li>
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
                Member Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <!-- <a class="card-header-action" href="<?= base_url() ?>/customer/add">
                        <i class="cil-plus c-icon"></i>
                    </a> -->
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered no-footer datatable" id="customer_list_table" data-method="get" data-url="<?= base_url("customer") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Name</th>
                                            <th data-sort="contact" data-filter="contact">Contact</th>
                                            <th data-sort="email" data-filter="email">Email</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($customer as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/customer/detail/<?= $row['customer_id']?>"><?= $i ?></a></td>
                                                <td><a href="<?= base_url() ?>/customer/detail/<?= $row['customer_id']?>"><?= $row['name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/customer/detail/<?= $row['customer_id']?>"><?= $row['contact'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/customer/detail/<?= $row['customer_id']?>"><?= $row['email'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/customer/delete/<?= $row['customer_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
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