<?php
date_default_timezone_set('Asia/Kuala_Lumpur');

$post_url = "./payment.php";

// ***Integration Credentials ******//
// Please replace your integration credentials
// Please refer to the email title of 'Pay [User Account]  User Credentials'
$CID = 'M161-U-33';
$signatureKey = 'oAhVwtUxfrop4cI';
//**********************************//
$returnurl ='https://example.com/return';
$callbackurl ='http://example.com/callback';
//**********************************//


if(isset($_POST['send'])) {
    
    
	if (isset($_POST['HostToHost'])) {
		$post_url = "https://api-staging.pay.asia/api/payment/submit";
	}else{
		$post_url = "https://api-staging.pay.asia/api/paymentform.aspx";
	}
    $post = array(
        'version' => !empty($_POST['version']) ? htmlentities($_POST['version']) : '1.5.4',
        'v_currency' => trim($_POST['v_currency']),
        'v_amount' => trim($_POST['v_amount']),
        'v_firstname' =>trim($_POST['v_firstname']),
        'v_billemail' => trim($_POST['v_billemail']),
        'v_billphone' => trim($_POST['v_billphone']),
        'CID' => !($_POST['CID'] == 'M161-U-XXX') ? htmlentities($_POST['CID']):$CID,
        'signature' => '',
        'v_cartid' => trim($_POST['v_cartid']),
		'returnurl' => !empty($_POST['returnurl']) ? htmlentities($_POST['returnurl']) :$returnurl,
		'callbackurl' => !empty($_POST['callbackurl']) ? htmlentities($_POST['callbackurl']) : $callbackurl
    );
	
    // $signatureKey = !empty($_POST['signatureKey']) ? htmlentities($_POST['signatureKey']):$signatureKey;
	
    $signature_arr = array(
        $signatureKey,
        $post['CID'],
        $post['v_cartid'],
        number_format($_POST['v_amount'], 2, '', ''),
        $post['v_currency']
    );

    $post['signature'] = hash('sha512', strtoupper(implode(";", $signature_arr)));

}
?>

<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .form-horizontal .control-label {text-align:left}
		.switch {
			position: relative;
			display: inline-block;
			width: 60px;
			height: 34px;
			}
			
			.switch input { 
			  opacity: 0;
			  width: 0;
			  height: 0;
			}
			.slider {
			  position: absolute;
			  cursor: pointer;
			  top: 0;
			  left: 0;
			  right: 0;
			  bottom: 0;
			  background-color: #ccc;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			.slider:before {
			  position: absolute;
			  content: "";
			  height: 26px;
			  width: 26px;
			  left: 4px;
			  bottom: 4px;
			  background-color: white;
			  -webkit-transition: .4s;
			  transition: .4s;
			}

			input:checked + .slider {
			  background-color: #2196F3;
			}

			input:focus + .slider {
			  box-shadow: 0 0 1px #2196F3;
			}

			input:checked + .slider:before {
			  -webkit-transform: translateX(26px);
			  -ms-transform: translateX(26px);
			  transform: translateX(26px);
			}

			/* Rounded sliders */
			.slider.round {
			  border-radius: 34px;
			}

			.slider.round:before {
			  border-radius: 50%;
			}
    </style>
</head>
<body>

<div class="container">
    <div class="page-header">
        <h3>e-Commerce Checkout Demo </h3>
    </div>

    <form class="form-horizontal" name="form" method="post" action="<?php echo $post_url; ?>">
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
                <input name="CID" type="text" class="form-control" value="<?php echo !empty($post['CID']) ? htmlentities($post['CID']) :'M161-U-XXX'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Currency *</label>
            <div class="col-sm-4">
                <input name="v_currency" type="text" class="form-control" value="<?php echo !empty($post['v_currency']) ? htmlentities($post['v_currency']) :'MYR'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Amount *</label>
            <div class="col-sm-4">
                <input name="v_amount" type="text" class="form-control" value="<?php echo !empty($post['v_amount']) ? htmlentities($post['v_amount']) :'1.00'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Cart ID *</label>
            <div class="col-sm-4">
                <input name="v_cartid" type="text" class="form-control" value="<?php echo !empty($post['v_cartid']) ? htmlentities($post['v_cartid']) : date('YmdHis'); ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-4">
                <input name="v_firstname" type="text" class="form-control" value="<?php echo !empty($post['v_firstname']) ? htmlentities($post['v_firstname']) :'Gkash Payment'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Recipent Email</label>
            <div class="col-sm-4">
                <input name="v_billemail" type="text" class="form-control" value="<?php echo !empty($post['v_billemail']) ? htmlentities($post['v_billemail']) : 'testing123@gkash.com'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Phone No</label>
            <div class="col-sm-4">
                <input name="v_billphone" type="text" class="form-control" value="<?php echo !empty($post['v_billphone']) ? htmlentities($post['v_billphone']) : '01234567890'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Return URL</label>
            <div class="col-sm-4">
                <input name="returnurl" type="text" class="form-control" value="<?php echo !empty($post['returnurl']) ? htmlentities($post['returnurl']) : $returnurl; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Callback URL</label>
            <div class="col-sm-4">
                <input name="callbackurl" type="text" class="form-control" value="<?php echo !empty($post['callbackurl']) ? htmlentities($post['callbackurl']) : $callbackurl; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">Client IP</label>
            <div class="col-sm-4">
                <input name="clientip" type="text" class="form-control" value="<?php echo !empty($post['clientip']) ? htmlentities($post['clientip']) : '127.0.0.1'; ?>" />
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label">EWALLET QR CODE VALUE</label>
            <div class="col-sm-4">
                <input name="wechatauthcode" type="text" class="form-control" value="<?php echo !empty($post['wechatauthcode']) ? htmlentities($post['wechatauthcode']) : ''; ?>" />
            </div>
        </div>
		
		<div class = "form-group">
		<label class="col-sm-2 control-label">Host To Host Request</label>
			<label class="switch">
			<input type="checkbox" name ="HostToHost">
			<span class="slider round"></span>
			</label>
		</div>
		
		<input name="signature" type="hidden" value="<?php echo !empty($post['signature']) ? htmlentities($post['signature']) : ''; ?>" />
        <button class="btn btn-default" name="send" type="submit">POST</button>
    </form>
</div>
<?php 

if ( strpos($post_url, "https://api-staging.pay.asia") !== false) {
	echo '<script type="text/javascript">
		document.form.submit();
	</script>';
}
?>
</body>
</html>