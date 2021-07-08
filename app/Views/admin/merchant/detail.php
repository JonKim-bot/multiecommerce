<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'merchant'
        ) ?>">Merchant</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/merchant/detail/<?= $merchant[
    'merchant_id'
] ?>">Product Details</a></li>
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
                        Merchant Shop
                        <div class="card-header-actions">
                            <a class="card-header-action">
                                <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                            </a>
                            
                        </div>
                    </div>
                    <div class="c-card-body">
                        <div class="view-info">

                        <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Shop Name</th>
                                                                <td><?= $shop[
                                                                    'shop_name'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Contact</th>
                                                                <td><?= $shop[
                                                                    'contact'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Address</th>
                                                                <td><?= $shop[
                                                                    'address'
                                                                ] ?></td>
                                                            </tr>
                                                           
                                                            <tr>
                                                                <th scope="row">Link</th>
                                                                <td>
                                                                <a href="<?= base_url() .
                                                                    '/Shop/detail/' .
                                                                    $shop[
                                                                        'shop_id'
                                                                    ] ?>"><?= base_url() .
    '/Shop/detail/' .
    $shop['shop_id'] ?></a>    
                                                                </td>
                                                            </tr>
                                                            
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
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="c-card-header">
                        Merchant Details
                        <div class="card-header-actions">
                            <a class="card-header-action">
                                <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                            </a>
                            <a class="card-header-action" href="<?php echo site_url(
                                'merchant/edit'
                            ) .
                                '/' .
                                $merchant['merchant_id']; ?>">
                                <button class="btn btn-warning"><i class="cil-pencil c-icon"></i>Edit</button></i>
                            </a>
                        </div>
                    </div>
                    <div class="c-card-body">
                        <div class="view-info">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Usename</th>
                                                                <td><?= $merchant[
                                                                    'username'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Name</th>
                                                                <td><?= $merchant[
                                                                    'name'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Contact</th>
                                                                <td><?= $merchant[
                                                                    'contact'
                                                                ] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td><?= $merchant[
                                                                    'email'
                                                                ] ?></td>
                                                            </tr>
                                                            
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
                </div>
            </div>
        </div>
       