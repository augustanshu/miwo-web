@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('goods.goodsclass.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('goods.goodsclass.names') !!}</small>
@stop
@section('title')
{!! trans('goods.goodsclass.names') !!}
@stop
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! URL::to('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('goods.goodsclass.names') !!}</li>
</ol>
@stop
@section('entry')
<div class="box box-warning" id='entry-user'>

</div>
@stop
@section('tools')
@stop

@section('content')
<table id="main-list" class="table table-striped table-bordered">
    <thead>
        <th>{!! trans('goods.goodsclass.label.name')!!}</th>
        <th>{!! trans('goods.goodsclass.label.sort')!!}</th>
        <th>{!! trans('goods.goodsclass.label.description')!!}</th>
    </thead>
</table>
@stop
@section('script')
<script type="text/javascript">
var oTable;
$(document).ready(function(){
    $('#entry-user').load('{{URL::to('admin/goods/goodsclass/0')}}');
    oTable = $('#main-list').DataTable( {
        "ajax": '{{ URL::to('/admin/user/user') }}',
        "columns": [
        { "data": "name" },
        { "data": "email" },
        { "data": "sex" },
        { "data": "designation" },],
        "userLength": 50
    });
    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass("selected").siblings(".selected").removeClass("selected");
        var d = $('#main-list').DataTable().row( this ).data();
        $('#entry-user').load('{{URL::to('admin/user/user')}}' + '/' + d.id);
    });

    $('.filter-role').on( 'click', function (e) {
        role = $( this ).data( "role" );

        oTable.ajax.url('{!! URL::to('/admin/user/user?role=') !!}' + role).load();
        e.preventDefault();
    });
});
</script>
@stop
@section('style')
@stop