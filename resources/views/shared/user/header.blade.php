<header class="Header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-4 col-xs-2 pull-left">
            <a href="/">top</a>
        </div>
        <div class="col-md-4 col-xs-8"></div>
        <div class="col-md-4 col-xs-2">
            <nav class="pull-right">
                @if(!empty($authUser))
                    <a href="{{ route('user.show', $authUser['id']) }}">マイページ</a>
                @endif
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
                                <li><a href="{{ route('user.setting.get', $authUser['id']) }}">Setting</a></li>
                                <li><a href="{{ action('User\AuthController@postSignOut') }}">Sign Out</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    </div>
</header>
