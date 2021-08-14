<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Product">Product</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/product/edit/<?= $product['product_id']?>">Edit Product Details</a></li>
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
                Edit Product Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/product/edit/<?=$product["product_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="">Product Label Text</label>
                        <select name="label_text" class="select" id=""  >
                        <option value="">None</option>

                        <option value="Latest">Latest</option>
                            <option value="Hotest">Hotest</option>
                            <option  value="Trending">Trending</option>
                            <option  value="最新">最新</option>
                            <option  value="畅销">畅销</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="banner">Image</label>
                        <input type="file" class="form-control" name="banner" placeholder="Banner">
                    </div>
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" name="product" value="<?= $product['product_name'] ?>" placeholder="e.g. Cake " required>
                    </div>
                    <div class="form-group">
                        <label for="">Category
                            <?php $product_category ?>
                        </label>
                        <select name="category[]" class="select" id="" multiple required>
                        <?php foreach($category as $row){ ?>
                            <?php if(in_array($row['category_id'],explode(',',$product['category_id']))){ ?>
                            <option selected value="<?= $row['category_id'] ?>"><?= $row['category']?></option>
                            <?php }else{?>
                                <option value="<?= $row['category_id'] ?>"><?= $row['category']?></option>

                        
                            <?php }
                            
                        }
                            ?>
                        </select>

                    </div>

                    <div class="form-group">
                        <label for="">Product Description</label>
                        <textarea class="form-control " rows="10" name="product_description" placeholder="Eg : Special Cake "><?= $product['product_description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Product Description Two</label>
                        <textarea class="form-control " rows="10" name="product_description_two" placeholder="Eg : Special Cake "><?= $product['product_description_two'] ?></textarea>
                    </div>
               
       
                    <?php if(in_array(1,session()->get('shop_data')['shop_function'])){ ?>

                    <div class="form-group">
                        <label for="">Product Member Text</label>
                        <textarea class="form-control" name="member_text" placeholder="Eg : Special Discount For Joining Member "><?= $product['member_text'] ?></textarea>
                    </div>

                    <?php } ?>
              
                    
                  
              
                    <?php if(in_array(3,session()->get('shop_data')['shop_function'])){ ?>
                    <div class="form-group">
                        <label for="">Upsales
                        </label>
                        <select name="upsales_product_id[]" class="select" id="" multiple required>
                        <?php foreach($all_product as $row){ ?>
                            <?php if(in_array($row['product_id'],$upsales_product)){ ?>
                            <option selected value="<?= $row['product_id'] ?>"><?= $row['product_name']?></option>
                            <?php }else{?>
                                <option value="<?= $row['product_id'] ?>"><?= $row['product_name']?></option>

                            <?php }
                            
                        }
                            ?>
                        </select>

                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="">Product Price</label>
                        <input type="number" class="form-control" value="<?= $product['product_price'] ?>" name="product_price" placeholder="e.g. RM 100" required min="0" value="0" step="any">
                    </div>

                    <div class="form-group">
                        <label for="">Product Promo Price</label>
                        <input type="number" class="form-control" value="<?= $product['promo_price'] ?>" name="promo_price" placeholder="e.g. RM 100" required min="0" value="0" step="any">
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                    <?php if($product['is_promo'] == 1){ ?>
                        <input type="checkbox" checked class="form-check-input" name="is_promo">

                    <?php }else{ ?>
                        <input type="checkbox" class="form-check-input" name="is_promo">

                    <?php } ?>
                        <label class="form-check-label">Show promo price</label>
                    </div>
                    </div>

                    <div class="form-group">

                    <div class="form-check">
                    <?php if($product['is_member'] == 1){ ?>
                        <input type="checkbox" checked class="form-check-input" name="is_member">

                    <?php }else{ ?>
                        <input type="checkbox" class="form-check-input" name="is_member">

                    <?php } ?>
                        <label class="form-check-label">Tick if promo price for member only</label>
                    </div>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                </form>
            </div>
            
        </div>