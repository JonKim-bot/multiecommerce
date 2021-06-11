<div class="table-responsive">
                            <table class="table table-striped datatable table-bordered no-footer " id="category_list_table" data-method="get" data-url="<?= base_url("category") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>

                                            <th data-sort="name" data-filter="name">Category</th>
                                            <th data-sort="name" data-filter="name">Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($top_product_cat as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/category/detail/<?= $row['category_id']?>"><?= $i ?></a></td>
                                          

                                                <td><a href="<?= base_url() ?>/category/detail/<?= $row['category_id']?>"><?= $row['category'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/category/detail/<?= $row['category_id']?>"><?= $row['sales'] ?></a></td>

                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>