
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop_operating_hour">ShopOperatingHour</a></li>
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
                ShopOperatingHours
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/shop_operating_hour/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                    <a href="<?= base_url() .
                        '/shop_operating_hour/shop_operating_hourtable' ?>" class="btn btn-primary">Switch To Table View</a>

                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="shop_operating_hour_list_table" data-method="get" data-url="<?= base_url(
                                    'shop_operating_hour'
                                ) ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">

                                            <th data-sort="name" data-filter="name">ShopOperatingHour</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($shop_operating_hour as $row) { ?>
                                            <tr>
                                           

                                                <td>
					<div class="col-md-12 animate-box">
                        <div class="dish-wrap">
                            <!-- <p class="price"><span>$25</span></p> -->
                            <!-- <p class="price"><span>$25</span></p> -->
                            
							<div class="addtocart">
                                <div class="dis-tc">
                                    <span><a href="<?= base_url() ?>/shop_operating_hour/edit/<?= $row[
    'shop_operating_hour_id'
] ?>"><i class="fa fa-pen fa-2x">Edit</i></a></span>
									<span><a href="<?= base_url() ?>/shop_operating_hour/detail/<?= $row[
    'shop_operating_hour_id'
] ?>"><i class="fa fa-eye fa-2x">View</i></a></span>
                                        <span><a href="<?= base_url() ?>/shop_operating_hour/delete/<?= $row[
    'shop_operating_hour_id'
] ?>"><i class="fa fa-trash fa-2x">Delete</i></a></span>
                                </div>
							</div>
							<div class="wrap">
								<div class="dish-img" style="background-image: url(<?= base_url() .
            $row['image'] ?>);"></div>
								<div class="desc" >
                                    <h2><a href="#"><?= $row[
                                        'shop_operating_hour_name'
                                    ] ?> Cat :</a></h2>

								</div>
							</div>
						</div>
					
                    </div></td>
                                                
                                            </tr>

                                        <?php $i++;}
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>


        <script>

$(document).ready(function(){

            function submit_category(){
                alert("asd");
            }

            $('.selection').on('change', function(e) {
        e.preventDefault();
        var value = $(this).val();
        // alert(value);
        window.location.href = ("<?= base_url() ?>/shop_operating_hour?shop_operating_hour_category=" + value);
    })
        });
        </script>