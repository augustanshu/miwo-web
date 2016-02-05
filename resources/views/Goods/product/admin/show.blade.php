<div class="box-header with-border">
    <h3 class="box-title">  {{ trans('goods.product.name') }}  [{{ $product->name }}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" id="btn-new"><i class="fa fa-plus-circle"></i>  {{ trans('cms.new') }}</button>
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit"><i class="fa fa-pencil-square"></i>  {{ trans('cms.edit') }}</button>
        <button type="button" class="btn btn-danger btn-sm" id="btn-delete"><i class="fa fa-times-circle-o"></i>  {{ trans('cms.delete') }}</button>
		@if($product->status=="on")
		    <button type="button" class="btn btn-danger btn-sm" id="btn-soldout"><i class="fa fa-times-circle-o"></i>  {{ trans('cms.soldout') }}</button>
		@else
			  <button type="button" class="btn btn-primary btn-sm" id="btn-soldon"><i class="fa fa-times-circle-o"></i>  {{ trans('cms.soldon') }}</button>
		  @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
		<li class="active"><a href="#normal" data-toggle="tab">基本属性</a></li>
            <li ><a href="#key" data-toggle="tab">关键属性</a></li>
            <li><a href="#notkey" data-toggle="tab">非关键属性</a></li>
			<li><a href="#sale" data-toggle="tab">销售属性</a></li>
        </ul>
        {!!Former::vertical_open()
        ->id('show-product')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/goods/product'))!!}
            <div class="tab-content">
                @include('Goods.product.admin.partial.entry')
            </div>
        {!! Former::close() !!}
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#btn-edit').click(function(){
		$('#entry-product').load('{{URL::to('admin/goods/product')}}/{{$product->id}}/edit');
	});
		$('#btn-new').click(function(){
		$('#entry-product').load('{{URL::to('admin/goods/product')}}/create');
	});
	
	$('#btn-delete').click(function(){
		swal({
			title: "确定删除?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
		},function(){
			 var data = new FormData();
                $.ajax({
                    url: '{{URL::to('admin')}}/goods/product/{{$product->id}}',
                    type: 'DELETE',
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        swal("Deleted!", "The product has been deleted.", "success");
                        $('#entry-product').load('{{URL::to('admin/goods/product/0')}}');
                        $('#main-list').DataTable().ajax.reload( null, false );
                    },
                });
			
		});
	});
	
		$('#btn-soldout').click(function(){
		swal({
			title: "确定下架?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
		},function(){
			 var data = new FormData();
                $.ajax({
                    url: '{{URL::to('admin')}}/goods/product/{{$product->id}}/onoff',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {   
                        swal("Remove!", "The product has been removed.", "success");
                        $('#entry-product').load('{{URL::to('admin/goods/product/0')}}');
                        $('#main-list').DataTable().ajax.reload( null, false );
                    },
                });
			
		});
	});
	
		$('#btn-soldon').click(function(){
		swal({
			title: "确定上架?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes",
            closeOnConfirm: false
		},function(){
			 var data = new FormData();
                $.ajax({
                    url: '{{URL::to('admin')}}/goods/product/{{$product->id}}/onoff',
                    type: 'POST',
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        swal("Change!", "The product has been sold.", "success");
                        $('#entry-product').load('{{URL::to('admin/goods/product/0')}}');
                        $('#main-list').DataTable().ajax.reload( null, false );
                    },
                });
			
		});
	});
	
});
</script>