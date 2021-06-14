
      <!-- Hero area Start-->
      <div class="hero-area section-bg2">
         <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="slider-area">
                           <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                              <div class="hero-caption hero-caption2">
                                 <h2>Gift Details</h2>
                                 <nav aria-label="breadcrumb">
                                       <ol class="breadcrumb justify-content-center">
                                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                                          <li class="breadcrumb-item"><a href="#">Gift Details</a></li> 
                                       </ol>
                                 </nav>
                              </div>
                           </div>
                     </div>
                  </div>
               </div> 
         </div>
      </div>
      <!--  Hero area End -->
      <!-- Blog Area Start -->
      <section class="blog_area single-post-area section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 posts-list">
                  <div class="single-post">
                     <div class="feature-img">
                        <img class="img-fluid" src="<?= base_url() .  $voucher['banner'] ?>" width ="80%" alt="">
                     </div>
                     <div class="blog_details">
                        <h2 style="color: #2d2d2d;"><?= $voucher['voucher'] ?>
                        </h2>
                        <ul class="">
                           <li><a href="#" class="text-dark"><i class="fa fa-date"></i>Valid Until <?= $voucher['valid_until'] ?></a></li>
                        </ul>
                        <p class="excert">
                        <?= $voucher['description'] ?>
                        </p>

                        <p class="excert">
                        <h2>Redeem Intruction</h2>
                        <?= $voucher['redeem_instruction'] ?>
                        </p>
                        
                        
                     </div>
                  </div>
                  <div class="navigation-top">
                   <div class="d-sm-flex justify-content-between text-center">
                        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Required Point :  <?= $voucher['redeem_point'] ?></p>
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                        </div>
                          <!-- <ul class="social-icons">
                           <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                           <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                           <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                     </div> -->
                  
                  </div>
                  <div class="blog-author">
                     <div class="media align-items-center">
                        <img src="<?= base_url() . $shop['image'] ?>" width="200px" alt="">
                        <div class="media-body">
                           <a href="#">
                              <h4><?= $shop['shop_name'] ?></h4>
                           </a>
                           <!-- <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                              our dominion twon Second divided from</p> -->
                        </div>
                     </div>
                  </div>
               </div>
             
            </div>
         </div>
      </section>
      <!-- Blog Area End -->
   </main>
 