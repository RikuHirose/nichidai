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
    <h2 class="h1-responsive font-weight-bold text-center my-5">送信完了</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">
        Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        matter of hours to help you.
    </p>


</section>
<!--Section: Contact v.2-->

@stop
