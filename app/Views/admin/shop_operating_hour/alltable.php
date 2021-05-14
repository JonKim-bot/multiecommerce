
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop_operating_hour">ShopOperatingHour</li>
	</ol>
	<!-- <div class="c-subheader-nav d-md-down-none mfe-2">
		<a class="c-subheader-nav-link" href="#">
			<i class="cil-settings c-icon"></i>
			&nbsp;Settings
		
	</div> -->
</div>

<main class="c-main">
	
<div class="container-fluid">
	
	<div class="fade-in">
        <div class="card">
            <div class="card-header">
                ShopOperatingHours
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    
                    <a class="card-header-action" href="<?= base_url() ?>/ShopOperatingHour/add">
                        <i class="cil-plus c-icon"></i>
                    
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                    
                 
                        <!-- <a href="<?= base_url(). "/shop_operating_hour" ?>" class="btn btn-primary">Switch To Mobile View -->
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="shop_operating_hour_list_table" data-method="get" data-url="<?= base_url("shop_operating_hour") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                        <th data-sort="name" data-filter="name">No</th>

                                            <th data-sort="name" data-filter="name">Day</th>
                                            <th data-sort="name" data-filter="name">Open At </th>
                                            <th data-sort="name" data-filter="name">Clsoed At </th>

                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($shop_operating_hour as $row){
                                         ?>
                                         

                                            <tr>
                                                
                                                <td><?= $i ?></td>
                 
                                                <td><?= $row['day'] ?></td>

                                                <td><?= $row['open_at'] ?></td>
                                                <td><?= $row['closed_at'] ?></td>
                                                <td>
                                                <a href="<?= base_url() ?>/ShopOperatingHour/edit/<?= $row['shop_operating_hour_id']?>" class="btn btn-warning" ><i class="fa fa-pen"></i> Edit</a>


                                                <a href="<?= base_url() ?>/ShopOperatingHour/delete/<?= $row['shop_operating_hour_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</td>
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

$(document).ready(function(){

            function submit_category(){
                alert("asd");
            }

            $('.selection').on('change', function(e) {
        e.preventDefault();
        var value = $(this).val();
        // alert(value);
        window.location.href = ("<?= base_url() ?>/shop_operating_hour?shop_operating_hour_category=" + value);
    })
        });
        </script>