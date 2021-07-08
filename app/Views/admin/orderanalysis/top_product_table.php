<p>
        <input type="button" value="Download PDF" 
            id="btPrint" onclick="createPDF()" />
    </p>
<div class="table-responsive" id="tab_product">
                            <table class="table table-striped datatable table-bordered no-footer " id="product_list_table" data-method="get" data-url="<?= base_url("product") ?>" style="border-collapse: collapse !important">
                                    <thead>
                                        <tr role="row">
                                            <th>No.</th>

                                            <th data-sort="name" data-filter="name">Product</th>
                                            <th data-sort="name" data-filter="name">Sold</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $i = 1;
                                            foreach($top_product as $row){
                                         ?>
                                            <tr>
                                                
                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $i ?></a></td>
                                          

                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $row['product_name'] ?></a></td>
                                                <td><a href="<?= base_url() ?>/product/detail/<?= $row['product_id']?>"><?= $row['total'] ?></a></td>

                                            </tr>
                                        <?php
                                        $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>

                        
<script>
    function createPDF() {
        var sTable = document.getElementById('tab_product').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>New Register</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>