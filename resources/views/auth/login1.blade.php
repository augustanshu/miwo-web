@extends('app-default')

@section('content')
<div class="wall">
<div id="header" class="logo">
<a href="{{url('/')}}"><img src="{{asset('/image/login/miwologo.png')}}" alt="觅我 进口优品部落"></a>
</div>
</div>
<div class="body">
<div class="login-wrap">
<div class="wall">
<div class="login-form">

<div class="loginbox">
<div class="login-name">
<h1>觅我会员</h1>
</div>
<div class="login-mid">
</div>
<div class="login-content">

<div class="form">
<form id="formlogin" method="post" action="/auth/login">
 {!! csrf_field() !!}
<input type="hidden" id="uuid" name="uuid" value="123">
<input type="hidden" name="machineNet" id="machineNet" value="1" class="hide">
<input type="hidden" name="machineCpu" id="machineCpu" value="1" class="hide">
<input type="hidden" name="machineDisk" id="machineDisk" value="1" class="hide">
<input type="hidden" name="QHXCZOPqgw" value="SaLju">
<div class="item item-fore1">
<label for="loginname" class="login-lable name-login"></label>
<input  type="email" id="loginname" class="itxt" name="email" tabindex="1" autocomplete="off" placeholder="用户名">
</div>

<div  id="entry" class="item item-fore2">
<label class="login-lable pwd-login" for="nloginpwd"></label>
<label id="sloginpwd" style="display:none"></label>
<input type="password" id="nloginpwd" name="password" class="itxt itxt-error" tabindex="2" autocomplete="off" placeholder="密码">
<span class="clear-btn"></span>
</div>

<div class="item item-fore3">
<div class="safe">
<span>
<input id="autologin" name="chkRememberMe" type="checkbox" class="mwcheckbox" tabindex="3">
<label>自动登录</label>
</span>
<span class="forget-pwd"><a class="mw-a-type" href="#">忘记密码</a></span>
</div>
</div>

<div class="item item-fore4">
<div class="loginbtn">
<button type="submit" tabindex="6" id="loginsubmit" class="btn-img">登&nbsp;&nbsp;录</button>
</div>
</div>
</form>
</div>
<div class="coagent">
<h5>使用其他登录方式</h5>
<div class="login-tool">
<a href="#" class="mw-a-type sina-login tool-first"> 微博登录</a>
<span>|</span>
<a href="#" class="mw-a-type weichat-login tool"> 微信登录</a>
</div>
</div>
</div>
</div>

</div>
</div>
<div class="login-banner">
<div class="wall">
<img src="{{asset('/image/login/loginback.png')}}" alt="觅我 进口优品部落"></img>
</div>
</div>
</div>
</div>
@endsection('content')