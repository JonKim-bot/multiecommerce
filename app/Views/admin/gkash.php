<body onload="document.order.submit()">
<form class="form-horizontal" name="form" method="post" action="<?php echo $post_url ?>">
	<div class="form-group">
	
        <div class="form-group">
            <label class="col-sm-2 control-label">Version *</label>
            <div class="col-sm-4">
                <input name="version" type="text" class="form-control" value="1.5.4" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Company RemID *</label>
            <div class="col-sm-4">
                <input name="CID" type="text" class="form-control" value="<?php echo 'M161-U-XXX'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Currency *</label>
            <div class="col-sm-4">
                <input name="v_currency" type="text" class="form-control" value="<?php echo'MYR'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Amount *</label>
            <div class="col-sm-4">
                <input name="v_amount" type="text" class="form-control" value="<?php echo  '1.00'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Cart ID *</label>
            <div class="col-sm-4">
                <input name="v_cartid" type="text" class="form-control" value="<?php echo  da ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-4">
                <input name="v_firstname" type="text" class="form-control" value="<?php echo $data['name']; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Recipent Email</label>
            <div class="col-sm-4">
                <input name="v_billemail" type="text" class="form-control" value="<?php echo $data['email']; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Phone No</label>
            <div class="col-sm-4">
                <input name="v_billphone" type="text" class="form-control" value="<?php echo  $data['contact']; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Return URL</label>
            <div class="col-sm-4">
                <input name="returnurl" type="text" class="form-control" value="<?php echo $data['returnurl']; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Callback URL</label>
            <div class="col-sm-4">
                <input name="callbackurl" type="text" class="form-control" value="<?php echo $data['callbackurl']; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Client IP</label>
            <div class="col-sm-4">
                <input name="clientip" type="text" class="form-control" value="<?php echo  '127.0.0.1'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">EWALLET QR CODE VALUE</label>
            <div class="col-sm-4">
                <input name="wechatauthcode" type="text" class="form-control" value="<?php echo  ''; ?>" />
            </div>
        </div>
		
		<div class = "form-group">
		<label class="col-sm-2 control-label">Host To Host Request</label>
			<label class="switch">
			<input type="checkbox" name ="HostToHost">
			<span class="slider round"></span>
			</label>
		</div>
		
		<input name="signature" type="hidden" value="<?php echo  ''; ?>" />
    </form>
</body>