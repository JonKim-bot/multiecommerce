<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url('product') ?>">Product</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/product/detail/<?= $product['product_id'] ?>">Product Details</a></li>
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
                            Product Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url('product/edit') . '/' . $product['product_id'] ?>">
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button>
                                    
                                </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info">
                                            <div class="row mb-5">
                                                <div class="col-lg-12 col-xl-12">
                                                    <img src="<?= base_url() . $product['image']; ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                <tr>
                                                        <td><h3>Status</h3></td>
                                                        <td>
                                                        <a class="btn btn-<?= $product['is_active'] == 1 ? "success" : "danger" ?>" href="<?= base_url() ?>/product/set_status/<?= $product['product_id'] ?>">
                                                        <?= $product['is_active'] == 1 ? "Available" : "Unavailable" ?>
                                                    </a>    

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Name</h3></td>
                                                        <td><?= $product['product_name']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Product Price</h3></td>
                                                        <td>RM<?= $product['product_price']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Product description</h3></td>
                                                        <td><?= $product['product_description']; ?></td>

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
                <!-- <div class="col-md-6">
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
                                <table class="table table-striped datatable table-bordered no-footer " id="product_category_list_table" data-method="get" data-url="<?= base_url("product_category") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="name" data-filter="name">No</th>

                                            <th data-sort="name" data-filter="name">Product Option</th>
                                            <th data-sort="name" data-filter="name">Min Required</th>
                                            <th></th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($product_option as $row){
                                         ?>
                                            <tr>
                                                
                                            <td><?= $i ?></td>
                                                
                                                <td><a href="<?= base_url() ?>/ProductOption/detail/<?= $row['product_option_id']?>" target="_blank"><?= $row['name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/ProductOption/detail/<?= $row['product_option_id']?>" target="_blank"><?= $row['minimum_required'] == 1 ? "Radio Button" : "CheckBox" ?></a></td>
                                                <td><a href="<?= base_url() ?>/ProductOption/detail/<?= $row['product_option_id']?>" target="_blank" class="btn btn-primary">Add Option Selection</a></td>

                                                <td><a href="<?= base_url() ?>/ProductOption/delete/<?= $row['product_option_id']?>" target="_blank" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>

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
        </div> -->
        
                </div>
            </div>
            <!-- <div class="col-md-12">
                <div class="card">
            <div class="card-header">
                Product Image
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" class="btn btn-primary" data-toggle="modal" data-target="#imageModal">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="product_category_list_table" data-method="get" data-url="<?= base_url("product_category") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="name" data-filter="name">No</th>

                                            <th data-sort="name" data-filter="name">Product Image</th>
                                            <th data-sort="name" data-filter="name">Thumbnail</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; foreach($product_image as $row){ ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td>
                                            <img src="<?= base_url($row['product_image']) ?>" class="img-fluid d-block m-auto" alt="" style="width:auto;height:50px;">

                                            </td>
                                            <td>
                                            <a class="btn btn-<?= $row['is_first'] == 1 ? "success" : "danger" ?>" id="<?= $row['product_image_id'] ?>" href="<?= base_url() ?>/product/change_status/<?= $row['product_image_id']?>">
                                                    <?= $row['is_first'] == 1 ? "YES" : "NO" ?></a>
                                            </td>
                                            <td>
                                                <a class="btn btn-warning edit_image" id="<?= $row['product_image_id'] ?>">
                                                    <i class="fa fa-edit"></i>
                                                    Edit</a>
                                                <a href="<?= base_url() ?>/product/delete_image/<?= $row['product_image_id']?>"
                                                    class="btn btn-danger delete-button"><i class="fa fa-trash"></i>
                                                    Delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
                </div>
                    
                    </div> -->
    

            <div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="optionModalLabel"><?= $product['product_name']  ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/ProductOption/add/') . "/" . $product['product_id']; ?>">
                            <div class="modal-body">
                            <div class="form-group">
                                    <label for="">Option</label>
                                    <input type="text" class="form-control" name="product_option" placeholder="e.g. Sambal" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Is Radio Button ? (If radio button mean user must select at least one , for example (ice or no ice)) </label>
                                    <input type="checkbox" class="form-control" name="minimum_required">

                                </div>
                                
                                
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>
    
                <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="imageModalLabel"><?= $product['product_name']  ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form enctype="multipart/form-data"  method="POST" action="<?=base_url('/product/add_image/');?>">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="">Product Picture</label>
                                    <input type="file" class="form-control"  name="product_pic" >
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Product Order Number</label>
                                    <input type="number" class="form-control"  name="order_number" >
                            </div> -->
                            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="EditimageModal" tabindex="-1" role="dialog" aria-labelledby="EditimageModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="EditimageModalLabel">Edit <?= $product['product_name']  ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form enctype="multipart/form-data"  method="POST" action="<?=base_url('/product/edit_image/');?>">
                            <div class="modal-body">
                            <div class="form-group">
                                <label for="">Product Picture</label>
                                    <input type="file" class="form-control"  name="product_pic" >
                            </div>
                            <!-- <div class="form-group">
                                <label for="">Product Order Number</label>
                                    <input type="number" class="form-control"  name="order_number" >
                            </div> -->
                            <input type="hidden" name="product_image_id" id="product_image">
                            <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <script>
                   $(document).on('click','.edit_image',function (e){
                        $('#EditimageModal').modal('show');
                        var product_image_id  = $(this).attr('id');
                        $('#product_image').val(product_image_id)
                    });

                </script>