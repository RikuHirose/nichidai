@extends('layouts.user.application', ['noFrame' => true, 'bodyClasses' => ''])

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    Setting
@stop

@section('header')
    Setting
@stop

@section('content')

 <!-- errors -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        @include('shared.flash-message', ['error' => $error, 'success' => $success])
    @endforeach
@endif
@if(isset($success))
    @include('shared.flash-message', ['success' => $success])
@endif


<!--Section: Contact v.2-->
<section class="section">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-5">確認フォーム</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        matter of hours to help you.</p>

    <div class="row">
        <!--Grid column-->
        <div class="col-md-12">
                <!--Grid row-->
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="">Your name</label>
                                <p class="border-bottom border-secondary">{{ $request->name }}</p>
                            </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="">Your email</label>
                                <p class="border-bottom border-secondary">{{ $request->email }}</p>
                            </div>
                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="">Subject</label>
                                <p class="border-bottom border-secondary">{{ $request->subject }}</p>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-12">

                            <div class="md-form">
                                <label for="message">Your message</label>
                                <p class="border-bottom border-secondary md-textarea" rows="3">{{ $request->message }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <form id="contact-form" name="contact-form" action="{{ route('post.contact.submit') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="text-left">

                                <!--Grid row-->
                                <div class="text-center text-md-left">
                                    <button type="submit" name="action" value="back" class="btn btn-default">戻る</button>
                                </div>
                                <div class="status"></div>
                        </div>

                        <div class="text-right">
                                <input type="hidden" name="name"    value="{{ $request->name }}">
                                <input type="hidden" name="email"   value="{{ $request->email }}">
                                <input type="hidden" name="subject" value="{{ $request->subject }}">
                                <input type="hidden" name="message" value="{{ $request->message }}">
                                <!--Grid row-->
                                <div class="text-center text-md-left">
                                    <button type="submit" name="action" value="post" class="btn btn-primary">送信</button>
                                </div>
                                <div class="status"></div>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->

@stop
