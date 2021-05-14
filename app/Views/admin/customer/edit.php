<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Tag">Tag</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/tag/edit/<?= $tag['tag_id']?>">Edit Tag Details</a></li>
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
                Edit Tag Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/tag/edit/<?=$tag["tag_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="">Tag</label>
                        <input type="text" class="form-control" name="tag" placeholder="Tag" value="<?= $tag["tag"]?>" required>
                    </div>
                   
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="meta_title" value="<?= $tag["meta_title"]?>" placeholder="e.g. Orchard" required>
                    </div>
                    <div class="form-group">
                                    <label for="banner">Icon</label>
                                    <input type="file" class="form-control" name="banner" placeholder="Banner" >
                                    <label for="" class="small text-danger">*Leave blank if not change image</label>

                                </div>
                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_description"  placeholder="Orchard is a nice place..."><?= $tag["meta_description"]?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="<?= $tag["meta_keywords"]?>" placeholder="Comma Separated">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>