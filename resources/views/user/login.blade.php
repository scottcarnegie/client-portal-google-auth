<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign In</title>
        
        <!-- META -->
        <meta name='google-signin-client_id' content="{{env('GOOGLE_CLIENT_ID')}}.apps.googleusercontent.com">

        <!-- STYLESHEETS-->
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">

        
        <!-- SCRIPTS -->
        <script src="{{URL::to('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('js/bootstrap.min.js')}}" type="text/javascript"></script>

    </head>
    <body>
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <div class="container">

            <div class="row">
                <div class="col-xs-12" style="width:100%; text-align:center;">
                    <div style="padding-top:10%">
                        <img src="../images/if_logo.png"/>
                    </div>
                </div>
                <div class="col-xs-12" style="width:100%; text-align:center; padding-top:5%;">
                    <h1>Client Management Portal</h1>
                </div>
                <div class="col-xs-12" style="width:100%; text-align:center; padding-top:15%">
                    <div id="sign-in-btn" data-onsuccess="onSignIn"></div>
                </div>
            </div>

        </div>
        
        <script type="text/javascript">

            var user = {
                'id':'',
                'name':'',
                'imageUrl':'',
                'email':'',
                'token':''
            }

            function onSignIn(googleUser) {

                var profile = googleUser.getBasicProfile();
                user.name = profile.getName();
                user.imageUrl = profile.getImageUrl();
                user.email = profile.getEmail(); // This is null if the 'email' scope is not present.
                user.token = googleUser.getAuthResponse().id_token;

                // POST Client Creation
                
                $.ajax({
                    type:"POST",
                    url:"{{route('create-user-session')}}",
                    data: {
                        name: user.name,
                        imageUrl: user.imageUrl,
                        email: user.email,
                        userToken: user.token,
                        _token:"{{Session::token()}}"
                    },
                    success: function(data){
                        console.log("Sign-in successful.");
                        window.location.href = "/";
                    }
                });

            }

            function renderButton() {
                gapi.signin2.render('sign-in-btn', {
                    'scope': 'profile email',
                    'width': 240,
                    'height': 50,
                    'longtitle': true,
                    'theme': 'dark',
                    'onsuccess': onSignIn,
                    'onfailure': onFailure
                });
            }

            function onFailure(error) {
                console.log(error);
            }

        </script>

        <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

    </body>
</html>