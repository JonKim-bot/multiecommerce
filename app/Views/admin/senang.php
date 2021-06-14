<body onload="document.order.submit()">
    <form id="senang_form" name="order" method="post" action="https://sandbox.senangpay.my/payment/<?php echo $data['merchant_id'] ?>">
        <input type="hidden" name="detail" value="<?php echo $data['detail']; ?>">
        <input type="hidden" name="amount" value="<?php echo $data['amount']; ?>">
        <input type="hidden" name="order_id" value="<?php echo $data['order_id']; ?>">
        <input type="hidden" name="name" value="<?php echo $data['name']; ?>">
        <input type="hidden" name="email" value="<?php echo $data['email']; ?>">
        <input type="hidden" name="phone" value="<?php echo $data['phone']; ?>">
        <input type="hidden" name="hash" value="<?php echo $data['hash']; ?>">
    </form>


</body>