<div class="container-fluid">
    <div class="c-card">
        <div class="c-cardheader">
            Top Up History
            <div class="c-cardheader-action">
                <a class="header-action">
                    <i class="fas fa-angle-down minimize-card"></i>
                </a>
                <a href="<?= base_url() . 'wallet/add' ?>" class="header-action">
                    <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
        <div class="c-cardbody">
            <div class="c-customTable">
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered no-footer dataTable" id="admin_list_table" data-method="get" data-url="<?= base_url() ?>transaction" style="border-collapse: collapse !important">
                        <thead>
                            <tr role="row">
                                <th data-sort="created_date" data-filter="created_date">Created Date</th>
                                <th data-sort="name" data-filter="name">Merchant</th>
                                <th data-sort="contact" data-filter="contact">Contact</th>
                                <th data-sort="bank_name" data-filter="bank_name">Bank</th>
                                <th data-sort="account_name" data-filter="account_name">Account</th>
                                <th data-sort="bank_account" data-filter="bank_account">Account Number</th>
                                <th data-sort="amount" data-filter="amount">Amount</th>

                                <th data-sort="" data-filter="">Status</th>
                                <th data-sort="" data-filter="">File Upload</th>

                                <th data-sort="" data-filter="">Download File</th>
                                <th data-sort="" data-filter="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($wallet as $row){ ?>
                                <tr> 
                                    <td><?= $row['created_date'] ?></td>
                                    <td><?= $row['merchant'] ?></td>
                                    <td><?= $row['contact'] ?></td>
                                    <td><?= $row['bank_name'] ?></td>
                                    <td><?= $row['account_name'] ?></td>
                                    <td><?= $row['bank_account'] ?></td>
                                    <td><?= $row['amount'] ?></td>

                                    <td>
                                        <?php if($row['is_completed'] == 0 && $row['rejected'] == 0){ ?>
                                            Pending
                                        <?php } else if($row['is_completed'] == 1){ ?>
                                            Approved
                                        <?php } else if($row['rejected'] == 1){ ?>
                                            Rejected
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn_file" data-id= "<?= $row['credit_topup_id'] ?>">
                                                Upload
                                        </button>
                                    </td>

                                    <td>
                                    <?php if($row['file'] != ""){ ?>
                                        <a type="button" class="btn btn-warning" download href="<?= base_url() . $row['file'] ?>">
                                                Download
                                        </a>
                                    <?php } ?>
                                    </td>

                                    <td>
                                        <?php if($row['is_completed'] == 0 && $row['rejected'] == 0){ ?>
                                            <a href="<?= base_url() . '/transaction/approve/' . $row['credit_topup_id'] ?>" class="btn btn-primary approve_button">Approve</a>
                                            <a href="<?= base_url() . '/transaction/reject/' . $row['credit_topup_id'] ?>" class="btn btn-danger reject_button">Reject</a>
                                        <?php } else { ?>
                                            <button type="button" class="btn btn-primary" disabled>Approve</button>
                                            <button type="button" class="btn btn-danger" disabled>Reject</button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <div class="custom_pagination" id="admin_list_page" data-table="admin_list_table" data-method="get" data-url="<?= base_url() ?>transaction">
                        <?= $page ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>


    $(document).on("click", ".btn_file", function (e) {
        $('#fileLong').modal('show'); 
        $('#credit_topup_id').val($(this).attr('data-id')); 

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