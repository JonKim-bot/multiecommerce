<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'banner'
        ) ?>">Banner</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/banner/detail/<?= $banner[
    'banner_id'
] ?>">Banner Details</a></li>
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
                            Banner Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url(
                                    'banner/edit'
                                ) .
                                    '/' .
                                    $banner['banner_id']; ?>">
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
                                </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info mb-5">
                                            <div class="row mb-5">
                                                <div class="col-lg-12 col-xl-12">
                                                    <img src="<?= base_url() .
                                                        $banner[
                                                            'banner'
                                                        ] ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Title</h3></td>
                                                        <td><?= $banner[
                                                            'title'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Description</h3></td>
                                                        <td><?= $banner[
                                                            'description'
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