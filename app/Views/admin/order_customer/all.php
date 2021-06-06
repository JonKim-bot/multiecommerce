
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/order_customer">OrderCustomer</a></li>
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
                Customer
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/order_customer/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="btn btn-primary text-white" onclick ="export_to_csv()">Export Customer To Csv</a></h5>

                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="order_customer_list_table" data-method="get" data-url="<?= base_url("order_customer") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="name" data-filter="name">Name</th>
                                            <th data-sort="name" data-filter="name">Contact</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($order_customer as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/OrderCustomer/detail/<?= $row['order_customer_id']?>"><?= $row['full_name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/OrderCustomer/detail/<?= $row['order_customer_id']?>"><?= $row['contact'] ?></a>
                                            </td>

                                                
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

        <script>
        function export_to_csv(){

            var url = "<?= base_url() ?>/OrderCustomer/export_customer" ;
            window.location.href = url;
        }

        </script>