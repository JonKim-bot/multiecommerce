<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'announcement'
        ) ?>">Announcement</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/announcement/detail/<?= $announcement[
    'announcement_id'
] ?>">Announcement Details</a></li>
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
                            Announcement Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url(
                                    'announcement/edit'
                                ) .
                                    '/' .
                                    $announcement['announcement_id']; ?>">
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
                                </a>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if (
                                            $announcement['is_active'] == 0
                                        ) { ?>
                                        <a class="btn btn-primary" href="<?= base_url(
                                            'Announcement/change_status/'
                                        ) .
                                            '/' .
                                            $announcement[
                                                'announcement_id'
                                            ] ?>">Hide</a>
                                        <?php } else { ?>
                                            <a class="btn btn-danger" href="<?= base_url(
                                                'Announcement/change_status/'
                                            ) .
                                                '/' .
                                                $announcement[
                                                    'announcement_id'
                                                ] ?>">Show</a>
                                       
                                        <?php } ?>
                                        <div class="general-info mb-5">
                                          
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Title</h3></td>
                                                        <td><?= $announcement[
                                                            'title'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Link Text</h3></td>
                                                        <td><?= $announcement[
                                                            'description'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Link</h3></td>
                                                        <td><?= $announcement[
                                                            'link'
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