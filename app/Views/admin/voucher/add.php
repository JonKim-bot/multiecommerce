<div class="c-subheader justify-content-between px-3">


    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Voucher">Voucher</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Voucher/add">Create New Voucher</a></li>
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
                            Create New Voucher
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Voucher/add'); ?>">
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
                                    <label for="about">Image</label>
                                    <input type="file" class="form-control" name="banner" placeholder="About" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="e.g. Voucher" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Required Point</label>
                                    <input type="number" class="form-control" name="redeem_point" placeholder="e.g. 45" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Valid until</label>
                                    <input type="date" class="form-control" name="valid_until" placeholder="e.g. Voucher" required>
                                </div>
                  
                                <!-- <div class="form-group">
                                    <label for="voucher">Image</label>
                                    <input type="file" class="form-control" name="banner" placeholder="Voucher" required>
                                </div>
                                 -->
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" placeholder="Eg : Voucher for purchase over RM100 "></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Redeem instruction</label>
                                    <textarea class="form-control " name="redeem_instruction" placeholder="Eg : 1) Claim at shop 2 ) Shop Merchant"></textarea>
                                </div>

                            
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>