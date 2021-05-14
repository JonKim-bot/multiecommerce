<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Shop">Shop</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Shop/add">Create New Shop</a></li>
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
                            Create New Shop
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Shop/add'); ?>">
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
                                    <label for="">Shop</label>
                                    <input type="text" class="form-control" name="shop" placeholder="e.g. Restaurant Lim" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="banner">Banner</label>
                                    <input type="file" class="form-control" name="banner" placeholder="Banner" required>
                                </div>
                                
                                <div class="form-group">
                                <label for="banner">Bank</label>

                                <select name="bank_id" class="select" id="" required>
                                    <?php foreach($bank as $row){ ?>
                                            <option value="<?= $row['bank_id'] ?>"><?= $row['bank']?></option>

                                    <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Holder Name</label>
                                    <input type="text" class="form-control" name="bank_holder_name" placeholder="e.g. Lim Jin" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Bank Account</label>
                                    <input type="text" class="form-control" name="bank_account" placeholder="e.g. 123213123123" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea class="form-control textarea" name="address" placeholder="Address"></textarea>
                                </div>
                               
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>