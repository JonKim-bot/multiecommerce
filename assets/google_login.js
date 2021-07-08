
function renderButton() {
    gapi.signin2.render('gSignIn2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
}

// Sign-in success callback
function onSuccess(googleUser) {
    // Get the Google profile data (basic)
    //var profile = googleUser.getBasicProfile();
    
    // Retrieve the Google account data
    gapi.client.load('oauth2', 'v2', function () {
        var request = gapi.client.oauth2.userinfo.get({
            'userId': 'me'
        });
        request.execute(function (resp) {
            console.log("resp" + JSON.stringify(resp))

        var base_url = $('#base_url').val();
        var is_home = $('#is_home').val();

        url = base_url + "/home/login_by_google";
			$.ajax({
			type: "POST",
			dataType: "json",
			url: url,
			data: {response : resp},
			success: function (data) {
                Swal.fire({
                    title: "Login in",
                    text: "Welcome " + data.name,
                    type: 'success'
                })   
				if(data.status){
                    if(is_home != ""){
                        location.href= base_url + "/main/index/" + is_home;

                    }else{
                        
                        location.href= base_url + "/home/index";
                    }
				}
				// alert(JSON.stringify(data))
			},
            error : function(jqXHR, textStatus, errorThrown){
                // alert(jqXHR.status);
                console.log("ERROR" + JSON.stringify(jqXHR))

            }
		});
      
       
        });
    });
    
}


// Sign-in failure callback
function onFailure(error) {
    alert(error);
}

// Sign out the user
function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
     //   window.location="adminLogin.php";
    });
    
    auth2.disconnect();
}