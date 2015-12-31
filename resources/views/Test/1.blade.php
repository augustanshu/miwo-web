@extends('Test.app')
@section('title','myweb')
@section('sidebar')
@parent
<p>append{{!!trans('auth.failed')!!}}</p>
@endsection
@section('content')
<p>this is my content</p>
<?php  echo $goodsclass ?>
@endsection
<p>my name:{{$name or 'default'}}<p>