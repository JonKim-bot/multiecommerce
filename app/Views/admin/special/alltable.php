<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/special">Special</a></li>
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
                Specials
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <?php if(!$isMerchant) { ?>

                    <a class="card-header-action" href="<?= base_url() ?>/special/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                    
                 
                        <!-- <a href="<?= base_url(). "/special" ?>" class="btn btn-primary">Switch To Mobile View</a> -->
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="special_list_table" data-method="get" data-url="<?= base_url("special") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                        <th data-sort="name" data-filter="name">No</th>

                                            <th data-sort="name" data-filter="name">Name</th>
                                            <th data-sort="name" data-filter="name">Contact</th>
                                            <th data-sort="name" data-filter="name">Location</th>
                                            <th data-sort="name" data-filter="name">Description</th>

                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($special as $row){
                                         ?>
                                         
                                                <?php if(!$isMerchant) { ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/special/detail/<?= $row['special_id']?>"><?= $i ?></a></td>
                 

                                                <td><a href="<?= base_url() ?>/special/detail/<?= $row['special_id']?>"><?= $row['title'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/special/detail/<?= $row['special_id']?>"><?= $row['contact'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/special/detail/<?= $row['special_id']?>"><?= $row['address'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/special/detail/<?= $row['special_id']?>"><?= $row['description'] ?></a></td>
                                                <td>
                                                <a href="<?= base_url() ?>/special/edit/<?= $row['special_id']?>" class="btn btn-warning" ><i class="fa fa-pen"></i> Edit</a>
                                                <a href="<?= base_url() ?>/special/detail/<?= $row['special_id']?>" class="btn btn-primary" ><i class="fa fa-eye"></i> View</a>


                                                <a href="<?= base_url() ?>/special/delete/<?= $row['special_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
                                            </tr>
                                            <?php
                                            }else{
                                        ?>
   <tr>
                                                
                                                <td><?= $i ?></td>
                 

                                                <td><?= $row['title'] ?></td>
                                                <td><?= $row['contact'] ?></td>

                                                <td><?= $row['address'] ?></td>
                                                <td><?= $row['description'] ?></td>

                                                <td>
                                                <a target="_blank" href="<?= base_url() ?>/home/special_detail/<?= $row['special_id']?>" class="btn btn-primary" ><i class="fa fa-eye"></i> View</a>


                                            </tr>

                                        <?php } ?>
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

$(document).ready(function(){

            function submit_category(){
                alert("asd");
            }

            $('.selection').on('change', function(e) {
        e.preventDefault();
        var value = $(this).val();
        // alert(value);
        window.location.href = ("<?= base_url() ?>/special?special_category=" + value);
    })
        });
        </script>