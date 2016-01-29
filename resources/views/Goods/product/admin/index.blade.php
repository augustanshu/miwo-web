@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('goods.product.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('goods.product.names') !!}</small>
@stop
@section('title')
{!! trans('goods.product.names') !!}
@stop
@section('breadcrumb')
<ol class="breadcrumb">
    <li>
	<a href="{!! URL::to('admin') !!}">
	<i class="fa fa-dashboard"></i> 
	{!! trans('cms.home') !!} </a>
	</li>
    <li class="active">
	{!! trans('goods.product.names') !!}
	</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='entry-product'>

</div>
@stop

@section('tools')
@stop

@section('content')
<table id="main-list" class="table table-bordered table-striped">
    <thead>
        <tr>
	     	<th style=" width:1px; padding:0"></th>
            <th>{!! trans('goods.product.name') !!}</th>
			  <th>{!! trans('goods.product.code') !!}</th>
			    <th>{!! trans('goods.product.price') !!}</th>
				 <th>{!! trans('goods.product.category') !!}</th>
				 <th>状态</th>
        </tr>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">
var oTable;
$(document).ready(function(){
    $('#entry-product').load('{{URL::to('admin/goods/product/0')}}');
	
    oTable = $('#main-list').DataTable( {
        "ajax": '{{ URL::to('/admin/goods/product') }}',
        "columns": [
		{"data":null},
		{"data":"name"},
		{"data":"code"},
		{"data":"price"},
		{"data":"cname"},
		{"data":"status"}],
		"order":[[0,null]],
        "pageLength": 50,
        "columnDefs":[{
		"targets":-1,
        "data":status,
        "render":function(data,type,full){
			if(data=="on"){return "正常";}
			else{return "已下架";}
		}
		}],
		  initComplete: function () {//列筛选
                   var api = this.api();
                   api.columns().indexes().flatten().each(function (i) {
                       if (i ==4 || i==5 ) {
                           var column = api.column(i);
                           var $span = $('<span class="addselect">▾</span>').appendTo($(column.header()))
                           var select = $('<select><option value="">所有</option></select>')
                                   .appendTo($(column.header()))
                                   .on('click', function (evt) {
                                       evt.stopPropagation();
                                       var val = $.fn.dataTable.util.escapeRegex(
                                               $(this).val()
                                       );
                                       column
                                               .search(val ? '^' + val + '$' : '', true, false)
                                               .draw();
                                   });
                           column.data().unique().sort().each(function (d, j) {
                               function delHtmlTag(str) {
                                   return str.replace(/<[^>]+>/g, "");//去掉html标签
                               }
                               d = delHtmlTag(d)
							   if(d=="on"){d="正常"}
							   if(d=="off"){d="已下架"}
                               select.append('<option value="' + d + '">' + d + '</option>')
                               $span.append(select)
                           });
 
                       }
                   });			
               }
    });
    
	 //添加索引列
           oTable.on('order.dt search.dt',
                   function () {
                      oTable.column(0, {
                           search: 'applied',
                           order: 'applied'
                       }).nodes().each(function (cell, i) {
                           cell.innerHTML = i + 1;
                       });
                   }).draw();
	
	
    $('#main-list tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected').siblings(".selected").removeClass("selected");
        var d = $('#main-list').DataTable().row( this ).data();
        $('#entry-product').load('{{URL::to('admin/goods/product')}}' + '/' + d.id);
    });
	
});
</script>
@stop