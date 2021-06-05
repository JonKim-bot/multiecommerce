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
                        <label for="">Description</label>
                        <input type="text" class="form-control" name="description" value="<?= $shop['description'] ?>" placeholder="e.g. Capital Shop open since" required>
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
                    
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input type="file" class="form-control" name="banner" placeholder="Banner">
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
                            <label for="">Theme Colour</label>

                            <input type="text" class="form-control color" name="colour" value="<?=$shop['colour']?>" placeholder="Colour" required>
                    </div>


                    <div class="form-group">
                        <label for="icon">Icon Shop</label>
                        <input type="file" class="form-control" name="icon" placeholder="Banner">
                    </div>

                    <div class="form-group">
                        <label for="icon">Header Icon</label>
                        <input type="file" class="form-control" name="header_icon" placeholder="Banner">
                    </div>

                    <div class="form-group">
                        <label for="icon">Icon Footer</label>
                        <input type="file" class="form-control" name="icon_footer" placeholder="Banner">
                    </div>

         
                    <!-- <div class="form-group">
                    <label for="banner">Bank</label>

                    <select name="bank_id" class="select" id="" required>
                        <?php foreach($bank as $row){ ?>
                            <?php if($row['bank_id'] == $shop['bank_id']){ ?>
                                <option selected value="<?= $row['bank_id'] ?>"><?= $row['bank']?></option>
                            <?php }else{ ?>
                                <option value="<?= $row['bank_id'] ?>"><?= $row['bank']?></option>

                            <?php }?>

                        <?php }?>
                        </select>
                    </div> -->
                    <!-- <div class="form-group">
                    <label for="banner">Shop Category</label>

                    <select name="tag_id[]" class="select" id="" required multiple>
                        <?php foreach($tag as $row){ ?>
                            <?php if (in_array($row['tag_id'], explode(",",$shop['categories_tag']))) { ?>
                                <option selected value="<?= $row['tag_id'] ?>"><?= $row['tag']?></option>

                              <?php }else{?>

                                <option value="<?= $row['tag_id'] ?>"><?= $row['tag']?></option>

                              <?php }?>

                           
                        <?php }?>
                        </select>
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="">Bank Holder Name</label>
                        <input type="text" class="form-control" value="<?= $shop['bank_holder_name'] ?>" name="bank_holder_name" placeholder="e.g. Lim Jin" required>
                    </div>
                    <div class="form-group">
                        <label for="">Bank Account</label>
                        <input type="text" class="form-control" value="<?= $shop['bank_account'] ?>" name="bank_account" placeholder="e.g. 123213123123" required>
                    </div> -->
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
                    <!-- <div class="form-group">
                        <div class="row">
                        <div class="col-md-6 form-group">
                                <label for="">Latitute</label>
                                <input type="text" class="form-control" value="<?= $shop['lat'] ?>" readonly value="" id="lat" name="lat">
                            </div>
                            <div class="col-md-6 form-group">
                                
                                <label for="">Longtitute</label>
                                <input type="text" class="form-control" value="<?= $shop['lng'] ?>" readonly value="" id="lng" name="lng">
                            </div>

                        </div>
                    </div> -->
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6 form-group">
                                <label for="">State</label>
                                <input type="text" class="form-control" value="<?= $shop['state'] ?>"  value="" id="state" name="state">
                            </div>
                            <div class="col-md-6 form-group">
                                
                                <label for="">Taman</label>
                                <input type="text" class="form-control" value="<?= $shop['taman'] ?>"  value="" id="taman" name="taman">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Google Map url</label>
                        <p style="overflow: auto;"><a target="_blank" id="url" href="<?= $shop['url'] ?>"><?= $shop['url'] ?></a></p>
                        <input type="text" name="url" value="<?= $shop['url'] ?>" class="form-control"  id="urlinput">
                    </div>
                    <div id="map">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary float-right" type="submit"> Save</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>
