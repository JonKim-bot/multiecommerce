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
                                                    <h1 class="text-center">Logo</h1>
                                                    <img src="<?= base_url() .
                                                        $shop[
                                                            'icon'
                                                        ] ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </div>
                                                <div class="col-lg-12 col-xl-12">
                                                    <h1 class="text-center">Footer Icon</h1>
                                                    <img src="<?= base_url() .
                                                        $shop[
                                                            'footer_logo'
                                                        ] ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </div>

                                                <div class="col-lg-12 col-xl-12">
                                                    <h1 class="text-center">Header Icon</h1>
                                                    <img src="<?= base_url() .
                                                        $shop[
                                                            'header_icon'
                                                        ] ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="row mb-5">
                                                <div class="col-lg-12 col-xl-12">
                                                <h1 class="text-center">Shop Image</h1>

                                                    <img src="<?= base_url() .
                                                        $shop[
                                                            'image'
                                                        ] ?>" width="200" class="img-fluid d-block m-auto" alt="">
                                                </div>
                                            </div>
                                   
                                            <div class="table-responsive">
                                                <table class="table">
                                                <tr>
                                                        <td><h3>Open Status</h3></td>
                                                        <td>
                                                        <a class="btn btn-<?= $shop[
                                                            'is_active'
                                                        ] == 1
                                                            ? 'success'
                                                            : 'danger' ?>" href="<?= base_url() ?>/shop/set_status/<?= $shop[
    'shop_id'
] ?>">
                                                        <?= $shop[
                                                            'is_active'
                                                        ] == 1
                                                            ? 'Open'
                                                            : 'Closed' ?>
                                                    </a>    

                                                    </tr>
                                                <tr>
                                                        <td><h3>Website Link</h3></td>
                                                        <td>
                                                        <a href="<?= base_url() ?>/main/index/<?= $shop[
    'slug'
] ?>"><?= base_url() ?>/main/index/<?= $shop['slug'] ?></a>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Name</h3></td>
                                                        <td><?= $shop[
                                                            'shop_name'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Color </h3></td>
                                                        <td style="background-color:<?= $shop[
                                                            'colour'
                                                        ] ?>"><?= $shop[
                                                            'colour'
                                                        ] ?></td>

                                                    </tr>

                                                    <tr>
                                                        <td><h3>Google map location</h3></td>
                                                        <td style="overflow:auto"><a target="_blank" href="<?= $shop[
                                                            'url'
                                                        ] ?>"><?= $shop[
    'url'
] ?></a></td>

                                                    </tr>
                                                    
                                                    <tr>
                                                        <td><h3>Address</h3></td>
                                                        <td><?= $shop[
                                                            'address'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Taman</h3></td>
                                                        <td><?= $shop[
                                                            'taman'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Shop State</h3></td>
                                                        <td><?= $shop[
                                                            'state'
                                                        ] ?></td>

                                                    </tr>
                                                 
                                                    <tr>
                                                        <td><h3>Contact</h3></td>
                                                        <td><?= $shop[
                                                            'contact'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Email</h3></td>
                                                        <td><?= $shop[
                                                            'email'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Operating Hour</h3></td>
                                                        <td><?= $shop[
                                                            'operating_hour'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Bank</h3></td>
                                                        <td><?= $shop[
                                                            'bank'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Facebook</h3></td>
                                                        <td>
                                                        <a target="_blank" href="<?= $shop[
                                                            'facebook'
                                                        ] ?>"><?= $shop[
    'facebook'
] ?></a>    
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Insta</h3></td>
                                                        <td>
                                                        <a target="_blank" href="<?= $shop[
                                                            'insta'
                                                        ] ?>"><?= $shop[
    'insta'
] ?></a>    
                                                        </td>
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