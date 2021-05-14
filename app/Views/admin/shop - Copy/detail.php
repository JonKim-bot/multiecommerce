<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'shop'
        ) ?>">Shop</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop/detail/<?= $shop[
    'shop_id'
] ?>">Shop Details</a></li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="c-card-header">
                            Shop Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                                <a class="card-header-action" href="<?php echo site_url(
                                    'shop/edit'
                                ) .
                                    '/' .
                                    $shop['shop_id']; ?>">
                                    <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
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
                                                    <img src="<?= base_url() .
                                                        $shop[
                                                            'image'
                                                        ] ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Name</h3></td>
                                                        <td><?= $shop[
                                                            'shop_name'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Address</h3></td>
                                                        <td><?= $shop[
                                                            'address'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Bank</h3></td>
                                                        <td><?= $shop[
                                                            'bank'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Bank Account</h3></td>
                                                        <td><?= $shop[
                                                            'bank_account'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Bank Holder</h3></td>
                                                        <td><?= $shop[
                                                            'bank_holder_name'
                                                        ] ?></td>

                                                    </tr>
                                                   
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <td><h3>Merchant Name</h3></td>
                                                        <td><ul>
                                                            <?php if (
                                                                !empty(
                                                                    $merchant
                                                                )
                                                            ) { ?>
                                                            <?php foreach (
                                                                $merchant
                                                                as $row
                                                            ) { ?>
                                                            <li>
                                                                <a href="<?= base_url() .
                                                                    '/merchant/detail/' .
                                                                    $row[
                                                                        'merchant_id'
                                                                    ] ?>">
                                                            
                                                                <?= $row[
                                                                    'username'
                                                                ] ?>
                                                                </a>
                                                            </li>
                                                            <?php } ?>
                                                            <?php } ?>

                                                        </ul></td>

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