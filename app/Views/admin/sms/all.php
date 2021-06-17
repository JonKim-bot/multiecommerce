
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/sms">Sms</a></li>
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
            
                Sms
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/sms/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                            <table class="table table-striped datatable table-bordered no-footer " id="sms_list_table" data-method="get" data-url="<?= base_url("sms") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Template</th>
                                            <th data-sort="name" data-filter="name">Sent</th>
                                            <th data-sort="name" data-filter="name">Approval</th>

                                            <th data-sort="name" data-filter="name">Status</th>
                                            <th data-sort="name" data-filter="name">Price</th>
                                            <th data-sort="name" data-filter="name">Discount Offer</th>
                                            <th data-sort="name" data-filter="name">Call To Action </th>
                                            <th data-sort="name" data-filter="name">Need</th>
                                            <th data-sort="name" data-filter="name">Merchant representative name</th>
                                            <th data-sort="name" data-filter="name">Merchant name</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($sms as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $i ?></a></td>
                       

                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['template'] ?></a></td>
                                                <?php if($row['is_sent'] == 0){ ?>
                                                <td><a id="<?= $row['sms_id'] ?>" class="btn_sent_sms btn btn-primary">Send</a></td>
                                                <?php }else{ ?>
                                                    <td><a id="<?= $row['sms_id'] ?>" class=" btn btn-primary">Send Already</a></td>

                                                <?php } ?>
                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['is_approved'] == 1 ? "APPROVED" : "NOT YET APPROVED" ?></a></td>

                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['is_sent'] == 1 ? "SENT" : "NOT SENT" ?></a></td>
                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['price'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['discount_offer'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['call_to_action'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['need'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= $row['shop_name'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/sms/detail/<?= $row['sms_id']?>"><?= "Webi" ?></a></td>

                                                <td><a href="<?= base_url() ?>/sms/delete/<?= $row['sms_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <script>
         
    $('.btn_sent_sms').on('click', function (e) {
        var postParam = {
            sms_id: $(this).attr('id'),
        };

        $.post("<?= base_url('sms/send_sms') ?>", postParam, function(data){

            data= JSON.parse(data);
            if(data.status){
                alert("Message sended");
            }else{
                alert(data.message);

            }
        });
    });
    </script>