@extends('layouts.user.application', ['noFrame' => true, 'bodyClasses' => ''])

@section('metadata')
<meta name="description" content="プライバシーポリシーです。">
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    プライバシーポリシー
@stop

@section('header')
@stop

@section('content')

    <div class="p-auth-box">
        <h4 class="p-auth-box__header">プライバシーポリシー</h4>
        <div class="card auth-container">

            <div class="card-body">
                <div class="container">
                    <h2 class="”hh">個人情報保護方針</h2>
                    「<a href="{{ config('site.url') }}">{{ config('site.name') }}</a>」（以下、当サイト）を利用される方は、以下に記載する諸条件に同意したものとみなします。
                    <h3 class="”hh">個人情報の取得について</h3>
                    利用者は匿名のままで、当サイトを自由に閲覧する事ができます。

                    お問合せ等、場合によっては、利用者の氏名やメールアドレスなどの個人情報の開示をお願いする事があります。

                    しかし、利用者の個人情報を利用者の許可なく、当サイトから第三者へ開示・共有する事はありません。
                    <h3 class="”hh">広告の配信について</h3>
                    当サイトはGoogle及びGoogleのパートナーウェブサイト（第三者配信事業者）の提供する広告を設置しております。

                    その広告配信にはCookieを使用し、当サイトを含めた過去のアクセス情報に基づいて広告を配信します。

                    DoubleClick Cookie を使用することにより、GoogleやGoogleのパートナーは当サイトや他のサイトへのアクセス情報に基づいて、適切な広告を当サイト上でお客様に表示できます。

                    お客様は<a href="”https://www.google.com/settings/u/0/ads/authenticated?hl=ja”" target="”_blank”" rel="”noopener”">Googleアカウントの広告設定ページ</a>で、パーソナライズ広告の掲載に使用される DoubleClick Cookie を無効にできます。

                    また <a href="”http://optout.aboutads.info/#!/”" target="”_blank”" rel="”noopener”">www.aboutads.info</a> にアクセスして頂き、パーソナライズ広告の掲載に使用される第三者配信事業者のCookieを無効にできます。

                    その他、Googleの広告における、Cookieの取り扱いについての詳細は、<a href="”https://www.google.co.jp/policies/technologies/ads/”" target="”_blank”" rel="”noopener”">Googleのポリシーと規約ページ</a>をご覧ください。
                    <h3 class="”hh">ウェブサーバの記録</h3>
                    当サイトのウェブサーバは、利用者のコンピュータのIPアドレスを自動的に収集・記録しますが、これらは利用者個人を特定するものではありません。利用者が自ら個人情報を開示しない限り、利用者は匿名のままで、当サイトを自由に閲覧する事ができます。
                    <h3 class="”hh">免責事項</h3>
                    利用者は、当サイトを閲覧し、その内容を参照した事によって何かしらの損害を被った場合でも、当サイト管理者は責任を負いません。

                    また、当サイトからリンクされた、当サイト以外のウェブサイトの内容やサービスに関して、当サイトの個人情報の保護についての諸条件は適用されません。

                    当サイト以外のウェブサイトの内容及び、個人情報の保護に関しても、当サイト管理者は責任を負いません。
                </div>
            </div>
        </div>

    </div>

@stop
