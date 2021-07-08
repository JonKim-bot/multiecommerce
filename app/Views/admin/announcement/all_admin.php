
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/announcement">Announcement</a></li>
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
                Announcements
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/announcement/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable table-bordered no-footer " id="announcement_list_table" data-method="get" data-url="<?= base_url(
                                    'announcement'
                                ) ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">

                                            <th data-sort="title" data-filter="title">Announcement</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($announcement as $row) { ?>
                                            <tr>
                                            <td>
					<div class="col-md-12 animate-box">
                        <div class="dish-wrap">
                            <!-- <p class="price"><span>$25</span></p> -->
                            <!-- <p class="price"><span>$25</span></p> -->
                            
							<div class="addtocart">
                                <div class="dis-tc">
                                    <span><a href="<?= base_url() ?>/announcement/edit/<?= $row[
    'announcement_id'
] ?>"><i class="fa fa-pen fa-2x">Edit</i></a></span>
									<span><a href="<?= base_url() ?>/announcement/detail/<?= $row[
    'announcement_id'
] ?>"><i class="fa fa-eye fa-2x">View</i></a></span>
                                        <span><a href="<?= base_url() ?>/announcement/delete/<?= $row[
    'announcement_id'
] ?>"><i class="fa fa-trash fa-2x">Delete</i></a></span>
                                </div>
							</div>
							<div class="wrap">
								<div class="dish-img" style="background-image: url(<?= base_url() .
            $row['banner'] ?>);"></div>
								<div class="desc" >
                                <h2><a href="#"><?= $row[
                                        'title'
                                    ] ?> - <?= $row[
                                        'shop_name'
                                    ] ?></a></h2>

								</div>
							</div>
						</div>
					
                    </div></td>
                                            </tr>
                                        <?php $i++;}
                                        ?>
                                    </tbody>
                                </table>
                                <div class="custom_pagination" id="announcement_list_table" data-table="announcement_list_table" data-method="get" data-url="<?= base_url("announcement") ?>">
                                    <?= $page ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>