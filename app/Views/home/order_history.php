
<style>
.article-entry .blog-img {
    height: 100px;
    display: block;
}
</style>

<div id="piegen-page">
		<header style="background:#f0ad4e">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="piegen-navbar-brand">
                        <a class="piegen-logo"><i class="flaticon-cutlery"></i><span>Emenu</span></a>
						</div>
						<a href="#" class="js-piegen-nav-toggle piegen-nav-toggle"><i></i></a>
					</div>
				</div>
			</div>
		</header>
		<div class="piegen-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-3 text-center animate-box intro-heading">
						<h2>Order History</h2>
					</div>
				</div>
				<div class="row">
                    <?php foreach ($orders as $row) { ?>
					<div class="col-md-4">
                        <a href="<?= base_url() ?>/main/order_detail/<?= $row[
    'orders_id'
] ?>" target="_blank">
						<article class="article-entry">
							<a href="<?= base_url() ?>/main/order_detail/<?= $row[
    'orders_id'
] ?>" target="_blank" class="blog-img" style="background-image: url(<?= base_url() .
    $row['image'] ?>);"></a>
							<div class="desc">
								<p class="meta"><span class="day"><?= DATE(
            'd',
            strtotime($row['delivery_date'])
        ) ?></span><span class="month"><?= DATE(
    'M',
    strtotime($row['delivery_date'])
) ?></span></p>
								<p class="admin"><span>Shop Name:</span> <span><?= $row[
            'shop_name'
        ] ?></span></p>
								<h2><a href="<?= base_url() ?>/main/index/<?= $row[
    'slug'
] ?>">Subtotal : RM <?= $row['subtotal'] ?></a></h2>
								<h2><a href="<?= base_url() ?>/main/index/<?= $row[
    'slug'
] ?>">Delivery Fee : RM <?= $row['delivery_fee'] ?></a></h2>
								<h2><a href="<?= base_url() ?>/main/index/<?= $row[
    'slug'
] ?>">Total : RM <?= $row['grand_total'] ?></a></h2>
								<a style="    word-break: break-all;" href="<?= base_url() ?>/main/order_detail/<?= $row[
    'orders_id'
] ?>" target="_blank"><?= base_url() ?>/main/order_detail/<?= $row[
    'orders_id'
] ?></a>

							</div>
						</article>
                        </a>
					</div>
                    <?php } ?>
					
				</div>
			</div>
		</div>


