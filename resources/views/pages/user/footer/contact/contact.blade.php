@extends('layouts.user.application', ['noFrame' => true, 'bodyClasses' => ''])

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
    お問い合わせ
@stop

@section('header')
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
    <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">
        ご意見やご要望はこちらへ。
    </p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <form id="contact-form" name="contact-form" action="{{ route('post.contact.check') }}" method="POST">
                            {{ csrf_field() }}
                             <!-- errors -->
                              @if ($errors->any())
                                  @foreach ($errors->all() as $error)
                                      @include('shared.flash-message', ['error' => $error])
                                  @endforeach
                              @endif
                              @if(isset($success))
                                  @include('shared.flash-message', ['success' => $success])
                              @endif
                            <!--Grid row-->
                            <div class="row">
                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="name" class="">Your name</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="email" class="">Your email</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
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
                                        <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}">
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
                                        <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea">{{ old('message') }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->
                            <div class="text-center text-md-left">
                                <button type="submit" class="btn btn-primary">確認画面へ</button>
                            </div>
                            <div class="status"></div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</section>
<!--Section: Contact v.2-->

@stop
