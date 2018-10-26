<header id="header" class="Header">
    <!-- <div class="container-fluid"> -->
    <div class="mobile-header-wrap">
        <div class="row">
            <div class="col-md-4 col-xs-2 pull-left">
                <a href="/">top</a>
            </div>
            <div class="col-md-4 col-xs-8"></div>
            <div class="col-md-4 col-xs-2">
                <nav class="pull-right">
                    @if(empty($authUser))
                        <a href="{{ action('User\AuthController@getSignIn') }}" class="auth-link">ログイン</a>
                        <a href="{{ action('User\AuthController@getSignUp') }}" class="auth-link">会員登録</a>
                    @endif

                    @if(!empty($authUser))
                        <div id="dropdown" class="dropdown m-header-navi">
                            <div class="dropdown-toggle " type="" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ asset('/static/user/images/user.png') }}" class="avatar">
                            </div>
                            <ul class="dropdown-menu nav-lists dbmenu" aria-labelledby="dropdownMenu1">
                                <li><a href="{{ route('user.show', $authUser['id']) }}">マイページ</a></li>
                                <li><a href="{{ route('user.setting.get', $authUser['id']) }}">Setting</a></li>
                                <li>
                                    <a class="" href="{{ action('User\AuthController@postSignOut') }}">
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</header>
