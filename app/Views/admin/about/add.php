<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/About">About</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>About/add">Create New About</a></li>
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
                            Create New About
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/About/add'); ?>">
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
                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="e.g. Best Restaurant In Town" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="about">Image 750x375  (For signup and home section two page)</label>
                                    <input type="file" class="form-control" name="banner" placeholder="About" >
                                </div>
                                <div class="form-group">
                                    <label for="about">Image Two (For signup page)</label>
                                    <input type="file" class="form-control" name="banner2" placeholder="About" >
                                </div>
                                <div class="form-group">
                                    <label for="about">Image Three  (For signup page)</label>
                                    <input type="file" class="form-control" name="banner3" placeholder="About" >
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Eg : Open since 1997 "></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="banner">About Us Location</label>

                                    <select name="type_id" class="select" id=""  required>
                                        <option value="1">Home Page Section One</option>
                                        <option value="2">Home Page Section Two</option>
                                        <option  value="3">Sign Up Page Member</option>

                                    </select>
                                </div>

                            
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>