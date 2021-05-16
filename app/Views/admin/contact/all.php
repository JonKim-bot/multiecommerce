
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/contact">Contact</a></li>
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
                Contacts
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
                            <table class="table table-striped datatable table-bordered no-footer " id="contact_list_table" data-method="get" data-url="<?= base_url("contact") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Name</th>
                                            <th data-sort="name" data-filter="name">Contact</th>
                                            <th data-sort="name" data-filter="name">Email</th>
                                            <th data-sort="name" data-filter="name">Message</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($contact as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/contact/detail/<?= $row['contact_id']?>"><?= $i ?></a></td>
                                                

                                                <td><a href="<?= base_url() ?>/contact/detail/<?= $row['contact_id']?>"><?= $row['name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/contact/detail/<?= $row['contact_id']?>"><?= $row['contact'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/contact/detail/<?= $row['contact_id']?>"><?= $row['email'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/contact/detail/<?= $row['contact_id']?>"><?= $row['message'] ?></a></td>
                                                
                                                <td><a href="<?= base_url() ?>/contact/delete/<?= $row['contact_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
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