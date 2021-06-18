<p>
        <input type="button" value="Download PDF" 
            id="btPrint" onclick="createPDF()" />
    </p>
<div class="table-responsive" id="tab">
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

                                        
<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

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