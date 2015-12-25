@extends('admin::index')

@section('heading')
<h1>
{!! trans('menu::package.name') !!}
<small> {!! trans('app.manage') !!} {!! trans('menu::package.names') !!}</small>
</h1>
@stop

@section('title')
{!! trans('menu::menu.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! URL::to('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
    <li class="active">{!! trans('menu::menu.names') !!}</li>
</ol>
@stop

@section('tools')
<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="btnDelete"><i class="fa fa-times-circle"></i> Delete</button>
@stop

@section('content')
<div class="col-md-5">
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            @foreach($rootMenu as $menu)
            <li><a href="/admin/menu/{{$menu->id}}/submenu">{{$menu->name}}</a></li>
            @endforeach
            <li><a href="/admin/menu/{{$menu->id}}/submenu">{{$menu->name}}</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="details">
                {!!Menu::menu($parent->key, 'edit')!!}
            </div>
        </div>
    </div>
</div>
<div class="col-md-7">
    <div class="box box-warning" id='menu-entry'>
    </div>
</div>
@stop

@section('script')
<script type="text/javascript">
var oTable;
$(document).ready(function(){
    $('#menu-entry').load('{!!URL::to("admin/menu/{$parent->id}/submenu/0")!!}');
});
</script>
@stop

@section('style')
<style type="text/css">
.box-body{
    min-height: 420px;
}
</style>
@stop