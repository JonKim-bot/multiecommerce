<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url(
            'contact'
        ) ?>">Contact</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/contact/detail/<?= $contact[
    'contact_id'
] ?>">Contact Details</a></li>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="c-card-header">
                            Contact Info
                            <div class="card-header-actions">
                                <a class="card-header-action">
                                    <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                                </a>
                             
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="view-info">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info mb-5">
                                      
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <td><h3>Name</h3></td>
                                                        <td><?= $contact[
                                                            'name'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Message</h3></td>
                                                        <td><?= $contact[
                                                            'message'
                                                        ] ?></td>

                                                    </tr>
                                                    <tr>
                                                        <td><h3>Contact</h3></td>
                                                        <td><?= $contact[
                                                            'contact'
                                                        ] ?></td>

                                                    </tr>

                                                    <tr>
                                                        <td><h3>Email</h3></td>
                                                        <td><?= $contact[
                                                            'email'
                                                        ] ?></td>

                                                    </tr>
                                                    
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        
                    </div>
                </div>
            </div>