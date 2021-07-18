
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/about">About</a></li>
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
                Abouts
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/about/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="about_list_table" data-method="get" data-url="<?= base_url(
                                    'about'
                                ) ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th data-sort="name" data-filter="name">About</th>
                                            <th data-sort="name" data-filter="name">Banner 1</th>
                                            <th data-sort="name" data-filter="name">Banner 2</th>
                                            <th data-sort="name" data-filter="name">Banner 3</th>
                                            <th data-sort="name" data-filter="name">Title</th>
                                            <th data-sort="name" data-filter="name">Description</th>
                                            <th data-sort="name" data-filter="name">Type</th>
                                            <th data-sort="name" data-filter="name"></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($about as $row){
                                         ?>
                                         

                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>"><?= $i ?></a></td>
                                                <td><a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>">
                                                <img src="<?= base_url() . $row['banner']; ?>" width="200" class="img-fluid d-block m-auto" alt="">

                                                </a></td>
                                                <td><a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>">
                                                <img src="<?= base_url() . $row['banner2']; ?>" width="200" class="img-fluid d-block m-auto" alt="">

                                                </a></td>
                                                <td><a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>">
                                                <img src="<?= base_url() . $row['banner3']; ?>" width="200" class="img-fluid d-block m-auto" alt="">

                                                </a></td>
                                                <td><a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>"><?= $row['title'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>"><?= $row['description'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>"><?php
                                                        if($row['type_id']== 1) {
                                                            echo "Home Page Section one";

                                                        }
                                                        if($row['type_id']== 2) {
                                                            echo "Home Page Section Two";
                                                            
                                                        }
                                                        if($row['type_id']== 3) {
                                                            echo "Sign Up Page";
                                                        }
                                                         ?></a></td>

                                                <td>

                                                    <a href="<?= base_url() ?>/about/edit/<?= $row['about_id']?>" class="btn btn-warning" ><i class="fa fa-pen"></i> Edit</a>
                                                    <a href="<?= base_url() ?>/about/detail/<?= $row['about_id']?>" class="btn btn-primary" ><i class="fa fa-eye"></i> View</a>
    
    
                                                    <a href="<?= base_url() ?>/about/delete/<?= $row['about_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
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