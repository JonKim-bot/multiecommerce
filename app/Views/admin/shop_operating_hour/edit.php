<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/ShopOperatingHour">ShopOperatingHour</a></li>
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
                             ShopOperatingHour
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/ShopOperatingHour/edit/' . $shop_operating_hour['shop_operating_hour_id']) ; ?>">
                             
                               
                               
                                <?= $form['day'] ?>
                                <div class="form-group">
                                    <label for="">Open at</label>
                                    <input type="time" class="form-control" value="<?= $shop_operating_hour['open_at'] ?>" name="open_at">
                                </div>
                                <div class="form-group">
                                    <label for="">Closed At</label>
                                    <input type="time" class="form-control" value="<?= $shop_operating_hour['closed_at'] ?>" name="closed_at">
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>