<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Product">Product</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Product/add">Create New Product</a></li>
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
                            Create New Product
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Product/add'); ?>">
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
                                    <label for="">Product Label Text</label>
                                    <select name="label_text" class="select" id=""  >
                                    <option value="">None</option>

                                    <option value="Latest">Latest</option>
                                        <option value="Hotest">Hotest</option>
                                        <option  value="Trending">Trending</option>
                                        <option  value="??????">??????</option>
                                        <option  value="??????">??????</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="banner">Image</label>
                                    <input type="file" class="form-control" name="banner" placeholder="Banner" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Product Name</label>
                                    <input type="text" class="form-control" name="product" placeholder="e.g. Cake " required>
                                </div>

                                           
                                <div class="form-group">
                                    <label for="">Product Inner Title</label>
                                    <input type="text" class="form-control" name="product_inner_title" placeholder="e.g. Hotnow " >
                                </div>
                                
                                <div class="form-group">
                                <label for="banner">Category</label>

                                <select name="category[]" class="select" id="" multiple required>
                                    <?php foreach($category as $row){ ?>
                                            <option value="<?= $row['category_id'] ?>"><?= $row['category']?></option>

                                    <?php }?>
                                    </select>
                                </div>

                                
                                <div class="form-group">
                                    <label for="">Product Description</label>
                                    <textarea class="form-control " rows="10" name="product_description" placeholder="Eg : Special Cake "></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Product Description Two</label>
                                    <textarea class="form-control " rows="10" name="product_description_two" placeholder="Eg : Special Cake "></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Product Description Three</label>
                                    <textarea class="form-control " rows="10" name="product_description_three" placeholder="Eg : Special Cake "></textarea>
                                </div>
                        
                                
                          

                                <?php if(in_array(1,session()->get('shop_data')['shop_function'])){ ?>

                                <div class="form-group">
                                    <label for="">Product Member Text</label>
                                    <textarea class="form-control" name="member_text" placeholder="Eg : Special Discount For Joining Member "></textarea>
                                </div>

                                <?php } ?>
                                <?php if(in_array(3,session()->get('shop_data')['shop_function'])){ ?>
                                    <div class="form-group">
                                        <label for="">Upsales
                                        </label>
                                        <select name="upsales_product_id[]" class="select" id="" multiple required>
                                        <?php foreach($all_product as $row){ ?>
                                                <option value="<?= $row['product_id'] ?>"><?= $row['product_name']?></option>

                                            <?php 
                                            
                                        }
                                            ?>
                                        </select>

                                    </div>
                                    <?php } ?>
                            
                                <div class="form-group">
                                    <label for="">Product Price</label>
                                    <input type="number" class="form-control" name="product_price" placeholder="e.g. RM 100" required min="0" value="0" step="any">
                                </div>
                                <div class="form-group">
                                    <label for="">Product Promo Price</label>
                                    <input type="number" class="form-control" name="promo_price" placeholder="e.g. RM 100" required min="0" value="0" step="any">
                                </div>
                                <div class="form-group">

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="is_promo">
                                    <label class="form-check-label">Show promo price</label>
                                </div>
                                </div>

                                <div class="form-group">

                                    <div class="form-check">
                               
                                        <input type="checkbox" class="form-check-input" name="is_member">

                                        <label class="form-check-label">Tick if promo price for member only</label>
                                    </div>
                                    </div>

                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>