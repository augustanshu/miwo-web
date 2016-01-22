@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('goods.category.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('goods.category.names') !!}</small>
@stop
@section('title')
{!! trans('goods.category.names') !!}
@stop
@section('breadcrumb')
<ol class="breadcrumb">
    <li>
	<a href="{!! URL::to('admin') !!}">
	<i class="fa fa-dashboard"></i> 
	{!! trans('cms.home') !!} </a>
	</li>
    <li class="active">
	{!! trans('goods.category.names') !!}
	</li>
</ol>
@stop

@section('entry')

@stop

@section('tools')
@stop

@section('content')
<div style="min-height:700px;">
<div  class="col-md-5">
 <div class="box box-warning tab-content">
  <div class="tab-pane active" id="details">
{!!Category::category(0,'edit')!!}
</div>
</div>
</div>
<div class="col-md-7">
<div class="box box-warning" id='category-entry'>
</div>
</div>
@stop
@section('script')
<script type="text/javascript">
$(document).ready(function(){
$('#category-entry').load('{{URL::to('admin/goods/category/0')}}');
var defaults = {
    speed: 200,
    showDelay: 0,
    hideDelay: 0,
    singleOpen: true,
    clickEffect: true,
    indicator: 'submenu-indicator-minus',
    subMenu: 'submenu',
    event: 'click touchstart' // click, touchstart
  };
	$(".menu").children("ul").find("li").bind("click",function(){
		var $subMenus = $(this).children("." + defaults.subMenu);
        var $allSubMenus = $(this).find("." + defaults.subMenu);
        if ($subMenus.length > 0) {
          if ($subMenus.css("display") == "none") {
            $subMenus.slideDown(defaults.speed).siblings("a").addClass(defaults.indicator);
            if (defaults.singleOpen) {
              $(this).siblings().find("." + defaults.subMenu).slideUp(defaults.speed)
                .end().find("a").removeClass(defaults.indicator);
				
            }
			return false;
          } else {
            $(this).find("." + defaults.subMenu).delay(defaults.hideDelay).slideUp(defaults.speed);
          }
          if ($allSubMenus.siblings("a").hasClass(defaults.indicator)) {
            $allSubMenus.siblings("a").removeClass(defaults.indicator);
          }
        }
      return false;
      });
    });
</script>
@stop
@section('style')
<style type="text/css">
.menu {
  float: left;
  font-family: Raleway,'Open Sans',FontAwesome, sans-serif;
  width: 100%;
  outline: 0;
  position: relative;
}
.menu * {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  font-family: Raleway,'Open Sans',FontAwesome, sans-serif;
  outline: 0;
}
.menu .menu-footer {
  background: #414956;
  color: #f0f0f0;
  float: left;
  font-weight: normal;
  height: 50px;
  line-height: 50px;
  font-size: 6px;
  width: 100%;
  text-align: center;
}
.menu .menu-header {
  background: #414956;
  color: #f0f0f0;
  font-weight: bold;
  height: 50px;
  line-height: 50px;
  text-align: center;
  width: 100%;
}
.menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
}
.menu ul li {
  display: block;
  float: left;
  position: relative;
  width: 100%;
}
.menu ul li a {
  background: #414956;
  color: #f0f0f0;
  float: left;
  font-size: 13px;
  overflow: hidden;
  padding: 14px 22px;
  position: relative;
  text-decoration: none;
  white-space: nowrap;
  width: 100%;
}
.menu ul li a i {
  float: left;
  font-size: 16px;
  line-height: 18px;
  text-align: left;
  width: 34px;
}
.menu ul li .menu-label {
  background: #f0f0f0;
  border-radius: 100%;
  color: #555555;
  font-size: 11px;
  font-weight: 800;
  line-height: 18px;
  min-width: 20px;
  padding: 1px 2px 1px 1px;
  position: absolute;
  right: 18px;
  text-align: center;
  top: 14px;
}
.menu ul .submenu {
  display: none;
  position: static;
  width: 100%;
}
.menu ul .submenu .submenu-indicator{
  line-height: 16px;
}
.menu ul .submenu li {
  clear: both;
  width: 100%;
}
.menu ul .submenu li ul.submenu {
  display: none;
  position: static;
  width: 100%;
  overflow: hidden;
}
.menu ul .submenu li a {
  background: #383838;
  border-left: solid 6px transparent;
  border-top: none;
  float: left;
  font-size: 11px;
  position: relative;
  width: 100%;
}
.menu ul .submenu li:hover > a {
  border-left-color: #414956;
}
.menu ul .submenu li .menu-label {
  background: #f0f0f0;
  border-radius: 100%;
  color: #555555;
  font-size: 11px;
  font-weight: 800;
  line-height: 18px;
  min-width: 20px;
  padding: 1px 2px 1px 1px;
  position: absolute;
  right: 18px;
  text-align: center;
  top: 12px;
  top: 14px;
}
.menu ul .submenu > li > a {
  padding-left: 30px;
}
.menu ul .submenu > li > ul.submenu > li > a {
  padding-left: 45px;
}
.menu ul .submenu > li > ul.submenu > li > ul.submenu > li > a {
  padding-left: 60px;
}
.menu .submenu-indicator {
  -moz-transition: "transform .3s linear";
  -o-transition: "transform .3s linear";
  -webkit-transition: "transform .3s linear";
  transition: "transform .3s linear";
  float: right;
  font-size: 20px;
  line-height: 19px;
  position: absolute;
  right: 22px;
}
.menu .submenu-indicator-minus > .submenu-indicator {
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
}
.menu > ul > li.active > a {
  background: #3b424d;
  color: #ffffff;
}
.menu > ul > li:hover > a {
  background: #3b424d;
  color: #ffffff;
}
.menu > ul > li > a {
  border-bottom: solid 1px #3b424d;
}


</style>
@stop