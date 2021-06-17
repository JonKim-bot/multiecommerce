<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Sms">Sms</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>Sms/add">Create New Sms</a></li>
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
                            Create New Sms
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url('/Sms/add'); ?>">
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
                                <label for="banner">Send to</label>

                                <select name="customer_id[]" class="select" id="" multiple required>
                                <option value="all">All user</option>

                                    <?php foreach($order_customer as $row){ ?>
                                            <option value="<?= $row['order_customer_id'] ?>"><?= $row['contact']?></option>
                                    <?php }?>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="banner">Template To Send</label>

                                   <select name="template_id" class="select" id=""  required>
                                            <option value="1">Hi %customer name%, %merchant name% is %discount /offer%. %Call to action (may include
                                            shop link)%>
                                            %Merchant representative name% from %merchant name%
                                            </option>
                                            <option value="2">%Opening (About a problem/ need)%. %Discount/offer%. %Call to action (may include shop
                                                            link)%
                                            </option>
                                            <option value="3">.Hi %customer name%. % A need/problem%. %Merchant name% is %discount/offer%. %Call to action (may include shop link)%
                                            </option>

                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="">Discount Offer</label>
                                    <input type="text" class="form-control" name="product" placeholder="e.g. Product is  10 %  offer" required>
                                </div>
                                

                                <div class="form-group">
                                    <label for="">Call to action (May Include Shop Link)</label>
                                    <textarea name="call_to_action" id="" cols="30" rows="10" class="form-control" placeholder=" Come and visit our shop at www.webi.com"></textarea>
                                </div>

                                
                                <div class="form-group">
                                    <label for="">A need  / Problem (only for template two and three) </label>
                                    <textarea name="need" id="" cols="30" rows="10" class="form-control" placeholder=" Looking for a gift for your father?"></textarea>
                                </div>
                                
                            
                                <div class="form-group">
                                    <button class="btn btn-primary float-right" type="submit"> Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>