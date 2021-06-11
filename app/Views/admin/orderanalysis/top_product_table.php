<div class="table-responsive">
                            <table class="table table-striped datatable table-bordered no-footer " id="product_list_table" data-method="get" data-url="<?= base_url("product") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Sold</th>

                                            <th data-sort="name" data-filter="name">Product</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($top_product as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $i ?></a></td>
                                          

                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $row['total'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $row['product_name'] ?></a></td>

                                                <td><a href="<?= base_url() ?>/product/delete/<?= $row['product_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>