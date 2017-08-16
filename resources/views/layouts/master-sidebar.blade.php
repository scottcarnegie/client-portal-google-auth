<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name='google-signin-client_id' content="{{env('GOOGLE_CLIENT_ID')}}.apps.googleusercontent.com">

        <title>Innovative Fitness Clients</title>
        
        <!-- STYLESHEETS-->
        <link rel="stylesheet" href="{{URL::to('css/main.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('css/bootstrap-datepicker-built.css')}}">

        
        <!-- SCRIPTS -->
        <script src="{{URL::to('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('js/bootstrap-datepicker-built.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('js/main.js')}}" type="text/javascript"></script>
        <script src="{{URL::to('js/responsive.js')}}" type="text/javascript"></script>

        @yield('styles')
    </head>
    <body>

        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <div class="container">

            @include('../includes/header')
            <hr>

            <div class="row">
                <div class="col-xs-1 sidebar-container">
                    @include('../includes/sidebar')
                </div>
                <div class="col-xs-11">
                    <div class="main-sidebar">
                        @yield('content')
                    </div> 
                </div>
            </div>
        </div>
        
        <div class="g-signin2" data-onsuccess="onSignIn" hidden></div>

    </body>

    <script type="text/javascript">
        $(document).ready(function(){   
            $(".sign-out-link").click(function(){
                signOut();
            });
        });

        function signOut() {
          var auth2 = gapi.auth2.getAuthInstance();
          auth2.signOut().then(function () {
            console.log('User signed out.');
            window.location.href = "/signoutuser";
          });
      }

      // Re-initialize Google User

      var auth2;
      var initClient = function() {
          gapi.load('auth2', function(){
              auth2 = gapi.auth2.init({
                  client_id: "{{env('GOOGLE_CLIENT_ID')}}.apps.googleusercontent.com"
              });
              auth2.attachClickHandler('signin-button', {}, onSuccess, onFailure);
          });
      };

      var onSuccess = function(user) {
          console.log('Signed in as ' + user.getBasicProfile().getName());
      };

      var onFailure = function(error) {
          console.log(error);
      };

    </script>
</html>