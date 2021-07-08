 <!-- <style>
    /* .map-fix {
        position: relative;
    top: 0;
    /* top: 103px; */
    height: 100%;
    right: 0;
    bottom: 0;
    width: 41.7%;
    width: 100%; */
}
</style>    
<div id="piegen-page">
		<header style="
        right: 0;
    z-index: 9;
    margin: 0 auto;
    position:relative;
        ">
        
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="piegen-navbar-brand">
							<a class="piegen-logo" href="index.html"><i class="flaticon-cutlery"></i><span>Lu</span><span>to</span></a>
						</div>
					</div>
				</div>
			</div>
		</header>
    </div>  -->
   
    
    <section>
        <div class="container-fluid">
            <div class="row">
            

                <div class="col-md-7 responsive-wrap">
                <div style="height:50px;background:#f0ad4e;padding:10px">
    <a href="<?= base_url() ?>">
        <i class="fas fa-arrow-circle-left fa-2x text-white"></i>
    </a>
    <a href="#" class="js-piegen-nav-toggle piegen-nav-toggle"><i></i></a>
    </div>
                    <div class="row detail-filter-wrap">
                        <div class="col-md-4 featured-responsive">
                            <div class="detail-filter-text">
                                <p><span id="number_result"></span> Results For <span>Restaurant</span></p>
                            </div>
                        </div>
                        <div class="col-md-8 featured-responsive">
                            <div class="detail-filter">
                                <p>Filter by</p>
                                <form class="filter-dropdown">
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect">
                                        <option selected>All Area</option>
                                        <?php foreach ($state as $row) { ?>
                                            <option value="<?= $row[
                                                'state'
                                            ] ?>"><?= $row['state'] ?></option>
                            <?php } ?>
                                    </select>
                                </form>
                                <form class="filter-dropdown">
                                    <select class="custom-select mb-2 mr-sm-2 mb-sm-0" id="inlineFormCustomSelect1">
                            <option selected>All Category</option>
                            <?php foreach ($tag as $row) { ?>
                                <?php if (
                                    isset($_GET['category']) &&
                                    $_GET['category'] == $row['tag_id']
                                ) { ?>
                            <option selected value="<?= $row[
                                'tag_id'
                            ] ?>"><?= $row['tag'] ?></option>

                                <?php } else { ?>
                                    <option value="<?= $row[
                                        'tag_id'
                                    ] ?>"><?= $row['tag'] ?></option>

                                <?php } ?>

                            <?php } ?>
                            </select>
                                </form>
                                <div class="map-responsive-wrap">
                                    <a class="map-icon" href="#"><i class="fa fa-map-marker fa-2x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row detail-checkbox-wrap">
                    <div class="col-md-12">
                                <formlist class="formlist-wrap mt-4">
                                    <div class="btnlist-group" role="group" aria-label="Basic example">
                                        <input type="text" style="height: 100%;" placeholder="What are your looking for?" class="btnlist-group1 search_shop" id="keyword">
                                        <button type="submit" class="btnlist-formlist"><i class="fa fa-search"></i> SEARCH<i class="pe-7s-angle-right"></i></button>
                                    </div>
                                </formlist>
                                <div class="slider-link">
                                    <!-- <a href="#">Browse Popular</a><span>or</span> <a href="#">Recently Addred</a> -->
                                </div>
                            </div>
                    </div>
                    <div class="row light-bg detail-options-wrap" id="shop_list">
                        
                    </div>
                </div>
                <div class="col-md-5 responsive-wrap map-wrap">
                    <div class="map-fix">
                        <!-- data-toggle="affix" -->
                        <!-- Google map will appear here! Edit the Latitude, Longitude and Zoom Level below using data-attr-*  -->
                        <div id="map" data-lat="40.674" data-lon="-73.945" data-zoom="14"></div>
                    </div>                 
                </div>
            </div>
        </div>
    </section>
   <input type="hidden" id="base_url" value="<?= base_url() ?>">
