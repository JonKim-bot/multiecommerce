<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Shoprate">Shoprate</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/shoprate/edit/<?= $shoprate['shop_rate_id']?>">Edit Shoprate Details</a></li>
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
                Edit Shoprate Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/shoprate/edit/<?=$shoprate["shop_rate_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                    <label for="form_register_no">Rate Name </label>
                    <select class="form-control "  name="rate_name">
                        <?php foreach ($array_rate
                            as $row) { ?>
                            <?php if($row == $shoprate['rate_name']){ ?>
                            
                                <option selected value="<?= $row?>"><?= $row?></option>
                            <?php }else{ ?>
                                <option value="<?= $row?>"><?= $row?></option>

                            <?php } ?>
                        <?php } ?>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="">Rate</label>
                    <input class="form-control" name="rate" value="<?= $shoprate['rate'] ?>" placeholder="Eg : 5 "/>
                </div>

                    
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>