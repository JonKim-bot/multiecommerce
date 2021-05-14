<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/ProductOption/detail/<?= $product_option[
    'product_option_id'
] ?>">Option Details</a></li>
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
                            Option Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url(
                                    'ProductOption/edit'
                                ) .
                                    '/' .
                                    $product_option['product_option_id']; ?>">
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
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
                                                <tr>
                                                        <td><h3>Back To Product</h3></td>
                                                        <td><span><a href="<?= base_url() ?>/product/detail/<?= $product_option[
    'product_id'
] ?>" class="btn btn-primary">Back</a></span>
</td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Option Name</h3></td>
                                                        <td><?= $product_option[
                                                            'name'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Type</h3></td>
                                                        <td><?= $product_option[
                                                            'minimum_required'
                                                        ] == 1
                                                            ? 'Radio Button'
                                                            : 'CheckBox' ?></td>

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
            <div class="card-header">
                Product Options
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" class="btn btn-primary" data-toggle="modal" data-target="#optionModal">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="product_category_list_table" data-method="get" data-url="<?= base_url(
                                    'product_category'
                                ) ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="name" data-filter="name">No</th>

                                            <th data-sort="name" data-filter="name">Product Option</th>
                                            <th data-sort="name" data-filter="name">Price</th>
                                                <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach (
                                            $product_option_selection
                                            as $row
                                        ) { ?>
                                            <tr>
                                                
                                            <td><?= $i ?></td>

                                                
                                                <td><a href="<?= base_url() ?>/ProductOptionSelection/detail/<?= $row[
    'product_option_selection_id'
] ?>"><?= $row['product_option_name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/ProductOptionSelection/detail/<?= $row[
    'product_option_selection_id'
] ?>">RM <?= $row['selection_price'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/ProductOptionSelection/delete/<?= $row[
    'product_option_selection_id'
] ?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>

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
                </div>
            </div>

            <div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="optionModalLabel"><?= $product_option[
                                'name'
                            ] ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url(
                            '/ProductOptionSelection/add/'
                        ) .
                            '/' .
                            $product_option['product_option_id'] ?>">
                            <div class="modal-body">
                            <div class="form-group">
                                    <label for="">Selection</label>
                                    <input type="text" class="form-control" name="product_option_selection" placeholder="e.g. Bubble" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Selection Price</label>
                                    <input type="number" class="form-control" name="selection_price" placeholder="e.g. RM 1" step="any"  required>
                                </div>
                                
                                
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>