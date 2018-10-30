@extends('layouts.user.application', ['noFrame' => true, 'bodyClasses' => ''])

@section('metadata')
<meta name="description" content="利用規約です。">
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    利用規約
@stop

@section('header')
@stop

@section('content')

    <div class="p-auth-box">
        <h4 class="p-auth-box__header">利用規約</h4>
        <div class="card auth-container">

            <div class="card-body">
                <div class="container">
                    <h2 class="">利用規約</h2>

                    <h3 class="">第1条　（保証の否認）</h3>
                    <p class="">本サイトを運営する{{ config('site.name') }}チーム（以下「当チーム」という）は、本サイトを利用するすべてのお客様(以下「ユーザー」という)に本サイトにおいて提供される各サービス、及び記事の内容等の正確性に対する保証行為を一切しておりません。また、当チームは、ユーザーが各サービスを利用したことに起因する直接的又は間接的な損害に関して一切責任を負わないものとします。 当チームは、本サイト内のすべての情報、記事、画像等に、ウイルスなどの有害物が含まれていないこと、および第三者からの不正なアクセスのないこと、その他本サイトの安全性に関して一切の保証をしないものとします。</p>

                    <h3 class="">第2条　（アカウント登録・管理・削除）</h3>
                    <p class="">本サイトにおける会員サービスを利用するには、本利用規約の内容に同意し、本サイトを利用するご本人が本サイトのアカウント登録を申請し、アカウントの登録を受けてこれを維持する必要があります。また、アカウント登録を申請した者が以下の各号のいずれかに該当する場合、当チームはアカウントの削除、利用停止等を行えるものとします。その場合のお問い合わせ、苦情等は一切受け付けないものとします。<br>また、ユーザーは、当チーム所定の方法により、ご自由にいつでもアカウントを削除し本サービスの利用をやめることができます。 <br>また、以下の場合によって、当チームは事前通知なしに該当ユーザーのアカウントの削除、利用停止が行われます <br><br>・アカウント登録に際し、当チームに提供された情報に全部または一部につき虚偽、誤記、不足等がある場合、第三者にひどく不快感を与える内容があった場合 <br>・過去に本利用規約に違反したことがある場合 <br>・本利用規約に違反したと当チームが判断した場合 <br>・利用規約　第4条（禁止事項）にあたる行為 <br>・反社会的勢力等（暴力団関係者、社会運動等標榜ゴロ、特殊知能暴力集団、反社会的勢力、その他これに準ずる団体、個人をいいます。）であると当チームが判断した場合、または資金提供等を通じて反社会的勢力等の維持、運営または経営に協力または関与する等反社会的勢力等と何らかの交流・関与を行っていると当チームが判断した場合 <br>・当チームが扱う特定の個人（職員、学生など）及び団体（大学、サークル）に対する悪質な誹謗・中傷が見られた場合 <br>・その他当チームが不適切と判断したものがあった場合 </p>

                    <h3 class="">第3条　（サービスの一時的な停止）</h3>
                    <p class="">ユーザーは、アカウント登録時に申請した情報に変更がある場合には常に最新の情報となるよう修正しなければならないものとし、本サイトの利用に際して登録したIDおよびパスワード等を不正に利用されないようご自身の責任で厳重に管理しなければなりません。ユーザーは、パスワード等が第三者に使用されたり盗まれたりしていることが判明した場合には、直ちにその旨を当チームに通知するとともに、当チームからの指示に従うものとします。当チームは、登録されたパスワード等を利用して行なわれた一切の行為を、ユーザーご本人の行為とみなすことができるものとします。<br><br>また、各サービスにおいて、ユーザーへの事前告知に努めますが、以下の場合に限り、予告なしにサービスを一時的に停止することがございます。 <br><br>・各サービスの稼動状態を良好に保つため、当チームのシステム保守、点検、修理などを行う場合 <br>・火災、停電による各サービスの提供ができなくなった場合 <br>・天変地異などにより、各サービスの提供ができなくなった場合 <br>・その他、運用上または技術上、各サービス提供の一時的な停止を必要とした場合 </p>

                    <h3 class="">第3条　（サービスの恒久的な停止）</h3><p class="">当チームの提供するサービスは、ユーザーへの事前告知に努めますが、予告なしにサービスを恒久的に停止することがございます。<br>サービスの提供を終了した時点のユーザーの個人情報やユーザーの提供した情報は完全に抹消し、復元できないものとします。これに伴う保証は一切いたしません。 </p>

                    <h3 class="">第4条　（禁止事項）</h3>
                    <p class="">当チームは、ユーザーが以下の行為を行うことを禁じます。<br><br>・当チームが扱う個人（大学職員、学生）及び団体（大学、サークル）に対する悪質な誹謗中傷に値する行為 <br>・当チームまたは第三者に損害を与える行為、または損害を与える恐れのある行為 <br>・当チームまたは第三者の財産、名誉、プライバシー等を侵害する行為、または侵害する恐れのある行為 <br>・公序良俗に反する行為、またはその恐れのある行為 <br>・他人のメールアドレスを登録するなど、虚偽の申告、届出を行う行為 <br>・コンピュータウィルス等有害なプログラムを使用または提供する行為 <br>・その他、法令に違反する行為、またはその恐れがある行為 <br>・その他当チームが不適切と判断する行為 <br><br>上記に違反した場合、当チームはユーザーに対し損害賠償請求をすることができることにユーザーは同意します。 </p>

                    <h3 class="">第5条　（ユーザーの行為）</h3><p class="">ユーザーが扱う情報等はユーザーが責任を負うものとします。<br>当チームは、本サイトをユーザーにインターネットを経由して提供します。インターネットに接続するためのあらゆる機器、通信手段、ソフトウェア等は、ユーザーが自らの責任と費用において、適切に設置及び操作しなければなりません。　同操作等について当チームは一切の責任を負いません。 <br>ユーザーは、自身のインターネット接続環境等によって、本サイトを利用又は閲覧するために通信費等が別途必要となることに同意し、同通信費等の一切を同ユーザーが負担するものとします。 <br>ユーザーは、自身のインターネット接続環境等によって、本サイトの一部を閲覧又は利用できない可能性があることを予め了承するものとします。 </p>

                    <h3 class="">第6条　（本規約の変更）</h3><p class="">当チームは、当チームの都合により、本規約の内容を必要に応じ予告なくして改定することができ、ユーザーは、本サイトを利用する際、その都度、本規約の内容を確認するものとします。 改定後にユーザーが各サービスを利用した場合には、改定に同意したものとみなします。 なお、本ページを確認しなかったことに起因する直接または間接に生じたユーザー及び第三者に与える損害については、その内容、態様の如何に係わらず、当チームは一切の責任を負いません。</p>

                    <h3 class="">第7条　（大学・大学職員に対する誹謗中傷の基準）</h3><p class="">大学または大学職員に対して以下のような点に基づき、誹謗中傷が見られる投稿を行ったユーザーは速やかに削除させていただきます。<br>・推測によって語られているもの <br>・反社会的表現が使用されているもの <br>・プライバシーを侵害しているもの <br>・政治的、または、宗教的、人種的、民族的等特定のコミュニティーに対する誹謗中傷が表現されているもの </p>

                    <h3 class="">第8条　（個人情報の扱いについて）</h3>
                    <p class="">本サイトにおける個人情報の取り扱いについては、別途定めるプライバシーポリシーによるものとします。</p>

                    <h3 class="">第9条（準拠法および管轄裁判所）</h3>
                    <p class="">本利用規約は、日本法に準拠し解釈されるものとします。<br>ユーザーと当チームとの間で訴訟の必要が生じた場合、東京地方裁判所を第一審の専属的合意管轄裁判所とします。 </p><p class="">平成29年10月29日　制定</p>
                </div>
            </div>
        </div>

    </div>

@stop
