<header>
    <div class="row">
        <div class="header-img col-xs-6">
            <a href="/"><img src="{{URL::to('images\if_logo.png')}}" style="margin:-5px -20px -25px 0px; max-width:100%;"></a>
        </div>
        <div class="col-xs-6" style="text-align:right;">
          <div class="dropdown">
            <a href="" id="signoutDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <img style="margin-top:12px; max-width:30%;" class='shadow' src="{{Session::get('google-user')->imageUrl}}"/>
            </a>
            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="signoutDropdown">
              <li style="text-align:center;"><a class="sign-out-link" href="#">Sign Out</a></li>
            </ul>
          </div>
        </div>
    </div>
</header>