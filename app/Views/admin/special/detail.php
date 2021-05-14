<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url('special') ?>">Special</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/special/detail/<?= $special['special_id'] ?>">Special Details</a></li>
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
                            Special Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url('special/edit') . '/' . $special['special_id'] ?>">
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
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                 
                                                    <tr>
                                                        <td><h3>Title</h3></td>
                                                        <td><?= $special['title']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Short Description</h3></td>
                                                        <td><?= $special['short_description']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>description</h3></td>
                                                        <td><?= $special['description']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>view</h3></td>
                                                        <td><?= $special['view']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>address</h3></td>
                                                        <td><?= $special['address']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>google link</h3></td>
                                                        <td><?= $special['google_link']; ?></td>

                                                </tr>
                                                    <tr>
                                                        <td><h3>website link</h3></td>
                                                        <td><?= $special['website_link']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Facebook link</h3></td>
                                                        <td><?= $special['insta']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Insta link</h3></td>
                                                        <td><?= $special['facebook']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>operating hour</h3></td>
                                                        <td><?= $special['operating_hour']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>contact</h3></td>
                                                        <td><?= $special['contact']; ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>special list</h3></td>
                                                        <td><?= $special['special_list']; ?></td>

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
                Special Options
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
                                <table class="table table-striped datatable table-bordered no-footer " id="special_category_list_table" data-method="get" data-url="<?= base_url("special_category") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="name" data-filter="name">No</th>

                                            <th data-sort="name" data-filter="name">Image</th>
                                            <th data-sort="name" data-filter="name">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($special_image as $row){
                                         ?>
                                            <tr>
                                                
                                            <td><?= $i ?></td>
                                                
                                                <td><a href="<?= base_url() ?>/SpecialImage/detail/<?= $row['special_image_id']?>" target="_blank" class="btn btn-primary">
                                                <img src="<?= base_url()  .  $row['special_image'] ?>" alt="">
                                                </a></td>

                                                <td><a href="<?= base_url() ?>/Special/delete_image/<?= $row['special_image_id']?>/<?= $row['special_id']?>" target="_blank" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>

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
                </div>
            </div>
            <div class="modal fade" id="optionModal" tabindex="-1" role="dialog" aria-labelledby="optionModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="optionModalLabel"><?= $special['title']  ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Special/addImage/') . "/" . $special['special_id']; ?>">
                            <div class="modal-body">
                            <div class="form-group">
                                    <label for="banner">Image</label>
                                    <input type="file" class="form-control" name="banner" placeholder="Banner" required>
                                </div> 
                                
                                
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                        </form>
                        </div>
                    </div>
                </div>