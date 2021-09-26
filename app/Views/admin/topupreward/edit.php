<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Topupreward">Topupreward</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/topupreward/edit/<?= $topupreward['topupreward_id']?>">Edit Topupreward Details</a></li>
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
                Edit Topupreward Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/topupreward/edit/<?=$topupreward["topupreward_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                                         
                    <div class="form-group">
                        <label for="">Top up Above RM</label>
                        <input value="<?= $topupreward['above'] ?>" class="form-control" name="above" placeholder="Eg : 100 "/>
                    </div>
                    <div class="form-group">
                        <label for="">Get reward of</label>
                        <input class="form-control" name="reward" value="<?= $topupreward['reward'] ?>" placeholder="Eg : 20 "/>
                    </div>


                    
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>