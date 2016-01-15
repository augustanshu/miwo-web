@extends('admin::curd.index')
@section('heading')
<i class="fa fa-title-text-0"></i>
{!!trans('goods.brand.name')!!}<small>{!!trans('cms.manage')!!}{!!trans('goods.brand.names')!!}</small>
@stop

@section('breadcrumb')
<ol class="breadcrumb">
<li>
<a href="{!!URL::to('admin')!!}">
<i class="fa fa-dashboard"></i>
{!!trans('cms.home')!!}</a>
</li>
<li class="active">
{!!trans('goods.brand.names')!!}
</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='entry-brand'>
</div>
@stop

@section('tools')

@stop

@section('title')
{!! trans('goods.brand.names') !!}
@stop

@section('content')
<div class="col-md5">
{!!Brand::brand('all','default')!!}
</div>
@stop

@section('script')
<script type="text/javascript">
$('#entry-brand').load('{{URL::to('admin/goods/brand/1')}}');
</script>
@stop