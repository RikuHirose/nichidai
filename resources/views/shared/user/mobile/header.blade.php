<header id="header" class="Header">
    <!-- <div class="container-fluid"> -->
    <!-- <div class="mobile-header-wrap"> -->
    <div class="container">
        <div class="row" style="padding-left: 15px;padding-right: 15px;">
            <div class="col-xs-2" style="width: 16.6666666667%;">
            </div>
            <div class="col-xs-8 logo-wrap-mobile" style="width: 66.6666666667%;">
                <a href="/" class="logo-block">
                    <span class="logo-title">
                        Eco Hack
                    </span>
                </a>
            </div>
            <!-- <div class="col-md-4 col-xs-2">
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
            </div> -->
            <div class="col-xs-2" style="width: 16.6666666667%;">
                <div id="nav-drawer">
                    <input id="nav-input" type="checkbox" class="nav-unshown">
                    <label id="nav-open" for="nav-input"><span></span></label>
                    <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                    <div id="nav-content">
                        @if(empty($authUser))
                        <div class="container">
                            <a class="" href="{{ action('User\AuthController@getSignUp') }}">
                                <div class="LinkToMyPage">
                                    <span class="authlogsign">
                                        無料会員登録
                                    </span>
                                </div>
                            </a>
                            <a href="{{ action('User\AuthController@getSignIn') }}">
                                <div class="LinkToMyPage">
                                    <span class="authlogsign">
                                        ログイン
                                    </span>
                                </div>
                            </a>
                        </div>
                        @endif

                        @if(!empty($authUser))
                            <div class="container">
                                <a href="{{ route('user.show', $authUser['id']) }}">
                                    <div class="LinkToMyPage">
                                        <span class="authlogsign">
                                            <img src="{{ asset('/static/user/images/user.png') }}" class="avatar rounded-circle img-circle img-thumbnail">マイページへ
                                        </span>
                                    </div>
                                </a>
                                <a href="{{ route('user.setting.get', $authUser['id']) }}">
                                    <div class="LinkToMyPage">
                                        <span class="authlogsign">
                                            プロフィール編集
                                        </span>
                                    </div>
                                </a>
                                <a class="" href="{{ action('User\AuthController@postSignOut') }}">
                                    <div class="LinkToMyPage">
                                        <span class="authlogsign">
                                            ログアウト
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>
<div style="height: 60px;"></div>
