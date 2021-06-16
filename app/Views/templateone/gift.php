
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
                                            <select name="select2" id="gift_select">
                                                <option value="1">All</option>
                                                <option value="2">My Gift</option>
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
    
        function load_gift(selected = 1){
             let postParam = {
                 slug : "<?= $shop['slug'] ?>",
                 selected : selected,
             }
             $.post("<?= base_url('main/load_gift') ?>", postParam, function(html){
                 $('.gift_col').html(html);
                 
             });
         }
         

        $("#gift_select").on("change", function() {
            var selected_value = $(this).val();
            load_gift(selected_value);    
        });

         function redeem(gift_id){
            let postParam = {
                slug : "<?= $shop['slug'] ?>",
                gift_id : gift_id,
            }
            $.post("<?= base_url('main/redeem') ?>", postParam, function(data){
                // $('.gift_col').html(html);
                data = JSON.parse(data);
                if(data.status){

                Swal.fire({
                    title: "Redeem done",
                    text: "Please wait for admin to verify your gift and contact you",
                    type: 'success'
                });
                }else{
                    Swal.fire({
                    title: "Redeem failed",
                    text: "Please make your payment on your orders",
                    type: 'error'
                });
                }
                load_gift();
            });
        }
       
    
        load_gift();
        

   </script>