
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
                            isset($_GET['orders_status_id']))
                                ? $_GET['orders_status_id']
                                : '' ?>" name="orders_status_id">
                        </div>
                        
                    </form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="status_btn d-flex mb-2" style="overflow: scroll;">
                                <a onclick="changestatus(1)" class="<?= isset($_GET['orders_status_id']) && $_GET['orders_status_id'] == 1 ?  "btn btn-dark text-white" : "btn btn-danger text-white"  ?>">Pending</a>
                                <a onclick="changestatus(2)" class="<?= isset($_GET['orders_status_id']) && $_GET['orders_status_id'] == 2 ?  "btn btn-dark text-white" : "btn btn-warning text-white"  ?>">Processing Orders</a>
                                <a onclick="changestatus(3)" class="<?= isset($_GET['orders_status_id']) && $_GET['orders_status_id'] == 3 ?  "btn btn-dark text-white" : "btn btn-secondary text-dark"  ?>">On Delivery</a>
                                <a onclick="changestatus(4)" class="<?= isset($_GET['orders_status_id']) && $_GET['orders_status_id'] == 4 ?  "btn btn-dark text-white" : "btn btn-success text-white"  ?>">Done Orders</a>
                                <a onclick="changestatus(5)" class="<?= isset($_GET['orders_status_id']) && $_GET['orders_status_id'] == 5 ?  "btn btn-dark text-white" : "btn btn-primary text-white"  ?>">Rejected</a>

                                <!-- <a onclick="preorder()" class="btn btn-danger text-white">Preorder</a> -->

                            </div>
                            <div class="status_btn d-flex mb-2" style="overflow: scroll;">

                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Total Sales: RM <?= $total_sales ?></h5>
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
                                
                         
                            <table class="table table-striped dataTable table-bordered no-footer " id="orders_list_table" data-method="get" data-url="<?= base_url("orders") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                        <th >No</th>
                                        <th data-sort="shop_name" data-filter="shop_name">Shop Name</th>

                                            <th data-sort="created_at" data-filter="created_at">Order Date</th>
                                            <th data-sort="order_code" data-filter="order_code">Order Code</th>
                                            <th data-sort="full_name" data-filter="full_name">Name</th>
                                            <th data-sort="contact" data-filter="contact">Contact</th>

                                            <th data-sort="address" data-filter="address">Address</th>
                                            <th data-sort="subtotal" data-filter="subtotal">SubTotal</th>
                                            <th data-sort="grand_total" data-filter="grand_total">Total</th>
                                        <th  >Payment Method</th>

                                        <th data-sort="is_paid" data-filter="is_paid">Is Paid</th>
                                            <th data-sort="orders_status" data-filter="orders_status">Order Status</th>
                                            <th data-sort="delivery_fee" data-filter="delivery_fee">Delivery Fee</th>

                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                    $i = $start_no;
                                    foreach($orders as $row){
                                         ?>
                                         
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $i ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['shop_name'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['created_date'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['order_code'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['full_name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['contact'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['address'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>">RM <?= $row['subtotal'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>">RM <?= $row['grand_total'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['payment_method'] ?></a></td>
                                                <?php if($row['payment_method_id'] != 3){ ?>
                                                <td><a class="btn btn-primary" href="<?= base_url() ?>/orders/set_paid/<?= $row['orders_id']?>"><?= $row['is_paid'] == 1 ? "PAID" : "UNPAID" ?></a></td>
                                                <?php }else{ ?>
                                                    <td><a class=""><?= $row['is_paid'] == 1 ? "PAID" : "UNPAID" ?></td>

                                                <?php } ?>
                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['orders_status'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/orders/detail/<?= $row['orders_id']?>"><?= $row['delivery_fee'] ?></a></td>
                                                <td>
                                                <span><a href="<?= base_url() ?>/orders/detail/<?= $row[
    'orders_id'
] ?>" class="btn btn-primary">View</a></span>

<?php if($row['orders_status_id'] == 1) : ?>
                                    <a  href="<?= base_url('/orders/change_status_samepage/2/'). "/" . $row['orders_id'] ?>" class="btn btn-warning">Accept Orders</a>
                                    <a href="<?= base_url('/orders/change_status_samepage/5/') . "/" . $row['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?>
                                <?php if($row['orders_status_id'] == 2) : ?>
                                <a href="<?= base_url('/orders/change_status_samepage/3/') . "/" . $row['orders_id'] ?>" class="btn btn-primary">On Delivery</a>
                                <a href="<?= base_url('/orders/change_status_samepage/5/') . "/" . $row['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?>
                                <?php if($row['orders_status_id'] == 3) : ?>
                                <a href="<?= base_url('/orders/change_status_samepage/4/') . "/" . $row['orders_id'] ?>" class="btn btn-success">Done Orders</a>
                                <a href="<?= base_url('/orders/change_status_samepage/5/') . "/" . $row['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?></td>
                                            </tr>
                                           
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="custom_pagination" id="orders_list_table" data-table="orders_list_table" data-method="get" data-url="<?= base_url("orders") ?>">
                                    <?= $page ?>
                                </div>
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

function changestatus(orders_status_id){

    var url = "<?= base_url() ?>/orders?orders_status_id=" + orders_status_id ;
    <?php if (isset($_GET['dateFrom'])) { ?>
        var url = "<?= base_url() ?>/orders?orders_status_id=" + orders_status_id + "&dateFrom=" + "<?= $_GET[
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