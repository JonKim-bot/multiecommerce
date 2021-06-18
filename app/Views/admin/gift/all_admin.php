
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/gift">Gift</a></li>
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
                Gifts
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <!-- <a class="card-header-action" href="<?= base_url() ?>/gift/add">
                        <i class="cil-plus c-icon"></i>
                    </a> -->
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                            <table class="table table-striped dataTable table-bordered no-footer " id="gift_list_table" data-method="get" data-url="<?= base_url("gift") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="shop_name" data-filter="shop_name">Shop Name</th>

                                            <th >Banner</th>
                                            <th data-sort="gift" data-filter="gift">Gift</th>


                                            <th >Description</th>
                                            <th >Valid Until</th>
                                            <th >Order Amount</th>
                                            <th >Is Active</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = $start_no;
                                            foreach($gift as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/gift/detail/<?= $row['gift_id']?>"><?= $i ?></a></td>
                                                <td><a href="<?= base_url() ?>/gift/detail/<?= $row['gift_id']?>"><?= $row['shop_name'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/gift/detail/<?= $row['gift_id']?>">
                                                <img src="<?= base_url() . $row['banner']; ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </a></td>

                                                <td><a href="<?= base_url() ?>/gift/detail/<?= $row['gift_id']?>"><?= $row['gift'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/gift/detail/<?= $row['gift_id']?>"><?= $row['description'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/gift/detail/<?= $row['gift_id']?>"><?= $row['valid_until'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/gift/detail/<?= $row['gift_id']?>"><?= $row['order_amount'] ?></a></td>
                                               <td>
                                               
                                                <?php if($row['is_active'] == 0) { ?>
                                            <a class="btn btn-danger" href="<?= base_url("gift/change_status/") . "/" . $row['gift_id'] ?>">Unactive</a>
                                        <?php }else{ ?>
                                       
                                        <a class="btn btn-primary" href="<?= base_url("gift/change_status/") . "/" . $row['gift_id'] ?>">Active</a>
                                        <?php } ?>
                                               </td>
                                                <td><a href="<?= base_url() ?>/gift/delete/<?= $row['gift_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="custom_pagination" id="gift_list_table" data-table="gift_list_table" data-method="get" data-url="<?= base_url("gift") ?>">
                                    <?= $page ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>