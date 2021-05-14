
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop">Shop</a></li>
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
                Shops
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/shop/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-3 text-center animate-box intro-heading">
						<span class="icon"><i class="flaticon-cutlery"></i></span>
                        <h2>Shops</h2>
                        <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url(
                            '/Shop/search'
                        ) ?>">
                            <input type="text" class="form-control" name="shop_name" placeholder="Search By Shop Name">
                        </form>
					</div>
				</div>
				<div class="row" id="shop_list"> 
                    <?php foreach ($shop as $row) { ?>

					<div class="col-md-12 animate-box">
                        <div class="dish-wrap">
                            <!-- <p class="price"><span>$25</span></p> -->
                            <!-- <p class="price"><span>$25</span></p> -->
                            
							<div class="addtocart">
                                <div class="dis-tc">
                                    <span><a href="<?= base_url() ?>/shop/edit/<?= $row[
    'shop_id'
] ?>"><i class="fa fa-pen fa-2x">Edit</i></a></span>
									<span><a href="<?= base_url() ?>/shop/detail/<?= $row[
    'shop_id'
] ?>"><i class="fa fa-eye fa-2x">View</i></a></span>
								</div>
							</div>
							<div class="wrap">
								<div class="dish-img" style="background-image: url(<?= base_url() .
            $row['image'] ?>);"></div>
								<div class="desc" >
                                    <h2><a href="#"><?= $row[
                                        'shop_name'
                                    ] ?></a></h2>

								</div>
							</div>
						</div>
					
                    </div>
                    <?php } ?>
				</div>
			</div>
                    
                </div>
            </div>
        </div>