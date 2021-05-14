
    <style>
    .invoice-box {
        max-width: 800px;
        margin-top:400px;
        position: relative;
        top:30px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }
    
    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }
    
    .invoice-box table tr td:nth-child(2) {

    }
    
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }
    
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>

    <div style="text-align:center">
        <a href="<?= base_url() . "/orders/print_receipt/" . $orders['orders_id'] ?>" class="btn btn-primary mt-5" >Print</a>
    </div>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="4">
                    <table>
                        <tr>
                            <td class="title">
                                <!-- <img src="<?= base_url() .  $shop['icon'] ?>" style="max-width:300px;"> -->
                            </td>
                            
                            <td style="text-align:left">
                                Receipt #: <?= $orders['orders_id'] ?><br>
                                Created: <?= $orders['created_date'] ?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <?= $orders['address'] ?><br>
                               
                                <br>
                                Name : <?= $orders['full_name'] ?><br>
                                Email : <?= $orders['email'] ?><br>
                                Contact : <?= $orders['contact'] ?>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td colspan="3">
                    Payment Method
                </td>
                
                <td style="text-align:right">
                    <?= $orders['payment_method'] ?>
                </td>
                
            </tr>
            
            <tr class="details">
            <td colspan="3">
                    <?= $orders['payment_method'] ?>
                </td>
                
                <td style="text-align:right">
                    RM <?= $orders['grand_total'] ?>
                </td>
            </tr>
            
            <tr class="heading">
            <td>Product Name</td>
                                                    <td>Product Quantity</td>
                                                    <td >Remark</td>
                                                    <td style="text-align:right">Product Price</td>

            </tr>
            <?php foreach($orders['order_detail'] as $row){ ?>

            <tr class="item">
            <td><?= $row['product_name'] ?>
            
            <?php if(!empty($row['order_detail_option'])){ ?>
                                                <?php foreach($row['order_detail_option'] as $row_option){ ?>
                                                    <li><?= $row_option['option_name'] ?> - <?= $row_option['product_option_name'] ?><br> RM <?= $row_option['selection_price'] ?></li>
                                                <?php  } ?>
                                                <?php  } ?>
            </td>
                                                <td><?= $row['product_quantity'] ?> x</td>
                                                <td ><?= $row['remark']  ?></td>
                                                <td style="text-align:right"> RM<?= $row['product_price'] ?></td>
            </tr>
            <?php  } ?>

          
            
            <tr class="heading">
                                                <td colspan="3"><b>Subtotal :</b> </td>
                                                <td colspan="4" style="text-align:right">RM <?= $orders['subtotal'] ?></td>

                                            </tr>
                                            <tr class="heading">
                                                <td colspan="3"><b>Delivery Fee :</b> </td>
                                                <td colspan="4" style="text-align:right">RM <?= $orders['delivery_fee'] ?></td>

                                            </tr>
                                            <tr class="heading">
                                                <td colspan="3"><b>Total :</b> </td>
                                                <td colspan="4" style="text-align:right">RM <?= $orders['grand_total'] ?></td>

                                            </tr>
        </table>
    </div>