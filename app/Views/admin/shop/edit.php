<script
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCAIJ95ufzqwjC7nE6nuUocyjOABoqFPaA&callback=initAutocomplete&libraries=places&v=weekly"
         defer
         ></script>
<div class="c-subheader justify-content-between px-3">
	<ol class="breadcrumb border-0 m-0 px-0 px-md-3">
		<li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item"><a href="<?= base_url() ?>/Shop">Shop</a></li>
        <li class="breadcrumb-item active"><a href="<?= base_url() ?>/shop/edit/<?= $shop['shop_id']?>">Edit Shop Details</a></li>
	</ol>
	<!-- <div class="c-subheader-nav d-md-down-none mfe-2">
		<a class="c-subheader-nav-link" href="#">
			<i class="cil-settings c-icon"></i>
			&nbsp;Settings
		</a>
	</div> -->
</div>
<main class="c-main">
	
<div class="container-fluid">
    
	<div class="fade-in">
        <div class="card">
            <div class="card-header">
                Edit Shop Details
                <div class="card-header-actions">
                    <a class="card-header-action">
                        <i class="cil-arrow-circle-top c-icon minimize-card"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form role="form" method="POST" enctype="multipart/form-data" action="<?= base_url()?>/shop/edit/<?=$shop["shop_id"]?>">
                    <!-- <div class="form-group">
                        <label for="">Profile Picture</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="thumbnail">
                            <label class="custom-file-label" for="" aria-describedby="">Choose file</label>
                        </div>
                    </div> -->
                    
                    <div class="form-group">
                        <label for="">Shop</label>
                        <input type="text" class="form-control" name="shop" value="<?= $shop['shop_name'] ?>" placeholder="e.g. Restaurant Lim" required>
                    </div>
                    <div class="form-group">
                                    <label for="">Shop Chinese Name (If shop name got chinese character enter here)</label>
                                    <input type="text" class="form-control" name="shop_name" placeholder="e.g. Restaurant 中文" value="<?= $shop['shop_chinese_name'] ?>">
                                </div>
                    <div class="form-group">
                        <label for="">Operating Time</label>
                        <input type="text" class="form-control" name="operating_hour" value="<?= $shop['operating_hour'] ?>" placeholder="e.g. Monday-Sunday - 8AM - 10PM" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Contact</label>
                        <input type="number" class="form-control" name="contact" value="<?= $shop['contact'] ?>" placeholder="e.g. 012-123-1232" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Delivery Fee (PER KM)</label>
                        <input type="number" step="any" class="form-control" name="delivery_fee" value="<?= $shop['delivery_fee'] ?>" placeholder="e.g. RM 3" required>
                    </div> -->
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= $shop['email'] ?>" placeholder="e.g. xxx.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input type="file" class="form-control" name="banner" placeholder="Banner">
                    </div>
                    
                    <div class="form-group">
                        <label for="icon">Icon</label>
                        <input type="file" class="form-control" name="icon" placeholder="Banner">
                    </div>
                    <!-- <div class="form-group">
                    <label for="banner">Bank</label>

                    <select name="bank_id" class="select" id="" required>
                        <?php foreach($bank as $row){ ?>
                            <?php if($row['bank_id'] == $shop['bank_id']){ ?>
                                <option selected value="<?= $row['bank_id'] ?>"><?= $row['bank']?></option>
                            <?php }else{ ?>
                                <option value="<?= $row['bank_id'] ?>"><?= $row['bank']?></option>

                            <?php }?>

                        <?php }?>
                        </select>
                    </div> -->
                    <div class="form-group">
                    <label for="banner">Shop Category</label>

                    <select name="tag_id[]" class="select" id="" required multiple>
                        <?php foreach($tag as $row){ ?>
                            <?php if (in_array($row['tag_id'], explode(",",$shop['categories_tag']))) { ?>
                                <option selected value="<?= $row['tag_id'] ?>"><?= $row['tag']?></option>

                              <?php }else{?>

                                <option value="<?= $row['tag_id'] ?>"><?= $row['tag']?></option>

                              <?php }?>

                           
                        <?php }?>
                        </select>
                    </div>
                    <!-- <div class="form-group">
                        <label for="">Bank Holder Name</label>
                        <input type="text" class="form-control" value="<?= $shop['bank_holder_name'] ?>" name="bank_holder_name" placeholder="e.g. Lim Jin" required>
                    </div>
                    <div class="form-group">
                        <label for="">Bank Account</label>
                        <input type="text" class="form-control" value="<?= $shop['bank_account'] ?>" name="bank_account" placeholder="e.g. 123213123123" required>
                    </div> -->
                    <div class="form-group">
                        <label for="">Insta</label>
                        <input type="text" class="form-control" value="<?= $shop['insta'] ?>" name="insta" placeholder="e.g. https://www.facebook.com/PieGen-Software-111184540529485/?ref=bookmarks" >
                    </div>

                    <div class="form-group">
                        <label for="">Facaebook</label>
                        <input type="text" class="form-control" value="<?= $shop['facebook'] ?>" name="facebook" placeholder="e.g. https://www.instagram.com/piegen_software/" >
                    </div>
             
                    <div class="form-group">
                        <label for="">Address</label>
                        <textarea class="form-control" name="address" id="address" placeholder="Address"><?= $shop['address'] ?>"</textarea>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6 form-group">
                                <label for="">Latitute</label>
                                <input type="text" class="form-control" value="<?= $shop['lat'] ?>" readonly value="" id="lat" name="lat">
                            </div>
                            <div class="col-md-6 form-group">
                                
                                <label for="">Longtitute</label>
                                <input type="text" class="form-control" value="<?= $shop['lng'] ?>" readonly value="" id="lng" name="lng">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                        <div class="col-md-6 form-group">
                                <label for="">State</label>
                                <input type="text" class="form-control" value="<?= $shop['state'] ?>" readonly value="" id="state" name="state">
                            </div>
                            <div class="col-md-6 form-group">
                                
                                <label for="">Taman</label>
                                <input type="text" class="form-control" value="<?= $shop['taman'] ?>" readonly value="" id="taman" name="taman">
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Google Map url</label>
                        <p style="overflow: auto;"><a target="_blank" id="url" href="<?= $shop['url'] ?>"><?= $shop['url'] ?></a></p>
                        <input type="text" name="url" value="<?= $shop['url'] ?>" class="form-control" readonly id="urlinput">
                    </div>
                    <div id="map">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary float-right" type="submit"> Save</button>
                    </div>
                    
                   
                </form>
            </div>
            
        </div>

        <script>
             function initMap() {
               const map = new google.maps.Map(document.getElementById("map"), {
                 zoom: 14,
                 center: { lat: <?= $shop['lat'] == "" ? "103.3" : $shop['lat']  ?>, lng: <?= $shop['lng'] == "" ? "103.3" : $shop['lng']  ?> },
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
                 center: { lat: <?= $shop['lat'] == "" ? "103.3" : $shop['lat']  ?>, lng: <?= $shop['lng'] == "" ? "103.3" : $shop['lng']  ?> },
   
                    zoom: 15,
                    mapTypeId: "roadmap",
               });
               // let postParam
                     // alert(JSON.stringify(distance) + "km");
              //  $('.distance').text(distance.toFixed(2) + " KM");
               console.log(myLatLng);
              //  let new_position = get_position_from_lat_lng(myLatLng)
               
               new google.maps.Marker({
                position: { lat: <?= $shop['lat'] == "" ? "103.3" : $shop['lat']  ?>, lng: <?= $shop['lng'] == "" ? "103.3" : $shop['lng']  ?> },
                  map,
                  title: "Your location!",
               });
                  // alert(JSON.stringify(position));
               process_map(map);

            }.bind(this),
            function(error) {
                map = new google.maps.Map(document.getElementById("map"), {
                  center: { lat: <?= $shop['lat'] == "" ? "103.3" : $shop['lat']  ?>, lng: <?= $shop['lng'] == "" ? "103.3" : $shop['lng']  ?> },
   
                    zoom: 14,
                    mapTypeId: "roadmap",
                  });
                  
                  new google.maps.Marker({
                    position: { lat: <?= $shop['lat'] == "" ? "103.3" : $shop['lat']  ?>, lng: <?= $shop['lng'] == "" ? "103.3" : $shop['lng']  ?> },
                  map,
                  title: "Your location!",
               });  
                  process_map(map);
               }
         )
             
             
           
           
           
           }
        </script>