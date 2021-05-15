<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Promo">Promo</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/promo/edit/<?= $promo['promo_id']?>">Edit Promo Details</a></li>
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
                Edit Promo Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/promo/edit/<?=$promo["promo_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    <div class="form-group">
                                    <label for="">Promocode</label>
                                    <input type="text" class="form-control" read value="<?= $promo['code'] ?>" name="code" placeholder="e.g. OFFER20" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Minimum spend</label>
                                    <input type="number" class="form-control" value="<?= $promo['minimum'] ?>" name="minimum" placeholder="e.g. RM5" required>
                                </div>

                                <div class="form-group">
                                <label for="">Promo Type</label>
                                <select class="form-control" readonly required name="promo_type_id" id="promo_type_id">
                                    <?php foreach($promo_type as $row){ ?>
                                    <?php if($row['promo_type_id'] == $promo['promo_type_id']) { ?>
                                        <option selected value="<?= $row['promo_type_id']?>">
                                            <?= $row['promo_type']?>
                                        </option>
                                        <?php }else{ ?>

                                            <option value="<?= $row['promo_type_id']?>">
                                            <?= $row['promo_type']?>
                                        </option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group" id="product_sku">
                                <label for="">Product SKU</label>
                                <select class="form-control select2"  multiple name="product_price_id[]">
                                    <?php foreach($product as $row){ ?>
                                    <?php if(in_array($row['stock_id'],explode(',',$promo['stock_id']))) { ?>
                                        <option selected value="<?= $row['product_price_id']?>">
                                        <td><?= $row['stock_id'] ?></td>
                                        </option>
                                    <?php  }else{?>
                                        <option value="<?= $row['product_price_id']?>">
                                        <td><?= $row['stock_id'] ?></td>
                                        </option>


                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>


                                <!-- <div class="form-group">
                                    <label for="">Minimum spend</label>
                                    <input type="number" class="form-control" value="<?= $promo['minimum'] ?>" name="minimum" placeholder="e.g. RM 20" required>
                                </div> -->

                                <div id="not_freeshipping">
                                
                                <div class="form-group">
                                <label for="">Discount Type</label>
                                <select class="form-control"  required name="discount_type_id" id="discount_type_id">

                                        <option value="1">
                                            Amount
                                        </option>
                                        <option value="2">
                                            Percent
                                        </option>
                                </select>
                            </div>
                                <div class="form-group" id="offer_amount">
                                    <label for="">Enter Promocode Offer Amount</label>
                                    <input type="number" class="form-control" name="offer_amount" value="<?= $promo['offer_amount'] ?>" placeholder="e.g. RM5" >
                                </div>

                                <div class="form-group" id="offer_percent">
                                    <label for="">Enter Promocode Offer Percent</label>
                                    <input type="number" class="form-control" name="offer_percent" value="<?= $promo['offer_percent'] ?>" placeholder="e.g. 10%"   >
                                </div>
                                </div>

                                
                                <div class="form-group">
                                <label for="">New Member Only</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="new_member">
                                    <label class="form-check-label" for="new_member">For New Member Only</label>
                                </div>
                                <div class="form-group">
                                <label for="">Is Affliate</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="new_member">
                                    <label class="form-check-label" for="new_member">For Affliate</label>
                                </div>
                            </div>
                    <div class="form-group">
                        <button class="btn btn-primary float-right" type="submit"> Submit</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>

        
        <script>
        $('document').ready(function(){
            function check_discount(){
                var discount_type_id  = $('#discount_type_id').val();
                        // alert(discount_type_id);    
                        if(discount_type_id == 1){
                            $('#offer_percent').hide();
                            $('#offer_amount').show();

                        }else{
                            $('#offer_percent').show();
                            $('#offer_amount').hide();

                        }
                    
                 }
                 function check_promo_type(){
                var promo_type_id  = $('#promo_type_id').val();
                        if(promo_type_id == 1){
                            $('#product_sku').hide();

                            $('#not_freeshipping').hide();
                        }else if(promo_type_id == 2){
                            $('#not_freeshipping').show();
                            $('#product_sku').hide();

                        }else{
                            $('#product_sku').show();
                            $('#not_freeshipping').show();

                            $('.select2').select2({
  placeholder: 'Select an option'
});

                        }
                    
                 }
                 check_promo_type();
                 check_discount();
                    $(document).on('change','#discount_type_id',function (e){
                        check_discount();    
                }); 
                $(document).on('change','#promo_type_id',function (e){
                        check_promo_type();    
                }); 




        });

                
                </script>