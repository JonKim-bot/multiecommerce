
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/shoprate">Shoprate</a></li>
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
                Shoprates
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <!-- <a class="card-header-action" href="<?= base_url() ?>/shoprate/add">
                        <i class="cil-plus c-icon"></i>
                    </a> -->
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                            <table class="table table-striped datatable table-bordered no-footer " id="shoprate_list_table" data-method="get" data-url="<?= base_url("shoprate") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Rate Name</th>
                                            <th data-sort="name" data-filter="name">Rate </th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($shoprate as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/shoprate/detail/<?= $row['shop_rate_id']?>"><?= $i ?></a></td>
                                          
                                                <td><a href="<?= base_url() ?>/shoprate/detail/<?= $row['shop_rate_id']?>"><?= $row['rate_name'] ?></a></td>


                                                <td><a href="<?= base_url() ?>/shoprate/detail/<?= $row['shop_rate_id']?>"><?= $row['rate'] ?></a></td>
                                                
                                                <td><a href="<?= base_url() ?>/shoprate/delete/<?= $row['shop_rate_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
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