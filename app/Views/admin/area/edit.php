<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/area">Area</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/area/edit/<?= $area['area_id']?>">Edit Area Details</a></li>
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
                Edit Area Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/area/edit/<?=$area["area_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    
                    <?php if (isset($error)) { ?>
                        <div class="alert-message" role="alert">
                            <?= $error; ?>
                        </div>
                    <?php }else if(isset($_GET['error'])){
                        ?>
                        <div class="alert-message" role="alert">
                            <?= $_GET['error']; ?>
                        </div>

                    <?php }?>
                    <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="<?= $area['name'] ?>" placeholder="e.g. Orchard"   require  >
                </div>
                <div class="form-group">
                    <label for="banner">Banner</label>
                    <input type="file" class="form-control" name="banner" placeholder="Name">
                    <label for="" class="small text-danger">*Leave blank if not change image</label>
                </div>
                
                <div class="form-group">
                    <label for="banner">Downloadable PDF</label>
                    <input type="file" class="form-control" name="downloadable_pdf" placeholder="Name"    >
                    <label for="" class="small text-danger">*Leave blank if not change pdf</label>

                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea class="form-control" name="description" value="<?= $area['description'] ?>" placeholder="Orchard is a nice place..."  style="height:150px"    ><?= $area['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" value="<?= $slug['slug']?>" class="form-control" name="slug" placeholder="e.g. Ang-mo-kio"     >
                </div>
                <input type="hidden" name="slug_id" value='<?= $slug['slug_id']?>'>
                <h3>SEO</h3>

                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="meta_title" value="<?= $area["meta_title"]?>" placeholder="e.g. Orchard"     >
                    </div>
                    <div class="form-group">
                        <label for="">Meta Description</label>
                        <textarea class="form-control" name="meta_description"  placeholder="Orchard is a nice place..."     ><?= $area["meta_description"]?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Meta Keywords</label>
                        <input type="text" class="form-control" name="meta_keywords" value="<?= $area["meta_keywords"]?>" placeholder="Comma Separated"     >
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>