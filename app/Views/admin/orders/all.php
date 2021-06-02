
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/orders">Order</a></li>
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

                Orders
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/orders/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                <form method="GET" id="filter_form">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="" class="c-label">Date From</label>
                                <br>
                                <input type="date" class="form-control filter" name="dateFrom" 
                                value="<?=  ($_GET and
                            isset($_GET['dateFrom']))
                                ? $_GET['dateFrom']
                                : date('Y-m-d') ?>"
                                >
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                <label for="" class="c-label">Date To</label>
                                <br>
                                <input type="date" class="form-control filter" name="dateTo" value="<?= $dateTo ?>">
                            </div>
                            <input type="hidden" value="<?= ($_GET and
                            isset($_GET['preorder']))
                                ? $_GET['preorder']
                                : '' ?>" name="preorder">

                            <input type="hidden" value="<?= ($_GET and
                            isset($_GET['status_id']))
                                ? $_GET['status_id']
                                : '' ?>" name="status_id">
                        </div>
                        </form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="status_btn d-flex mb-2" style="overflow: scroll;">
                                <a onclick="changestatus(1)" class="btn btn-danger text-white">Pending</a>
                                <a onclick="changestatus(2)" class="btn btn-warning text-white">Processing Orders</a>
                                <a onclick="changestatus(3)" class="btn btn-primary text-white">On Delivery</a>
                                <a onclick="changestatus(4)" class="btn btn-success text-white">Done Orders</a>
                                <a onclick="changestatus(5)" class="btn btn-secondary text-white">Rejected</a>

                                <a onclick="preorder()" class="btn btn-danger text-white">Preorder</a>

                            </div>
                            <div class="status_btn d-flex mb-2" style="overflow: scroll;">

                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Sales: RM <?= $orders_static[
                                        'total'
                                    ] ?></h5>
                                    <h5 class="card-title">Total Number Of Order: <?= $orders_count ?></h5>

                                </div>
                                </div>
                            </div>


                            
                            <!-- <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="btn btn-primary text-white" onclick ="export_to_csv()">Export Orders To Csv</a></h5>

                                </div>
                            </div>
                             -->
                            <div class="table-responsive">
                                
                         
                            <table class="table table-striped datatable table-bordered no-footer " id="special_list_table" data-method="get" data-url="<?= base_url("special") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                        <th data-sort="name" data-filter="name">No</th>
                                        <th data-sort="name" data-filter="name">Payment Method</th>
                                        <th data-sort="name" data-filter="name">Is Paid</th>

                                            <th data-sort="name" data-filter="name">Name</th>
                                            <th data-sort="name" data-filter="name">Address</th>
                                            <th data-sort="name" data-filter="name">Contact</th>
                                            <th data-sort="name" data-filter="name">SubTotal</th>
                                            <th data-sort="name" data-filter="name">Total</th>
                                            <th data-sort="name" data-filter="name">Order Status</th>
                                            <th data-sort="name" data-filter="name">Order Date</th>
                                            <th data-sort="name" data-filter="name">Delivery Fee</th>

                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $i = 1;
                                            foreach($orders as $row){
                                         ?>
                                         
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $i ?></a></td>
                 
                                                
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['payment_method'] ?></a></td>
                                                <td><a class="btn btn-primary" href="<?= base_url() ?>/orders/set_paid/<?= $row['orders_id']?>"><?= $row['is_paid'] == 1 ? "PAID" : "UNPAID" ?></a></td>

                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['full_name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['address'] ?></a></td>
                                          

                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['contact'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>">RM <?= $row['subtotal'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>">RM <?= $row['grand_total'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['orders_status'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['created_date'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['delivery_fee'] ?></a></td>

                                                <td>
                                                <span><a href="<?= base_url() ?>/orders/detail/<?= $row[
    'orders_id'
] ?>" class="btn btn-primary">View</a></span>

<?php if($row['orders_status_id'] == 1) : ?>
                                    <a  href="<?= base_url('/orders/change_status/2/'). "/" . $row['orders_id'] ?>" class="btn btn-warning">Accept Orders</a>
                                    <a href="<?= base_url('/orders/change_status/5/') . "/" . $row['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?>
                                <?php if($row['orders_status_id'] == 2) : ?>
                                <a href="<?= base_url('/orders/change_status/3/') . "/" . $row['orders_id'] ?>" class="btn btn-primary">On Delivery</a>
                                <a href="<?= base_url('/orders/change_status/5/') . "/" . $row['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?>
                                <?php if($row['orders_status_id'] == 3) : ?>
                                <a href="<?= base_url('/orders/change_status/4/') . "/" . $row['orders_id'] ?>" class="btn btn-success">Done Orders</a>
                                <a href="<?= base_url('/orders/change_status/5/') . "/" . $row['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?></td>
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

var dataTable = $('#order_table').DataTable({
 

 "order":[],
    
 "columnDefs":[
     {
         "orderable":false,
     },
 ],

});
        </script>
        <script>

$(document).on("change", ".filter", function (e) {

    $('#filter_form').submit();
});

function changestatus(status_id){

    var url = "<?= base_url() ?>/orders?status_id=" + status_id ;
    <?php if (isset($_GET['dateFrom'])) { ?>
        var url = "<?= base_url() ?>/orders?status_id=" + status_id + "&dateFrom=" + "<?= $_GET[
    'dateFrom'
] ?>"+ "&dateTo=" + "<?= $_GET['dateTo'] ?>" ;

    <?php } ?>
    window.location.href = url;

}


function preorder(){

var url = "<?= base_url() ?>/orders?preorder=1"  ;
<?php if (isset($_GET['dateFrom'])) { ?>
    var url = "<?= base_url() ?>/orders?preorder=1&dateFrom=" + "<?= $_GET[
    'dateFrom'
] ?>"+ "&dateTo=" + "<?= $_GET['dateTo'] ?>" ;
<?php } ?>
window.location.href = url;

}


function export_to_csv(){

    var url = "<?= base_url() ?>/orders/export_orders" ;
<?php if (isset($_GET['dateFrom'])) { ?>
    var url = "<?= base_url() ?>/orders/export_orders?dateFrom=" + "<?= $_GET[
    'dateFrom'
] ?>"+ "&dateTo=" + "<?= $_GET['dateTo'] ?>" ;
<?php } ?>
window.location.href = url;

}

</script> 