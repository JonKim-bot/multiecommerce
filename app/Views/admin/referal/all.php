<style>
    .iconRef {
        transform: rotate(90deg);
        display: inline-block
    }

    .refContainer {
        padding-left: 3rem
    }

    .refText {
        font-size: 1rem
    }
</style>

<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">
            <a href="
				<?= base_url() ?>/market_place">Referral
            </a>
        </li>
    </ol>
    <!-- <div class="c-subheader-nav d-md-down-none mfe-2"><a class="c-subheader-nav-link" href="#"><i class="cil-settings c-icon"></i>
			&nbsp;Settings
		</a></div> -->
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    Referral Details

                    <div class="card-header-actions">
                        <a class="card-header-action">
                            <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">

                    <?php foreach ($users as $parent) { ?>
                        <div id="accordion_<?= $parent['customer_id']; ?>">

                            <div class="card">
                                <div class="card-header" id="heading_<?= $parent['customer_id']; ?>">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $parent['customer_id']; ?>">
                                            <?= $parent['email']; ?> <?= $parent['customer_id']; ?> : Referrals (<?= count($parent['family']); ?>)
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapse<?= $parent['customer_id']; ?>" class="collapse" data-parent="#accordion_<?= $parent['customer_id']; ?>">
                                    <div class="card-body">
                                        <?php foreach ($parent['family'] as $tier_1) { ?>
                                            <div id="accordion_1_<?= $tier_1['customer_id']; ?>">

                                                <div class="card">
                                                    <div class="card-header" id="heading_1_<?= $tier_1['customer_id']; ?>">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_1_<?= $tier_1['customer_id']; ?>">
                                                                <?= $tier_1['email']; ?> <?= $tier_1['customer_id']; ?> : Referrals (<?= count($tier_1['child']); ?>)
                                                            </button>
                                                        </h5>
                                                    </div>

                                                    <div id="collapse_1_<?= $tier_1['customer_id']; ?>" class="collapse" data-parent="#accordion_1_<?= $tier_1['customer_id']; ?>">
                                                        <div class="card-body">
                                                            <?php foreach ($tier_1['child'] as $tier_2) { ?>
                                                                <div id="accordion_2_<?= $tier_2['customer_id']; ?>">

                                                                    <div class="card">
                                                                        <div class="card-header" id="heading_2_<?= $tier_2['customer_id']; ?>">
                                                                            <h5 class="mb-0">
                                                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_2_<?= $tier_2['customer_id']; ?>">
                                                                                    <?= $tier_2['email']; ?> <?= $tier_2['customer_id']; ?> : Referrals (<?= count($tier_2['child']); ?>)
                                                                                </button>
                                                                            </h5>
                                                                        </div>

                                                                        <div id="collapse_2_<?= $tier_2['customer_id']; ?>" class="collapse" data-parent="#accordion_2_<?= $tier_2['customer_id']; ?>">
                                                                            <div class="card-body">
                                                                                <?php foreach ($tier_2['child'] as $tier_3) { ?>
                                                                                    <div id="accordion_3_<?= $tier_3['customer_id']; ?>">

                                                                                        <div class="card">
                                                                                            <div class="card-header" id="heading_3_<?= $tier_3['customer_id']; ?>">
                                                                                                <h5 class="mb-0">
                                                                                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapse_3_<?= $tier_3['customer_id']; ?>">
                                                                                                        <?= $tier_3['email']; ?> <?= $tier_3['customer_id']; ?>
                                                                                                    </button>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>