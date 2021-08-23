<script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAIJ95ufzqwjC7nE6nuUocyjOABoqFPaA&callback=initAutocomplete&libraries=places&v=weekly"
         defer
         ></script>
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Shop">Shop</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop/edit/<?= $shop['shop_id']?>">Edit Shop Details</a></li>
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
                Edit Shop Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/shop/edit/<?=$shop["shop_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="">Shop</label>
                        <input type="text" class="form-control" name="shop" value="<?= $shop['shop_name'] ?>" placeholder="e.g. Capital Shop" required>
                    </div>
                    <div class="form-group">
                          <label for="">Shop Chinese Name (If shop name got chinese character enter here)</label>
                          <input type="text" class="form-control" name="shop_name" placeholder="e.g. Capital 中文" value="<?= $shop['shop_chinese_name'] ?>">
                      </div>

                 
                    <div class="form-group">
                        <label for="banner">Language</label>
                        <select name="language_id" class="select" id="" required>
                            <option  value="1" <?= $shop['language_id'] == 1 ? 'selected' :''?>>English</option>
                            <option  value="2" <?= $shop['language_id'] == 2 ? 'selected' :''?>>Chinese</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="banner">Open</label>
                        <select name="is_active" class="select" id="" required>
                            <option  value="1" <?= $shop['is_active'] == 1 ? 'selected' :''?>>Open</option>
                            <option  value="0" <?= $shop['is_active'] == 0 ? 'selected' :''?>>Closed</option>
                        </select>
                    </div>
                 
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" value="<?= $shop['description'] ?>" placeholder="e.g. Capital Shop open since" required>
                    </div>


                    
                                     
                    <div class="form-group">
                        <label for="">Closed Message</label>
                        <input type="text" class="form-control" name="closed_msg" value="<?= $shop['closed_msg'] ?>" placeholder="e.g. closed reason" required>
                    </div>
                    <div class="form-group">
                        <label for="">Operating Time</label>
                        <input type="text" class="form-control" name="operating_hour" value="<?= $shop['operating_hour'] ?>" placeholder="e.g. Monday-Sunday - 8AM - 10PM" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="number" class="form-control" name="contact" value="<?= $shop['contact'] ?>" placeholder="e.g. 012-123-1232" required>
                    </div>
                    <div class="form-group">
                        <label for="">Delivery Fee (PER KM)</label>
                        <input type="number" step="any" class="form-control" name="delivery_fee" value="<?= $shop['delivery_fee'] ?>" placeholder="e.g. RM 3" required>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $shop['email'] ?>" placeholder="e.g. xxx.com" required>
                    </div>
       
                    <?php if($isMerchant == false){ ?>
                    <div class="form-group">
                        <label for="">Shop Function
                        </label>
                        <select name="shop_function[]" class="select" id="" multiple >
                        <?php foreach($function as $row){ ?>
                            <?php if(  in_array($row['function_id'],$shop_function)){ ?>
                            <option selected value="<?= $row['function_id'] ?>"><?= $row['function']?></option>
                            <?php }else{?>
                                <option value="<?= $row['function_id'] ?>"><?= $row['function']?></option>

                            <?php }
                            
                        }
                            ?>
                        </select>

                    </div>
                    <?php } ?>
                    
                 

         
                    <div class="form-group">
                        <label for="">Insta</label>
                        <input type="text" class="form-control" value="<?= $shop['insta'] ?>" name="insta" placeholder="e.g. https://www.facebook.com/PieGen-Software-111184540529485/?ref=bookmarks" >
                    </div>

                    <div class="form-group">
                        <label for="">Facaebook</label>
                        <input type="text" class="form-control" value="<?= $shop['facebook'] ?>" name="facebook" placeholder="e.g. https://www.instagram.com/piegen_software/" >
                    </div>
             
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address"><?= $shop['address'] ?>"</textarea>
                    </div>
            
                    <div class="form-group mt-2">
                        <button class="btn btn-primary float-right" type="submit"> Save</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>
