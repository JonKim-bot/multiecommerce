
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
		<li class="breadcrumb-item active"><a href="<?= base_url() ?>/product">Product</a></li>
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
                Products
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                    <a class="card-header-action" href="<?= base_url() ?>/product/add">
                        <i class="cil-plus c-icon"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    
                    <div class="row">
                    
                    <div class="col-sm-6">
                       <select name="category" id="" class="form-control selection">
                            <?php foreach($category as $row){ ?>

                                <?php if( isset($_GET['product_category']) && $row['category_id'] == $_GET['product_category']){ ?>
                                    <option selected value="<?= $row['category_id'] ?>"><?= $row['category'] ?></option>

                                <?php  }else{ ?>

                                <option value="<?= $row['category_id'] ?>"><?= $row['category'] ?></option>
                                <?php } ?>
                            <?php } ?>
                       </select>
                    </div>
                        <!-- <a href="<?= base_url(). "/product" ?>" class="btn btn-primary">Switch To Mobile View</a> -->
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table class="table table-striped datatable table-bordered no-footer " id="product_list_table" data-method="get" data-url="<?= base_url("product") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                        <th data-sort="name" data-filter="name">No</th>
                                        <th data-sort="name" data-filter="name">Image</th>

                                            <th data-sort="name" data-filter="name">Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($product as $row){
                                         ?>
                                         

                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $i ?></a></td>
                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>">
                                                <img src="<?= base_url() . $row['image']; ?>" width="200" class="img-fluid d-block m-auto" alt="">

                                                </a></td>

                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $row['product_name'] ?></a></td>
                                                
                                                <td>
                                                <a href="<?= base_url() ?>/product/edit/<?= $row['product_id']?>" class="btn btn-warning" ><i class="fa fa-pen"></i> Edit</a>
                                                <a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>" class="btn btn-primary" ><i class="fa fa-eye"></i> View</a>


                                                <a href="<?= base_url() ?>/product/delete/<?= $row['product_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
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
        window.location.href = ("<?= base_url() ?>/product?product_category=" + value);
    })
        });
        </script>