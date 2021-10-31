

<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/Productcategory">Product Category</a></li>
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
                Retention Rate
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <!-- <a class="card-header-action" href="<?= base_url() ?>/Productcategory/add">
                        <i class="cil-plus c-icon"></i>
                    </a> -->
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                      
                <form method="GET" id="filter_form">
                     
                        
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-3">
                                    <label for="">Package</label>
                                    <select name="package" class="select filter" id=""  >

                                    <option value="A" >A</option>
                                        <option value="B">B</option>
                                        <option  value="C">C</option>
                                    </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-3">
                                    <label for="">Version</label>
                                    <select name="version" class="select" id=""  >
                                    <?php foreach($version as $row){ ?>

                                        <option value="<?= $row['version'] ?>"><?= $row['version'] ?></option>
                                    <?php  } ?>
                                    </select>
                                
                                </div>
                            
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped dataTable table-bordered no-footer " id="product_category_list_table" data-method="get" data-url="<?= base_url("ProductCategory") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="shop" data-filter="shop">Number of login</th>

                                            <th data-sort="shop" data-filter="shop">Retention Rate</th>
                                            <th data-sort="shop" data-filter="shop">First Sales Merchant count</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                            <tr>
                                                
                                            <td><?= $login_log ?></td>
                                            <td><?= $retention_rate ?></td>
                                            <td><?= $getNumberOfMerchantWhogotfirstsales ?></td>


                                            </tr>
                                      
                                    </tbody>
                                </table>
                                
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

        <script>
            
$(document).on("change", ".filter", function (e) {

$('#filter_form').submit();
});

        </script>