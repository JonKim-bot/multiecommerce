<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>merchant">Merchant</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/merchant/edit/<?= $merchant['merchant_id']?>">Edit Merchant Details</a></li>
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
                Edit Merchant Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/merchant/edit/<?=$merchant["merchant_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail" multiple>
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                        <small class="smallalert">* LEAVE BLANK IF NOT CHANGE THUMBNAIL **</small>
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" name="merchant" placeholder="Username" value="<?= $merchant["username"]?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="<?= $merchant["name"]?>" required>
                    </div>
                    <div class="form-group">
                        <label class="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <small class="smallalert"> * LEAVE BLANK IF NOT CHANGE PASSWORD **</small>
                    </div>
                    <div class="form-group">
                        <label class="">Confirm Password</label>
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                        <small class="smallalert"> * LEAVE BLANK IF NOT CHANGE PASSWORD **</small>
                    </div>
                    <div class="form-group">
                        <label for="">Contact Number</label>
                        <input type="text" class="form-control" name="contact" placeholder="Contact Number" value="<?= $merchant["contact"]?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $merchant["email"]?>" required>
                    </div>
                    

                   
                
                    
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                </form>
            </div>
            
        </div>