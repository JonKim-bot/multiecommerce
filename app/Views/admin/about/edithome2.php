<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/About">About</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/about/edit/<?= $about['about_id']?>">Edit About Details</a></li>
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
                Edit About Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/about/edithome2/<?=$about["about_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->

                                <div class="form-group">
                                    <label for="">Decription</label>
                                    <textarea class="form-control textarea" name="description" placeholder="Eg : Open since 1997 "><?= $about['description']?></textarea>
                                </div>
                                <img src= "<?= base_url()  . $about['banner']?>" width="150px" />

                                <div class="form-group">
                                    <label for="about">Image (For home section two page) 750x350</label>
                                    <input type="file" class="form-control" name="banner" placeholder="About" >
                                    <label for="" class="small text-danger">*Leave blank if not change image</label>

                                </div>
                              
                    
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>