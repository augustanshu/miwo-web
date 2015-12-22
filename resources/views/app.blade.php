<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon"  href="{{asset('/image/icon/favicon.ico')}}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>觅我【MiWo】优品部落</title>
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/default.css') }}" rel="stylesheet">

	<!-- Fonts -->
	

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
			<ul class="nav navbar-nav">
			<li><div class="navbar-hd"><a href="{{ url('/') }}">觅我首页</a></div></li>
			@if(Auth::guest())
            <li><div class="navbar-hd"><a class="q" href="{{ url('/auth/login') }}">亲，请登录</a></div></li>
			<li><div class="navbar-hd"><a href="{{ url('/auth/register') }}">免费注册</a></div></li>	
			@else
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
				<li><a href="{{ url('/auth/logout') }}">退出</a></li>
				</ul>
			    </li>
			<li><a href={{url('/information/person')}}>我的信息</a></li>
			@endif
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><div class="navbar-hd"><a href={{url('/person')}}>我的购物车</a></div></li>
			<li class="navbar-pipe">|</li>
			<li><div class="navbar-hd"><a href={{url('/person')}}>我的收藏</a></div></li>
			<li class="navbar-pipe">|</li>
			<li><div class="navbar-hd"><a href={{url('/person')}}>个人中心</a></div></li>
			<li class="navbar-pipe">|</li>
			<li><div class="navbar-hd"><a href={{url('/person')}}>帮助</a></div></li>
			</ul>
 			</div>
		</div>
	</nav>
	@yield('content')
	<!-- Scripts -->
	<script src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>