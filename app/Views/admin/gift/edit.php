<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Gift">Gift</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/gift/edit/<?= $gift['gift_id']?>">Edit Gift Details</a></li>
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
                Edit Gift Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/gift/edit/<?=$gift["gift_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="about">Image</label>
                        <input type="file" class="form-control" name="banner" placeholder="About" >
                    </div>

                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" value="<?= $gift['gift'] ?>" name="title" placeholder="e.g. Gift" required>
                    </div>
                    <div class="form-group">
                        <label for="">Order Amount Above</label>
                        <input type="number" class="form-control" value="<?= $gift['order_amount'] ?>" name="order_amount" placeholder="e.g. 45" required>
                    </div>
                    <div class="form-group">
                        <label for="">Valid until</label>
                        <input type="date" class="form-control" value="<?= $gift['valid_until'] ?>" name="valid_until" placeholder="e.g. Gift" required>
                    </div>
        
                    <!-- <div class="form-group">
                        <label for="gift">Image</label>
                        <input type="file" class="form-control" name="banner" placeholder="Gift" required>
                    </div>
                        -->
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control"  name="description" placeholder="Eg : Gift for purchase over RM100 "><?= $gift['description'] ?></textarea>
                    </div>
              
                    
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>