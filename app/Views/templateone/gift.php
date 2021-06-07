
    <main>
        <!-- Hero area Start-->
        <div class="hero-area section-bg2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="slider-area">
                            <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                                <div class="hero-caption hero-caption2">
                                    <h2>Gift</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb justify-content-center">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item"><a href="#">Gift</a></li> 
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
        <!-- listing Area Start -->
        <div class="listing-area pt-50 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <!--? Left content -->
                    <div class="col-xl-3 col-lg-4 col-md-4 ">
                        <!-- Job Category Listing start -->
                        <div class="category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                                <!-- select-Categories  -->
                                <div class="select-Categories pb-30">
                                    <div class="select-job-items2 mb-30">
                                        <div class="col-xl-12">
                                            <select name="select2">
                                                <option value="">All</option>
                                                <option value="">My Gift</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <!-- select-Categories End -->
                                <!-- Range Slider Start -->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!--?  Right content -->
                    <div class="col-xl-12 col-lg-8 col-md-8">
                        <div class="latest-items latest-items2">
                            <div class="row gift_col" id="">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- listing-area Area End -->
    </main>
   
   <script>
    
        function load_gift(){
             let postParam = {
                 slug : "<?= $shop['slug'] ?>"
             }
             $.post("<?= base_url('main/load_gift') ?>", postParam, function(html){
                 $('.gift_col').html(html);
                 
             });
         }
      
       
    
        load_gift();
        

   </script>