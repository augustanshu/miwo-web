<html>
<head>
<title>this is -@yield('title')</title>
</head>
<body>
@section('sidebar')
@show
this is the
<div class="container">
@yield('content')
</div>
</body>
</html>