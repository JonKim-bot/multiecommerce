<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'shoprate'
        ) ?>">Shoprate</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/shoprate/detail/<?= $shoprate[
    'shop_rate_id'
] ?>">Shoprate Details</a></li>
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
                            Shoprate Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url(
                                    'shoprate/edit'
                                ) .
                                    '/' .
                                    $shoprate['shop_rate_id']; ?>">
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
                                </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info mb-5">
                                      
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Rate Name</h3></td>
                                                        <td><?= $shoprate[
                                                            'rate_name'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Rate</h3></td>
                                                        <td><?= $shoprate[
                                                            'rate'
                                                        ] ?></td>

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
                        
                    </div>
                </div>
            </div>