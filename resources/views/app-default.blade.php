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
	@yield('content')
	<div class="wall" id="footer">
	<div class="links">
	<a href="#">关于我们</a>
	|
	<a href="#">联系我们</a>
	|
	<a href="#">人才招聘</a>
	|
	<a href="#">销售联盟</a>
	|
	<a href="#">广告服务</a>
	|
	<a href="#">觅我部落</a>
	|
	<a href="#">服务条款</a>
	
	</div>
	<div class="copyright">
            Copyright©2015-2016  觅我miwo-life.com 版权所有        
	</div>
	</div>
	<!-- Scripts -->
	<script src="http://cdn.bootcss.com/jquery/2.1.3/jquery.min.js"></script>
	<script src="http://cdn.bootcss.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>