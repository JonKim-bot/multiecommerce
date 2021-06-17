
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
                            <th data-sort="created_date" data-filter="created_date">No</th>

                                <th data-sort="created_date" data-filter="created_date">Created Date</th>
                                <th data-sort="name" data-filter="name">Shop</th>
                                <th data-sort="" data-filter="">Amount</th>
                                <th data-sort="" data-filter="">Status</th>
                                <th data-sort="" data-filter="">Receipt</th>
                                <th data-sort="" data-filter="">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;

                            foreach($wallet as $row){ ?>
                                <tr role="row">
                                <td><?= $i ?></td>

                                    <td><?= $row['created_date'] ?></td>
                                    <td><?= $row['shop_name'] ?></td>
                                    <td><?= $row['amount'] ?></td>

                                    <td>
                                        <?php if($row['is_approved'] == 0){ ?>
                                            Pending
                                        <?php } else if($row['is_approved'] == 1){ ?>
                                            Approved
                                        <?php } else if($row['is_approved'] == 2){ ?>
                                            Rejected
                                        <?php } ?>
                                    </td>
                            
                                    <td>
                                    <?php if($row['receipt'] != ""){ ?>
                                        <a type="button" class="btn btn-warning" download href="<?= base_url() . $row['receipt'] ?>">
                                                Download Receipt
                                        </a>
                                    <?php } ?>
                                    </td>

                                    <td>
                                        <?php if($row['is_approved'] == 0 && $row['is_approved'] != 2){ ?>
                                            <a href="<?= base_url() . '/transaction/approve/' . $row['credit_top_up_id'] ?>" class="btn btn-primary approve_button">Approve</a>
                                            <a href="<?= base_url() . '/transaction/reject/' . $row['credit_top_up_id'] ?>" class="btn btn-danger reject_button">Reject</a>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-primary" disabled>Approve</button>
                                            <button type="button" class="btn btn-danger" disabled>Reject</button>
                                        <?php } ?>
                                    </td>
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


    $(document).on("click", ".btn_file", function (e) {
        $('#fileLong').modal('show'); 
        $('#credit_top_up_id').val($(this).attr('data-id')); 

    });

    $(document).on("click", ".approve_button", function (e) {

        e.preventDefault();

        var delete_record = confirm("Are you sure you want to approve this record?");
        var path = $(this).attr("href");

        if (delete_record === true) {
            window.location.replace(path);
        }
    });

    $(document).on("click", ".reject_button", function (e) {

        e.preventDefault();

        var delete_record = confirm("Are you sure you want to reject this record?");
        var path = $(this).attr("href");

        if (delete_record === true) {
            window.location.replace(path);
        }
    });

</script>