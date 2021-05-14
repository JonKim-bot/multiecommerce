                        </div>
                    </div>
                </main>
            </div>
            <footer class="c-footer">
                <div><a href="#">DEV.</a> &copy; 2020 Creative Labs.</div>
                <!-- <div class="ml-auto">Powered by&nbsp;<a href="#">wynndarrien</a></div> -->
            </footer>
        </div>
       
       
<!-- include summernote css/js -->

        <script src="<?=base_url()?>/assets/js/core/bundle.js"></script>
       
        <script src="<?=base_url()?>/assets/js/core/icons.js"></script>
        
        <!-- <script src="<?=base_url()?>assets/plugins/chartjs/js/chartjs.js"></script> -->
        <script src="<?=base_url()?>/assets/js/core/utils.js"></script>
        

        <!-- <script src="<?=base_url()?>/assets/js/core/main.js"></script> -->

        <script src="<?=base_url()?>/assets/js/core/permission.js"></script>


        <script src="<?=base_url()?>/assets/js/core/custom.js"></script>
        <script src="<?= base_url() ?>/assets/js/core/customTable.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

        <!-- Flatpickr -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        
        <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script> -->

        <!-- <script src="<?=base_url()?>/assets/plugins/datatable/js/jquery.dataTables.js"></script> -->
        <!-- <script src="<?=base_url()?>/assets/plugins/datatable/js/dataTables.bootstrap4.min.js"></script> -->
    </body>
</html>




<script>
 var firebaseConfig = {
        apiKey: "AIzaSyBfcy3lzRMXrZl-EPwE7EpF-LCORxl2vcY",
        authDomain: "emenu-b486e.firebaseapp.com",
        projectId: "emenu-b486e",
        storageBucket: "emenu-b486e.appspot.com",
        messagingSenderId: "646319887179",
        appId: "1:646319887179:web:ec2ee0ae02ed7e91f18ece",
        measurementId: "G-RJ543W8VW1"

    };
    
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");
                return messaging.getToken();
            })
            .then(function (token) {
                let device = "";
                if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)){
                // true for mobile device
                    device = "Mobile";
                }else{
                // false for not mobile device
                    device = "Computer";
                }
                let post_data  = {
                    token : token,
                    device : device,
                };
                $.ajax({
                    url: "<?= base_url() ?>/Ajax/register_token",
                    method:"POST",
                    data:post_data,
                    dataType: "json",

                    success:function(data)
                    {
                        // alert(JSON.stringify(data))
                        if(data.status){

                            alert("token subcribed");
                        }else{
                            console.log("token existed");
                        }
                    }
                    
                });
                console.log("Token : "+token);
                // document.getElementById("token").value=token;
            })
            .catch(function (reason) {
                var is_cancel = localStorage.getItem("cancel");
                if(is_cancel == null && reason == "FirebaseError: Messaging: The notification permission was not granted and blocked instead. (messaging/permission-blocked)."){

                    var r = confirm("Please allow notification for this website , so that you can receive notification on your orders.\n\nClick the ok button to view toturial on how to activate your notification.");
                    if (r == true) {
                        location.href = ('https://drive.google.com/file/d/1NFMrEAv8lhLUYgXaxswuSDZOAETUJBMD/view?usp=sharing');
                    }else{
                        localStorage.setItem("cancel", true);


                    }
                }

                // alert("Please allow notification for this website , so that you can receive notification on your orders");
                console.log(reason + " is reason");
            });

    }


    <?php 

    if(isset($_SESSION['shop_data']) && $_SESSION['shop_data']['url'] == ""){ ?>


        Swal.fire({
            title: "Address Incomplete",
            text: "Please go to this link to add your address",
            type: 'warning',
            confirmButtonText: '<a href=" <?= base_url() ?>/shop/edit/<?= $_SESSION['shop_data']['shop_id'] ?>">Go Add</a>',
            showCancelButton: true,
        })

    <?php } ?>

    function Sound(source, volume, loop)
    {
        this.source = source;
        this.volume = volume;
        this.loop = loop;
        var son;
        this.son = son;
        this.finish = false;
        this.stop = function()
        {
            document.body.removeChild(this.son);
        }
        this.start = function()
        {
            if (this.finish) return false;
            this.son = document.createElement("embed");
            this.son.setAttribute("src", this.source);
            this.son.setAttribute("hidden", "true");
            this.son.setAttribute("volume", this.volume);
            this.son.setAttribute("autostart", "true");
            this.son.setAttribute("loop", this.loop);
            document.body.appendChild(this.son);
        }
        this.remove = function()
        {
            document.body.removeChild(this.son);
            this.finish = true;
        }
        this.init = function(volume, loop)
        {
            this.finish = false;
            this.volume = volume;
            this.loop = loop;
        }
    }
  

    // var audio = document.createElement("AUDIO")
    // document.body.appendChild(audio);
    // audio.src = "4.mp3";
    messaging.onMessage(function (payload) {

        document.getElementById('notification').muted = false;
        document.getElementById('notification').play();
        // new Audio("<?= base_url() ?>assets/emenu/4.mp3").play();
        // var song =new Sound("https://piegensoftware.com/restaurant/FirebaseWebPushNotification/4.mp3",100,true);
        // console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        Swal.fire({
            title: payload.notification.title,
            text: "Your have a new order",
            type: 'success'
        })
        // song.start();

        // alert("Receive Notification !");
        // song.stop();

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
            })
    })
    IntitalizeFireBaseMessaging();
    // $('.dataTable').customTable();

    var dataTable = $('.datatable').DataTable(
    //     {
    //     select: true, dom: 'Blfrtip', 
    //                     dom: 'Bfrtip', 
    //                     buttons: [ { extend: 'pdf', text: ' Export a PDF'},
    //                     { extend: 'excel', text: ' Export a EXCEL'
                        
                        
    //                         }, 
    //                     { extend: 'print', text: ' Print ' }, 


    //                     'pageLength' ], 
                        

    // }
    );
    $(document).ready(function(){

        $("#searchShop").on("keyup", function() {
            var value = $(this).val().toLowerCase();
           
            $('.dish-wrap').each(function() {
                var _this = $(this);
                console.log(_this);
                var title = _this.find('a').text().toLowerCase();

                /* 
                    title and filter are normalized in lowerCase letters
                    for a case insensitive search
                */
                if (title.indexOf(value) < 0) {
                    _this.hide();
                }
            });
        });

    });
    $('select').select2();
    var date_config = {
        altInput: true,
        altFormat: "d/m/Y",
        allowInput: false,
    };
    $(".datepicker").flatpickr(date_config);
    $(document).ready(function() {
        tinymce.init({
        selector: '.textarea',
        toolbar_mode: 'floating',
        plugins: 'link',
         link_assume_external_targets: true
        });
    });

    $(".minimize-card").on('click', function() {
        var $this = $(this);
        var port = $($this.parents('.card'));
        var card = $(port).children('.card-body').slideToggle();
        var card = $(port).children('.c-card-body').slideToggle();
        $(this).toggleClass("cil-arrow-circle-bottom").fadeIn('slow');
        $(this).toggleClass("cil-arrow-circle-top").fadeIn('slow');
    });
    
    //selected only one image

    // $('.custom-file-input').on('change',function(){
    //     //get the file name
    //     var fileName = $(this).val().split("\\").pop(); 		
    //     //replace the "Choose a file" label
    //     $(this).next('.custom-file-label').html(fileName);
    // });
    
    $(document).on("click", ".delete-button", function (e) {
        e.preventDefault();

        var delete_record = confirm("Are you sure you want to delete this record?");
        var path = $(this).attr("href");

        if (delete_record === true) {
            window.location.replace(path);
        }
    });
        
</script>



<script>
    //preview image before upload (single image)
    
    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
            
    //         reader.onload = function(e) {
    //         $('#blah').attr('src', e.target.result);
    //         }
            
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

    // $("#thumbnail").change(function() {
    //     readURL(this);
    // });
</script>

<script>

    //if you want to display name by name

    // $('.custom-file-input').change(function (e) {
    //     var files = [];
    //     for (var i = 0; i < $(this)[0].files.length; i++) {
    //         files.push($(this)[0].files[i].name);
    //     }
    //     $(this).next('.custom-file-label').html(files.join(', '));
    // });


    $('.custom-file input').change(function() {
        files = $(this)[0].files,
        label = files[0].name;
        if (files.length > 1) {
            label = String(files.length) + " files selected"
        }
        $(this).next('.custom-file-label').html(label);
    });

    


</script>


