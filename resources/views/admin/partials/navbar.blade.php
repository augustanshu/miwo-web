<ul class="nav navbar-nav">
    <li><a href="/">主页</a></li>
    @if (Auth::check())
        <li @if (Request::is('admin/post')) class="active" @endif>
            <a href="/admin/post">控制台</a>
        </li>
        <li @if (Request::is('admin/set')) class="active" @endif>
            <a href="/admin/set">设置</a>
        </li>
        <li @if (Request::is('admin/products')) class="active" @endif>
            <a href="/admin/products">商品</a>
        </li>
		<li @if (Request::is('admin/users')) class="active" @endif>
            <a href="/admin/users">会员</a>
        </li>
		<li @if (Request::is('admin/business')) class="active" @endif>
            <a href="/admin/business">交易</a>
        </li>
    @endif
</ul>

<ul class="nav navbar-nav navbar-right">
    @if (Auth::guest())
        <li><a href="/auth/login">登录</a></li>
    @else
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" 
                    aria-expanded="false">
                {{ Auth::user()->name }}
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="/auth/logout">Logout</a></li>
            </ul>
        </li>
    @endif
</ul>