<div class="table-responsive">
                            <table class="table table-striped datatable table-bordered no-footer " id="brand_list_table" data-method="get" data-url="<?= base_url("brand") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>
                                            <th data-sort="name" data-filter="name">Banner</th>

                                            <th data-sort="name" data-filter="name">Brand</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($brand as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/brand/detail/<?= $row['brand_id']?>"><?= $i ?></a></td>
                                          
                                                <td><a href="<?= base_url() ?>/brand/detail/<?= $row['brand_id']?>"><?= $row['title'] ?></a></td>
                                                
                                                <td><a href="<?= base_url() ?>/brand/delete/<?= $row['brand_id']?>" class="btn btn-danger delete-button" ><i class="fa fa-trash"></i> Delete</a></td>
                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>