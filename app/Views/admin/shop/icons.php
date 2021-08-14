<script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAIJ95ufzqwjC7nE6nuUocyjOABoqFPaA&callback=initAutocomplete&libraries=places&v=weekly"
         defer
         ></script>
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Shop">Shop</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop/icons/<?= $shop['shop_id']?>">Edit Shop Icons</a></li>
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
                Edit Shop Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/shop/icons/<?=$shop["shop_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    <input type="hidden" value="1" name="null">
                    <!-- <img src= "<?= base_url()  . $shop['image']?>" width="150px" />

                    <div class="form-group">
                        <label for="banner">Shop Image</label>
                        <input type="file" class="form-control" name="banner" placeholder="Banner">
                   
                    </div> -->

                    <img src= "<?= base_url()  . $shop['header_icon']?>" width="150px" />

<div class="form-group">
    <label for="icon">Header Icon / Loading icon</label>
    <input type="file" class="form-control" name="header_icon" placeholder="Banner">
</div>
                    <img src= "<?= base_url()  . $shop['icon']?>" width="150px" />

                    <div class="form-group">
                        <label for="icon">Icon Shop</label>

                        <input type="file" class="form-control" name="icon" placeholder="Banner">
                    </div>
              
                    <img src= "<?= base_url()  . $shop['footer_logo']?>" width="150px" />

                    <div class="form-group">
                        <label for="icon">Icon Footer</label>
                        <input type="file" class="form-control" name="icon_footer" placeholder="Banner">
                    </div>

         
                    <div class="form-group mt-2">
                        <button class="btn btn-primary float-right" type="submit"> Save</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>
