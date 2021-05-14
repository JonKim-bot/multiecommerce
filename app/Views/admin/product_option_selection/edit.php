<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/ProductOptionSelection/edit/<?= $product_option_selection['product_option_selection_id']?>">Edit Selection Details</a></li>
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
                Edit Selection Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/ProductOptionSelection/edit/<?=$product_option_selection["product_option_selection_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="">Selection</label>
                        <input type="text" class="form-control" value="<?= $product_option_selection['product_option_name'] ?>" name="product_option_selection" placeholder="e.g. Bubble" required>
                    </div>
                    <div class="form-group">
                        <label for="">Selection Price</label>
                        <input type="number" class="form-control" value="<?= $product_option_selection['selection_price'] ?>" name="selection_price" placeholder="e.g. RM 1" step="any"  required>
                    </div>
                            
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>