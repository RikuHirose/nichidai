<header class="Header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-4 col-xs-2 pull-left"></div>
        <div class="col-md-4 col-xs-8"></div>
        <div class="col-md-4 col-xs-2">
            <nav class="pull-right">
                <!-- <div class="dropdown notice-nav open" id="markasread">
                    <div class=" " type="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-bell  bellpos"></i>
                                                    </div>
                    <ul class="dropdown-menu dpd-menu" aria-labelledby="dropdownMenu1">
                        @if( empty($authUser) )
                            <li><a href="{{ action('User\AuthController@getSignIn') }}">Sign In</a></li>
                            <li><a href="{{ action('User\AuthController@getSignUp') }}">Sign Up</a></li>
                        @else
                            <li><a href="{{ action('User\AuthController@getSignIn') }}">Setting</a></li>
                            <li><a href="{{ action('User\AuthController@getSignUp') }}">Sign Out</a></li>
                        @endif
                    </ul>
                </div> -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown button
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <ul class="">
                            @if( empty($authUser) )
                                <li><a href="{{ action('User\AuthController@getSignIn') }}">Sign In</a></li>
                                <li><a href="{{ action('User\AuthController@getSignUp') }}">Sign Up</a></li>
                            @else
                                <li><a href="{{ action('User\AuthController@getSignIn') }}">Setting</a></li>
                                <li><a href="{{ action('User\AuthController@getSignUp') }}">Sign Out</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    </div>
</header>
