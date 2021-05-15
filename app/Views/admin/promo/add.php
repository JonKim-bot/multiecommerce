<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Promo">Promo</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Promo/add">Create New Promo</a></li>
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
                            Create New Promo
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Promo/add'); ?>">
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
                                <label for="">Promo Type</label>
                                <select class="form-control"  required name="promo_type_id" id="promo_type_id">
                                    <?php foreach($promo_type as $row){ ?>
                                        <option value="<?= $row['promo_type_id']?>">
                                            <?= $row['promo_type']?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                                <div class="form-group">
                                    <label for="">Enter Promocode</label>
                                    <input type="text" class="form-control" name="code" placeholder="e.g. OFFER20" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Minimum spend</label>
                                    <input type="number" class="form-control" name="minimum" placeholder="e.g. RM5" required>
                                </div>
                                <div class="form-group" id="product_sku">
                                <label for="">Product SKU</label>
                                <select class="form-control select2" multiple  name="product_id[]">
                                    <?php foreach($product as $row){ ?>
                                        <option value="<?= $row['product_id']?>">
                                        <td><?= $row['product_name'] ?></td>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>




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
                                    <input type="number" class="form-control" name="offer_amount"  placeholder="e.g. RM5" >
                                </div>

                                <div class="form-group" id="offer_percent">
                                    <label for="">Enter Promocode Offer Percent</label>
                                    <input type="number" class="form-control" name="offer_percent"  placeholder="e.g. 10%"   >
                                </div>
                                </div>

                                
                                <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="new_member">
                                    <label class="form-check-label" for="new_member">For New Member Only</label>
                                </div>
                                <div class="form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="for_affliate">
                                    <label class="form-check-label" for="for_affliate">For Affliate</label>
                                </div>
                            </div>
                                
                                
                                <!-- <div class="form-group">
                                    <label for="">Minimum spend</label>
                                    <input type="number" class="form-control" name="minimum" placeholder="e.g. RM 20" required>
                                </div>

                                <div class="form-group">
                                    <label for="">Enter Promocode Offer Amount</label>
                                    <input type="number" class="form-control" name="amount" placeholder="e.g. RM5" required>
                                </div>
                                 -->
                              

                            
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
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