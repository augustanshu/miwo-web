@extends('Test.app')
@section('title','myweb')
@section('sidebar')
@parent
<p>append</p>
@endsection
@section('content')
<p>this is my content</p>
@endsection
<p>my name:{{$name or 'default'}}<p>