
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop">shop</a></li>
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
                shops
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/shop/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                    
                        <a href="<?= base_url(). "/shop/retention_rate" ?>" class="btn btn-primary">retention_rate</a>
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="shop_list_table" data-method="get" data-url="<?= base_url("shop") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                        <th data-sort="name" data-filter="name">No</th>
                                        <th data-sort="name" data-filter="name">Image</th>
                                        
                                        <th data-sort="name" data-filter="name">shop</th>
                                        <th data-sort="name" data-filter="name">Payment status</th>
                                        <th data-sort="name" data-filter="name">Package</th>


                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($shop as $row){
                                         ?>
                                         

                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/shop/detail/<?= $row['shop_id']?>"><?= $i ?></a></td>
                                                <td><a href="<?= base_url() ?>/shop/detail/<?= $row['shop_id']?>">
                                                <img src="<?= base_url() . $row['image']; ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </a></td>
                                                <td><a href="<?= base_url() ?>/shop/detail/<?= $row['shop_id']?>"><?= $row['shop_name'] ?></a></td>
                                                <td><a class="btn btn-primary" href="<?= base_url() ?>/shop/mark_paid/<?= $row['shop_id']?>">
                                                <?= $row['payment_status'] == 1 ? "Paid" : 'not paid' ?></a></td>
                                                <td><a  href="<?= base_url() ?>/shop/detail/<?= $row['shop_id']?>">
                                              <?= $row['package'] ?></a></td>
                                                <td>

                                                <a href="<?= base_url() ?>/shop/edit/<?= $row['shop_id']?>" class="btn btn-warningg" ><i class="fa fa-pen"></i> Edit</a>
                                                <a href="<?= base_url() ?>/shop/detail/<?= $row['shop_id']?>" class="btn btn-primaryy" ><i class="fa fa-eye"></i> View</a>


                                                <a href="<?= base_url() ?>/shop/delete/<?= $row['shop_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
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

$(document).ready(function(){

            function submit_category(){
                alert("asd");
            }

            $('.selection').on('change', function(e) {
        e.preventDefault();
        var value = $(this).val();
        // alert(value);
        window.location.href = ("<?= base_url() ?>/shop?shop_category=" + value);
    })
        });
        </script>