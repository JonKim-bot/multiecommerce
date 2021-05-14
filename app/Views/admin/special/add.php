<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Special">Special</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Special/add">Create New Special</a></li>
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
                            Create New Special
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Special/add'); ?>">
                                <!-- <div class="form-group">
                                <label for="">Profile Picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile02">
                                    <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                </div>
                            </div> -->
                          
<!--                                 
                                <div class="form-group">
                                    <label for="banner">Image</label>
                                    <input type="file" class="form-control" name="banner" placeholder="Banner" required>
                                </div> -->
                                
                                <div class="form-group">
                                <label for="banner">Category</label>

                                <select name="special_category_id" class="select" id=""  required>
                                    <?php foreach($special_category as $row){ ?>
                                            <option value="<?= $row['special_category_id'] ?>"><?= $row['special_category']?></option>

                                    <?php }?>
                                    </select>
                                </div>
                               
                                <?= $form['title'] ?>
                                <?= $form['short_description'] ?>
                                <?= $form['description'] ?>
                                <?= $form['view'] ?>

                                <?= $form['address'] ?>
                                <?= $form['google_link'] ?>
                                <?= $form['facebook'] ?>
                    <?= $form['insta'] ?>
                                <?= $form['website_link'] ?>
                                <?= $form['operating_hour'] ?>
                                <?= $form['contact'] ?>
                                <label for="">Seperated By Comma</label>
                                <?= $form['special_list'] ?>

                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>