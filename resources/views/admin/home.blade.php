@extends('app')
@section('content')
<div class="panel-body container-fluid header">
<div class="logo">
<a class="logo-img">
 <img src="{{url('image/miwologo.jpg')}}">
 </img></a>
</div>
<div class="searchbox">
<div class="form">
<input type="text" class="text" id="key">
<button class="button search">
<i></i>搜索
</button>
</div>
</div>
<div class="hotword">
 <a  class="mw-a-type" href="/home"  target="_blank">可可粉</a>
 <a class="mw-a-type" href="#" target="_blank">大米</a>
 <a class="mw-a-type" href="#" target="_blank">面条</a>
 <a class="mw-a-type"  href="#" target="_blank">黄油</a>
 <a class="mw-a-type"  href="#" target="_blank">食用油</a>
 <a class="mw-a-type"  href="#" target="_blank">鱿鱼干</a>
</div>
</div>
<div class="container-fluid" style=" height:1500px; background-color:#ddd">

</div>
@endsection