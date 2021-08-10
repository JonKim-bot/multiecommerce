<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Banner">Banner</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Banner/add">Create New Banner</a></li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Create New Banner
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Banner/add'); ?>">
                                <!-- <div class="form-group">
                                <label for="">Profile Picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div>
                            </div> -->
                                <?php if (isset($error)) { ?>
                                    <div class="alert-message" role="alert">
                                        <?= $error; ?>
                                    </div>
                                <?php } ?>
                                <!-- <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="hidden" class="form-control" name="title" placeholder="e.g. Best Restaurant In Town" required>
                                </div>
                             -->
                                <div class="form-group">
                                <label for="">Type (enter 1 for desktop , 2 for mobile banner)</label>
                                    <select name="type_id" class="select" id=""  required>
                                        <option value="1">Desktop</option>
                                        <option value="2">Banner</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="banner">Banner *1920x700 </label>
                                    <input type="file" class="form-control" name="banner" placeholder="Banner" required>
                                </div>
<!--                                 
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control " type="hidden"  name="description" placeholder="Eg : Open since 1997 "></textarea>
                                </div> -->

                            
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>