<link href="<?= base_url() ?>/assets/emenu/redcayne/css/style.css" rel="stylesheet" />

<div id="piegen-page">
		<header style="background:#f0ad4e">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="piegen-navbar-brand">
                        <a class="piegen-logo"></i><span>Emenu</span></a>
						</div>
						<a href="#" class="js-piegen-nav-toggle piegen-nav-toggle"><i></i></a>
					</div>
				</div>
			</div>
		</header>
    </div>
    <!--================Banner Area =================-->
    <section class="banner_area">
      <div class="container">
        <div class="banner_content">
          <h4>Special List</h4>
        </div>
      </div>
    </section>
    <!--================End Banner Area =================-->

    <!--================Blog List Area =================-->
    <section class="blog_list_area">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
            <?php foreach ($special as $row) { ?>
              <article class="blog_list_item row m0">
                <div class="col-md-6">
                  <div class="blog_list_img">
                    <img src="<?= $row['thumbnail'] ?>" alt="" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="blog_list_content">
                    <h3><?= $row['title'] ?></h3>
                    <h6>Posted by <a href="#">admin</a> at <?= $row[
                        'created_date'
                    ] ?></h6>
                    <p>
                    <?= $row['short_description'] ?>
                    </p>
                    <div class="pull-left">
                      <a class="event_btn" href="<?= base_url() ?>/home/special_detail/<?= $row[
    'special_id'
] ?>">READ MORE</a>
                    </div>
                    <div class="pull-right">
                      <a href="#"><i class="fa fa-eye"></i><?= $row[
                          'view'
                      ] ?></a>
                    </div>
                  </div>
                </div>
              </article>
              <?php } ?>
              
            </div>
            <!-- <nav aria-label="Page navigation" class="blog_pagination">
              <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav> -->
          </div>
          <div class="col-md-4">
            <div class="blog_right_sidebar">
              <!-- <aside class="right_widget search_widget">
                <div class="input-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search for..."
                  />
                  <span class="input-group-btn">
                    <button class="btn btn-default" style="border-radius:0px"  type="button">
                      <i class="fa fa-search"></i>
                    </button>
                  </span>
                </div>
              </aside> -->
              <aside class="right_widget category_widget">
                <div class="sidebar_title">
                  <h3>Categories</h3>
                </div>
                <ul>
                <?php foreach ($special_category as $row) { ?>

                  <li>
                    <a href="<?= base_url() .
                        '/home/special?category_id=' .
                        $row['special_category_id'] ?>"
                      ><i class="fa fa-chevron-right"></i><?= $row[
                          'special_category'
                      ] ?>
                      </a
                    >
                  </li>

                  <?php } ?>
               
                </ul>
              </aside>
          </div>
        </div>
      </div>
    </section>
    <!--================End Blog List Area =================-->
