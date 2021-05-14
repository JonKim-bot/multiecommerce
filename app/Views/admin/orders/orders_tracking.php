
<style>
     @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
     /* @import url('<?= base_url() ?>/assets/css/core/custom.css'); */
     /* @import url('<?= base_url() ?>/assets/css/core/style.css'); */

body {
    background-color: #eeeeee;
    font-family: 'Open Sans', serif
}

.container {
    margin-top: 50px;
    margin-bottom: 50px
}

.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FF5722
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style>
<div class="container">
    <article class="card">
        <header class="card-header"> <?= $shop['shop_name'] ?> Orders / Tracking For <b><?= $orders['full_name'] ?></b></header>
        <div class="card-body">
            <h6>Order ID: <?= $orders['orders_id'] ?></h6>
            <article class="card">
                <div class="card-body row">
                <div class="col"> <strong>Prepared BY:</strong> <br> <?= $shop['shop_name'] ?>, | <i class="fa fa-phone"></i> <?= $shop['contact'] ?> </div>
                    <div class="col"> <strong>Status:</strong> <br> <?= $orders['orders_status'] ?> </div>
                    <div class="col"> <strong>Tracking #:</strong> <br> <a href="<?= base_url() . "/main/view_order_status/" . $orders['orders_id'] ?>"><?= base_url() . "/main/view_order_status/" . $orders['orders_id'] ?></a> </div>
                </div>
            </article>
            <!-- <div class="track">
                <?php if($orders['orders_status_id'] != "5"){ ?>
                <?php foreach($orders_status as $row){ ?>
                    
                    <?php if($row['orders_status_id'] != "5"){ ?>
                        <?php if($orders['orders_status_id'] == $row['orders_status_id'] || $orders['orders_status_id'] > $row['orders_status_id']) { ?>
                            <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?= $row['orders_status'] ?></span> </div>
                        <?php }else{ ?>

                            <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text"><?= $row['orders_status'] ?></span> </div>
                            
                        <?php } ?>
                    <?php } ?>

                <?php } ?>
                <?php } ?>


            </div> -->
            <hr>
            <!-- <ul class="row">
                <?php foreach($orders['order_detail'] as $row){ ?>

                <li class="col-md-4">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="<?= base_url() . $row['image']; ?>" class="img-sm border"></div>
                        <figcaption class="info align-self-center">
                            <p class="title"><?= $row['product_name'] ?></p> <span class="text-muted">RM <?= $row['product_price'] ?> </span>
                        </figcaption>
                    </figure>
                </li>
                <?php } ?>

            </ul> -->
            
            <hr>
            <a href="<?= $orders['url'] ?>" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Contact Shop</a>
        </div>
    </article>
</div>