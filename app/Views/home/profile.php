
<!--===============================================================================================-->	
<link rel="icon" type="image/png" href="<?= base_url() ?>/assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/login/css/main.css">
<!--===============================================================================================-->
<script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAIJ95ufzqwjC7nE6nuUocyjOABoqFPaA&callback=initAutocomplete&libraries=places&v=weekly"
         defer
         ></script>

    
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
    </div>
    <input type="hidden" value="<?= base_url() ?>" name="" id="base_url">

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-10">
				<form class="login100-form validate-form" id="profileform" 
                 method="POST" enctype="multipart/form-data" action="<?= base_url() ?>/home/profile"> 
					<span class="login100-form-title p-b-5">
						Profile

					</span>
					<span class="login100-form-avatar">
                        <img src="<?= $customer[
                            'thumbnail'
                        ] ?>" height="100%" alt="">
					</span>
                    <?php if (isset($error)) { ?>
                        <p for="" class="text-danger p-t-2 text-center"><?= $error ?></p>
                    <?php } ?>
                    <div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter Name">
						<input class="input100" type="text" name="name" value="<?= $customer[
          'name'
      ] ?>">
						<span class="focus-input100" data-placeholder="Name"></span>
					</div>

					<div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter Contact">
						<input class="input100" type="tel" name="contact" value="<?= $customer[
          'contact'
      ] ?>">
						<span class="focus-input100" data-placeholder="Contact"></span>
					</div>

                    <div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter Email">
                        <input class="input100" type="email" name="email" readonly value="<?= $customer[
                            'email'
                        ] ?>">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-t-15 m-b-35" data-validate = "Enter Address">
                        <textarea class="input100"  name="address" id="address"><?= $customer[
                            'address'
                        ] ?></textarea>
                        <span class="focus-input100" data-placeholder="Address"></span>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6 form-group">
                                <label for="">Latitute</label>
                                <input type="text" class="form-control" value="<?= $customer[
                                    'lat'
                                ] ?>" readonly value="" id="lat" name="lat">
                            </div>
                            <div class="col-md-6 form-group">
                                
                                <label for="">Longtitute</label>
                                <input type="text" class="form-control" value="<?= $customer[
                                    'lng'
                                ] ?>" readonly value="" id="lng" name="lng">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6 form-group">
                                <label for="">State</label>
                                <input type="text" class="form-control" value="<?= $customer[
                                    'state'
                                ] ?>" readonly value="" id="state" name="state">
                            </div>
                            <div class="col-md-6 form-group">
                                
                                <label for="">Taman</label>
                                <input type="text" class="form-control" value="<?= $customer[
                                    'taman'
                                ] ?>" readonly value="" id="taman" name="taman">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Google Map url</label>
                        <p style="overflow: auto;"><a target="_blank" id="url" href="<?= $customer[
                            'url'
                        ] ?>"><?= $customer['url'] ?></a></p>
                        <input type="text" name="url" value="<?= $customer[
                            'url'
                        ] ?>" class="form-control" readonly id="urlinput">
                    </div>
                    <div id="map">
                    </div>
               

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" id="submit_btn">
							Save
						</button>
					</div>
                
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
    <script src="<?= base_url() ?>/assets/emenu/js/main.js"></script>

    <script>


            // $("#profileform").on('submit', function(e){
            //     var profileData = new FormData(e.target);

            //     console.log(profileData);
            // });
            
             function initMap() {
               const map = new google.maps.Map(document.getElementById("map"), {
                 zoom: 14,
                 center: { lat: <?= $customer['lat'] == ''
                     ? '102'
                     : $customer['lat'] ?>, lng: <?= $customer['lng'] == ''
    ? '102'
    : $customer['lng'] ?> },
               });
               const geocoder = new google.maps.Geocoder();
               const infowindow = new google.maps.InfoWindow();
               // document.getElementById("submit").addEventListener("click", () => {
                 geocodePlaceId(geocoder, map, infowindow);
               // });
          }
          function geocodePlaceId(geocoder, map, infowindow) {
               // const placeId = "ChIJn9vtiTLMxDERtK0Mv5sya3s";
               alert(placeId)
               geocoder.geocode({ placeId: placeId }, (results, status) => {
                 if (status === "OK") {
                   if (results[0]) {
                     map.setZoom(11);
                     map.setCenter(results[0].geometry.location);
                     const marker = new google.maps.Marker({
                       map,
                       position: results[0].geometry.location,
                     });
                     infowindow.setContent(results[0].formatted_address);
                     infowindow.open(map, marker);
                   } else {
                     window.alert("No results found");
                   }
                 } else {
                   window.alert("Geocoder failed due to: " + status);
                 }
               });
             }
            function process_map(map){
            console.log(map)
               // Create the search box and link it to the UI element.
               const input = document.getElementById("address");
               const searchBox = new google.maps.places.SearchBox(input);
               // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
               // Bias the SearchBox results towards current map's viewport.
               map.addListener("bounds_changed", () => {
                 searchBox.setBounds(map.getBounds());
               });
               let markers = [];
               // Listen for the event fired when the user selects a prediction and retrieve
               // more details for that place.
               searchBox.addListener("places_changed", () => {
                 const places = searchBox.getPlaces();
         
                 console.log(places);
                 if (places.length == 0) {
                   return;
                 }
                 // Clear out the old markers.
         
                 markers.forEach((marker) => {
                   marker.setMap(null);
                 });
                 markers = [];
                 // For each place, get the icon, name and location.
                 const bounds = new google.maps.LatLngBounds();
                 places.forEach((place) => {
                   if (!place.geometry) {
                     console.log("Returned place contains no geometry");
                     return;
                   }
                   console.log(place.place_id);
                   let p_id = place.place_id;
                  //  var service = new google.maps.places.PlacesService(document.getElementById('map'));

               //     service.getDetails({
               //    placeId: 'EjxKYWxhbiBOaWJvbmcsIFRhbWFuIERheWEsIDgxMTAwIEpvaG9yIEJhaHJ1LCBKb2hvciwgTWFsYXlzaWEiLiosChQKEgldpN1KdG7aMRH30h2JHgA1CBIUChIJe_AGhNht2jERToZPd-vm_dQ'
               // }, function (place, status) {
               //    console.log('Place details:', place.geometry.location.lat);
               // });
               let postParam = {
                  'place_id' : p_id
               }
                  $.post("<?= base_url() ?>/Ajax/get_lat_long_from_place_id",postParam, function(returndata) {
                     JSON.parse(returndata);
                     let new_data = JSON.parse(returndata);
                     // console.log("return data" + new_data.result.geometry);

                    bind_text(new_data);


                  });
                  
                   if (!place.place_id) {
                       alert("no place id")
                   return;
                 }else{
                     //found the place id
                 }
                   const icon = {
                     url: place.icon,
                   //   id : place.id,
                     size: new google.maps.Size(71, 71),
                     origin: new google.maps.Point(0, 0),
                     anchor: new google.maps.Point(17, 34),
                     scaledSize: new google.maps.Size(25, 25),
                   };
                   // Create a marker for each place.
                   markers.push(
                     new google.maps.Marker({
                       map,
                       icon,
                       title: place.id ,
         
                       position: place.geometry.location,
                     })
                   );
         
         
                   console.log(icon);
         
                   if (place.geometry.viewport) {
                     // Only geocodes have viewport.
                     bounds.union(place.geometry.viewport);
                   } else {
                     bounds.extend(place.geometry.location);
                   }
                 });
                 map.fitBounds(bounds);
               });
         }
         function get_position_from_lat_lng(postParam){
            $.post("<?= base_url() ?>/Ajax/get_position_from_lat_lng",postParam, function(returndata) {
                     JSON.parse(returndata);
                     let new_data = JSON.parse(returndata);
                     // console.log("return data" + new_data.result.geometry);
                     console.log(new_data)
                     $('#address').val(new_data.result.formatted_address);
                     return new_data.result.formatted_address;
                     // let location = (new_data.result.geometry.location);
                     // let lat = location.lat;
                     // let lng = location.lng;
                     // let distance = getDistanceFromLatLonInKm(1.5588869,103.7543101,lat,lng);
                     // // alert(JSON.stringify(distance) + "km");
                     // $('.distance').text(distance.toFixed(2) + " KM");

            });
         }
         function bind_text(new_data){

          let taman = new_data.result.address_components[2].long_name;
          let state = new_data.result.address_components[3].long_name;

          let location = (new_data.result.geometry.location);
          let lat = location.lat;
          let lng = location.lng;
          let url = new_data.result.url;
          // alert(JSON.stringify(distance) + "km");
          $('#url').text(url);
          $('#urlinput').val(url);

          $('#taman').val(taman);
          $('#state').val(state);

          $('#lat').val(lat);
          $('#lng').val(lng);

          // $('#url').taext(url);

          $("#url").attr("href", url);
         }
         function initAutocomplete() {
            let map ="";
            navigator.geolocation.getCurrentPosition(
            function(position) {
               let lat = position.coords.latitude;
               let lng = position.coords.longitude;
               const myLatLng = { lat: lat, lng: lng };

               map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: <?= $customer['lat'] == ''
                    ? '102'
                    : $customer['lat'] ?>, lng: <?= $customer['lng'] == ''
    ? '102'
    : $customer['lng'] ?> },
   
                    zoom: 15,
                    mapTypeId: "roadmap",
               });
               // let postParam
                     // alert(JSON.stringify(distance) + "km");
              //  $('.distance').text(distance.toFixed(2) + " KM");
               console.log(myLatLng);
               let new_position = get_position_from_lat_lng(myLatLng)
               
               new google.maps.Marker({
                  position:  { lat: <?= $customer['lat'] == ''
                      ? '102'
                      : $customer['lat'] ?>, lng: <?= $customer['lng'] == ''
    ? '102'
    : $customer['lng'] ?> },
                  map,
                  title: "Your location!",
               });
                  // alert(JSON.stringify(position));
               process_map(map);

            }.bind(this),
            function(error) {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: { lat: <?= $customer['lat'] == ''
                        ? '102'
                        : $customer['lat'] ?>, lng: <?= $customer['lng'] == ''
    ? '102'
    : $customer['lng'] ?> },
   
                    zoom: 14,
                    mapTypeId: "roadmap",
                  });
                  
                  new google.maps.Marker({
                  position:  { lat: <?= $customer['lat'] == ''
                      ? '102'
                      : $customer['lat'] ?>, lng: <?= $customer['lng'] == ''
    ? '102'
    : $customer['lng'] ?> },
                  map,
                  title: "Your location!",
               });  
                  process_map(map);
               }
         )
             
             
           
           
           
           }
        </script>


</body>
</html>