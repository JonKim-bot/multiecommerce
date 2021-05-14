
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
                            <div class="form-group col-3">
                                <label for="" class="c-label">Date From</label>
                                <br>
                                <input type="date" class="form-control filter" name="dateFrom" value="<?=  ($_GET and
                            isset($_GET['dateFrom']))
                                ? $_GET['dateFrom']
                                : '0001-01-01' ?>">
                            </div>
                            <div class="form-group col-3">
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
                            
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><a class="btn btn-primary text-white" onclick ="export_to_csv()">Export Orders To Csv</a></h5>

                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table id="order_table" class="table table-striped  table-bordered no-footer " id="orders_list_table" data-method="get" data-url="<?= base_url(
                                    'orders'
                                ) ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">

                                            <th data-sort="name" data-filter="name">Orders</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($orders as $row) { ?>
                                            <tr>
                                            <td>
					<div class="col-md-12 animate-box">
                        <div class="dish-wrap">
                            <!-- <p class="price"><span>$25</span></p> -->
                            <!-- <p class="price"><span>$25</span></p> -->
                            
							<div class="addtocart">
                                <div class="dis-tc">
                                    <span><a href="<?= base_url() ?>/orders/detail/<?= $row[
    'orders_id'
] ?>"><i class="fa fa-eye fa-2x">View</i></a></span>
                                        <!-- <span><a href="<?= base_url() ?>/orders/delete/<?= $row[
    'orders_id'
] ?>"><i class="fa fa-trash fa-2x">Delete</i></a></span> -->
                                </div>
							</div>
							<div class="wrap mt-0">
								<div class="" >
                                    <div class="order_info">
                                    <table class="table mt-5 table-striped font-weight-bold datatable table-bordered no-footer " data-method="get" data-url="<?= base_url(
                                        'orders'
                                    ) ?>" style="border-collapse: collapse !important">

                                            <tr>
                                                <td>Orders ID

                                                <?= $row['orders_id'] ?>

                                                </td>
                                                <td><?= $row[
                                                    'orders_id'
                                                ] ?></td>
    
                                            </tr>
                                            <tr>
                                                <td>Payment Method</td>
                                                <td><?= $row[
                                                    'payment_method'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Customer Name</td>
                                                <td><?= $row[
                                                    'full_name'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td><?= $row[
                                                    'address'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Contact</td>
                                                <td><?= $row[
                                                    'contact'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>SubTotal</td>
                                                <td>RM <?= $row[
                                                    'subtotal'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td>RM <?= $row[
                                                    'grand_total'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Order Status</td>
                                                <td><?= $row[
                                                    'orders_status'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Delivery Date</td>
                                                <td><?= $row[
                                                    'delivery_date'
                                                ] ?></td>    

                                            </tr>
                                            <tr>
                                                <td>Delivery Time</td>
                                                <td><?= $row[
                                                    'delivery_time'
                                                ] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Delivery Fee</td>
                                                <td><?= $row[
                                                    'delivery_fee'
                                                ] ?></td>    
                                            </tr>
                                        </table>

                                        </div>

								</div>
							</div>
						</div>
					
                    </div></td>
                                            </tr>
                                        <?php $i++;}
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

    var url = "<?= base_url() ?>/orders/?status_id=" + status_id ;
    <?php if (isset($_GET['dateFrom'])) { ?>
        var url = "<?= base_url() ?>/emenu/orders/?status_id=" + status_id + "&dateFrom=" + "<?= $_GET[
    'dateFrom'
] ?>"+ "&dateTo=" + "<?= $_GET['dateTo'] ?>" ;

    <?php } ?>
    window.location.href = url;

}


function preorder(){

var url = "<?= base_url() ?>/orders/?preorder=1"  ;
<?php if (isset($_GET['dateFrom'])) { ?>
    var url = "<?= base_url() ?>/emenu/orders/?preorder=1&dateFrom=" + "<?= $_GET[
    'dateFrom'
] ?>"+ "&dateTo=" + "<?= $_GET['dateTo'] ?>" ;
<?php } ?>
window.location.href = url;

}


function export_to_csv(){

    var url = "<?= base_url() ?>/orders/export_orders" ;
<?php if (isset($_GET['dateFrom'])) { ?>
    var url = "<?= base_url() ?>/orders/export_orders/?dateFrom=" + "<?= $_GET[
    'dateFrom'
] ?>"+ "&dateTo=" + "<?= $_GET['dateTo'] ?>" ;
<?php } ?>
window.location.href = url;

}

</script> 