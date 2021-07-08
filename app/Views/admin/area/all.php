
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/area">Area</a></li>
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
                Areas
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/area/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <div class="col-sm-12" style="padding:40px 0px">
                                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Area/editAll'); ?>">

                                <div class="form-group">
                                    <label for="">All</label>
                                    <textarea class="form-control" style="height:80px" name="description" placeholder="Enter here to change the all description"><?= $areaAll ?></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary text-center" type="submit"> Save</button>
                                </div>
                                </form>
                                </div>
                                <table class="table datatable table-striped table-bordered no-footer " id="area_list_table" data-method="get" data-url="<?= base_url("area") ?>" style="border-collapse: collapse !important">
                                    <thead>
                            
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Name</th>
                                            <th data-sort="banner" data-filter="contact">PDF</th>

                                            <th data-sort="banner" data-filter="contact">Banner</th>
                                            <th data-sort="description" data-filter="contact">Description</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($area as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/area/detail/<?= $row['area_id']?>"><?= $i ?></a></td>
                                                <td><a href="<?= base_url() ?>/area/detail/<?= $row['area_id']?>"><?= $row['name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/<?= $row['downloadable_pdf']?>" download>
                                                    <?php if($row['downloadable_pdf'] != ""){ ?>

                                                        Download PDF
                                                    <?php } ?>
                                                </a></td>

                                                <td><a href="<?= base_url() ?>/area/detail/<?= $row['area_id']?>">

                                                <img src="<?= base_url() . $row['banner']; ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </a></td>

                                                <td><a href="<?= base_url() ?>/area/detail/<?= $row['area_id']?>"><?= $row['description'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/area/delete/<?= $row['area_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
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