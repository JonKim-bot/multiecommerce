<div class="c-subheader justify-content-between px-3">

    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url('orders') ?>">Orders</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/orders/detail/<?= $orders['orders_id'] ?>">Orders Details</a></li>
    </ol>
    <!-- <div class="c-subheader-nav d-md-down-none mfe-2">
		<a class="c-subheader-nav-link" href="#">
			<i class="cil-settings c-icon"></i>
			&nbsp;Settings
		</a>
	</div> -->
</div>

<style>
    tr > td{
        font-weight:bold;
    }
</style>
<main class="c-main">

    <div class="container-fluid">

        <div class="fade-in">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="c-card-header">
                            Orders Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                               
                            </div>
                            <div class="status_btn mb-2 mt-2" style="overflow: scroll;">
                                <?php if($orders['orders_status_id'] == 1) : ?>
                                    <a href="<?= base_url('/orders/change_status/2/'). "/" . $orders['orders_id'] ?>" class="btn btn-warning">Accept Orders</a>
                                    <a href="<?= base_url('/orders/change_status/5/') . "/" . $orders['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?>
                                <?php if($orders['orders_status_id'] == 2) : ?>
                                <a href="<?= base_url('/orders/change_status/3/') . "/" . $orders['orders_id'] ?>" class="btn btn-primary">On Delivery</a>
                                <a href="<?= base_url('/orders/change_status/5/') . "/" . $orders['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?>
                                <?php if($orders['orders_status_id'] == 3) : ?>
                                <a href="<?= base_url('/orders/change_status/4/') . "/" . $orders['orders_id'] ?>" class="btn btn-success">Done Orders</a>
                                <a href="<?= base_url('/orders/change_status/5/') . "/" . $orders['orders_id'] ?>" class="btn btn-secondary">Rejected</a>
                                <?php endif; ?>
                                <a href="<?= base_url('/orders/change_status/1/') . "/" . $orders['orders_id'] ?>" class="btn btn-secondary">Reset Orders</a>

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
                                                <td>Orders Tracking Link * Customer Can view the link on their payment page , if leave black , default tracking link will provided by system</td>
                                                <td>
                                                
                                                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/orders/add_tracking/' . $orders['orders_id']); ?>">
                                                    <input type="text" class="form-control" name="tracking_link" style="border:1px solid black" value="<?= $orders['tracking_link'] ?>"  required>
                                                    <button class="btn btn-primary float-right" type="submit"> Save</button>
                                                
                                                </form>
                                                </td>

    
                                            </tr>
                                            <tr>
                                                <td>Order Status :</td>
                                                <td class="badge badge-primary" style="font-size: 20px;"> <?= $orders['orders_status'] ?></td>    
                                            </tr>
                                            <!-- <?php if(trim(strtolower($orders['payment_method'])) == "credit card"){ ?>
              <tr>
              <td>Customer Receipt Link : </td>
              <td>
              <a href="<?= $orders['receipt_url'] ?>" target="_blank">Click me to view receipt</a>
              </td>
            </tr>


            <?php }   ?> -->
            <tr>
              <td>Merchant Receipt Link : </td>
              <td>
              <a href="<?= base_url(). "/orders/view_receipt/". $orders['orders_id'] ?>" target="_blank">Click me to view receipt</a>
              </td>
            </tr>
            <!-- <tr>
              <td>Kitchen order Link : </td>
              <td>
              <a href="<?= base_url(). "/orders/kitchen_order/". $orders['orders_id'] ?>" target="_blank">Click me to view kitchen order</a>
              </td>
            </tr> -->
            <tr>
              <td>Notify Customer On Current Status Via Whatsapp</td>
              <td>
              <a href="<?= base_url(). "/orders/notify_customer/". $orders['orders_id'] ?>" target="_blank">Click me to notify customer on order (Whatsapp)</a>
              </td>
            </tr>
            <tr>
              <td>Notify Customer Via Email (Email will be auto send to customer on every status change)</td>
              <td>
              <a href="<?= base_url(). "/main/view_order_status/". $orders['order_code'] ?>" target="_blank">Click me to view customer status on order (Email)</a>
              </td>
            </tr>
                                            <tr>
                                                <td>Orders Code :</td>
                                                <td><?= $orders['order_code'] ?></td>
    
                                            </tr>
                                          
                                            <tr>
                                                <td>Payment Status :</td>
                                                <td><?= $orders['is_paid'] == 1 ?  "PAID" : "UNPAID" ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Pick Up Method :</td>
                                                <td><?= $orders['delivery_fee'] == 0 ? "Self Pick Up" : 'Delivery' ?></td>    
                                            </tr>
                                           
                                            <tr>

                                                <td>Customer Name :</td>
                                                <td><?= $orders['full_name'] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Customer Contact :</td>
                                                <td><?= $orders['contact'] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Customer Email :</td>
                                                <td><?= $orders['email'] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Payment Method :</td>
                                                <td><?= $orders['payment_method'] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Address :</td>
                                                <td><?= $orders['address'] ?></td>    
                                            </tr>
                                          
                                            <tr>
                                                <td>SubTotal :</td>
                                                <td>RM <?= $orders['subtotal'] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Total :</td>
                                                <td>RM <?= $orders['grand_total'] ?></td>    
                                            </tr>
                                            
                                            <!-- <tr>
                                                <td>Delivery Date :</td>
                                                <td><?= $orders['delivery_date'] ?></td>    
                                            </tr>
                                            <tr>
                                                <td>Delivery Time :</td>
                                                <td><?= $orders['delivery_time'] ?></td>    
                                            </tr> -->
                                           
                                            <tr>
                                                <td>Delivery Fee :</td>
                                                <td><?= $orders['delivery_fee'] ?></td>    
                                            </tr>

                                     
                                            <tr>
                                                <td>Created Date :</td>
                                                <td><?= $orders['created_date'] ?></td>    
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
                            Orders Info
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
                                                <?php if($orders['promo_id'] > 0){ ?>
              <tr>
              <td>Promo Code : </td>
              <td>
              <a ><?= $orders['code'] ?></a>
              </td>
            </tr>
            <tr>
              <td>Amount : </td>
              <td>
              <a>RM <?= $orders['amount'] ?></a>
              </td>
            </tr>


            <?php }   ?>
                                                <tr>
                                                   <th>Image</th>

                                                    <th>Product Name</th>
                                                    <th>Product Quantity</th>
                                                    <th>Product Price</th>
                                                    <th>Remark</th>

                                                </tr>

                                            <?php foreach($orders['order_detail'] as $row){ ?>
                                            <tr>
                                            <td><img src="<?= base_url() . $row['image']; ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                            </td>

                                                <td><?= $row['product_name'] ?> 
                                                <?php if(!empty($row['order_detail_option'])){ ?>
                                                <?php foreach($row['order_detail_option'] as $row_option){ ?>
                                                    <li><?= $row_option['option_name'] ?> - <?= $row_option['product_option_name'] ?><br> RM <?= $row_option['selection_price'] ?></li>
                                                <?php  } ?>
                                                <?php  } ?>


                                                </td>
                                                <td><?= $row['product_quantity'] ?> x</td>
                                                <td> RM<?= $row['product_price'] ?></td>
                                                <td><?= $row['remark'] ?></td>

                                            </tr>
                                            <?php  } ?>

                                            <tr>
                                                <td colspan="3">Subtotal :</td>
                                                <td colspan="4">RM <?= $orders['subtotal'] ?></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">Delivery Fee :</td>
                                                <td colspan="4">RM <?= $orders['delivery_fee'] ?></td>

                                            </tr>
                                            <tr>
                                                <td colspan="3">Total :</td>
                                                <td colspan="4">RM <?= $orders['grand_total'] ?></td>

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
            </div>