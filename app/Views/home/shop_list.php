<?php foreach($shop as $row){ ?>
    <div class="col-sm-6 col-lg-12 col-xl-6 featured-responsive">
        <div class="featured-place-wrap">
        <img src="<?= base_url() . $row['image']?>" style="height:300px" class="img-fluid" alt="#">
                <span class="featured-rating-orange ">
                    <i class="fa fa-map-pin fa-2x maplocation" style="cursor:pointer" lat="<?= $row['lat'] ?>" lng = "<?= $row['lng'] ?>"></i>
                </span>
                <a href="<?= base_url() . "/main/index/" . $row['slug'] ?>">

                <div class="featured-title-box">
                <h6><?= $row['shop_name'] ?></h6>
                    <p class="text-dark">Restaurant </p> <span>• </span>

                    <ul>
                    <li>
                    
                        <a class="text-dark">
                        <span class="fa fa-map-pin">
                    </span>
                        <?= $row['address'] ?></a>
                        </li>
                        <li><span class="fa fa-phone"></span>
                            <p class="text-dark"><?= $row['contact'] ?></p>
                        </li>
                        <li>
                            <a href=" <?= base_url() . "/main/index/" . $row['slug'] ?>" class="text-primary"> 
                            <!-- <span class="fa fa-link"></span> -->
                            <?= base_url() . "/main/index/" . $row['slug'] ?></a>
                        </li>
                    </ul>
                    <div class="bottom-icons">
                    <input type="hidden" value= "<?= $number ?>" id="hidden_number">
                    <div class="<?=  $row['is_active'] == 1 ? "OPEN" : "CLOSED" ?>-NOW"><?= $row['is_active'] == 1 ? "OPEN" : "CLOSED" ?> NOW</div>
                        <!-- <span class="fa fa-heart"></span>
                        <span class="fa fa-bookmark"></span> -->
                    </div>
                </div>
            </a>
        </div>
    </div>
<?php } ?>

<script>
        // Want to customize colors? go to snazzymaps.com
        $(".maplocation").on('click', function(){
            var lat = $(this).attr('lat');
            var lng = $(this).attr('lng');
            myMap(lat,lng);
        });
        function myMap(lat = 1.546948,lng = 103.7781335) {
            var mapzoom = $('#map').data('zoom');
            // Styles a map in night mode.
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                },
                zoom: mapzoom,
                scrollwheel: false
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: parseFloat(lat),
                    lng: parseFloat(lng)
                },
                map: map,
                title: 'We are here!'
            });
        }
    </script>