

<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/ProductCategory">Product Category</a></li>
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
                Product Categorys
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <!-- <a class="card-header-action" href="<?= base_url() ?>/ProductCategory/add">
                        <i class="cil-plus c-icon"></i>
                    </a> -->
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable table-bordered no-footer " id="product_category_list_table" data-method="get" data-url="<?= base_url("productcategory") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th >No</th>
                                            <th data-sort="shop" data-filter="shop">Shop</th>

                                            <th data-sort="category" data-filter="category">Product Category</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = $start_no;
                                            foreach($product_category as $row){
                                         ?>
                                            <tr>
                                                
                                            <td><?= $i ?></td>
                                            <td><a href="<?= base_url() ?>/ProductCategory/detail/<?= $row['category_id']?>"><?= $row['shop_name'] ?></a></td>
                                                  <td><a href="<?= base_url() ?>/ProductCategory/detail/<?= $row['category_id']?>"><?= $row['category'] ?></a></td>
                                                <td>
                                              
                                                <a href="<?= base_url() ?>/ProductCategory/edit/<?= $row['category_id']?>" class="btn btn-warning" ><i class="fa fa-pen"></i> Edit</a>
                                                <a href="<?= base_url() ?>/ProductCategory/detail/<?= $row['category_id']?>" class="btn btn-primary" ><i class="fa fa-eye"></i> View</a>

                                                <a href="<?= base_url() ?>/ProductCategory/delete/<?= $row['category_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a>
                                                </td>

                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                                    <div class="custom_pagination" id="product_category_list_table" data-table="product_category_list_table" data-method="get" data-url="<?= base_url("productcategory") ?>">
                                    <?= $page ?>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>