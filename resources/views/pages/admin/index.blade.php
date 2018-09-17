

@extends('layouts.admin.application',['menu' => 'dashboard'] )

@section('metadata')
@stop

@section('styles')
@stop

@section('scripts')
@stop

@section('title')
  {{ config('site.name') }} | Admin | Dashboard
@stop

@section('header')
  Dashboard
@stop

@section('content')
  <div>
    <h3>Hi, Welcome to Our Dash Board!</h3>
  </div>
@stop
