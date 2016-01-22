<div class="box-header with-border">
    <h3 class="box-title"> {{$brand->brand_name}}</h3>
    <div class="box-tools pull-right">

        @if($brand->id)
        <button type="button" class="btn btn-primary btn-sm" id="btn-edit-brand"><i class="fa fa-pencil-square"></i> {{ trans('cms.edit') }}</button>
	    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="btn-delete-brand"><i class="fa fa-times-circle"></i> {{ trans('cms.delete') }}</button>
        @endif
		
		        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="btn-close-brand"><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">

        {!!Former::vertical_open()
        ->id('show-brand')
        ->method('PUT')
        ->action(URL::to('admin/brand/admin/'. $brand['id']))!!}
        {!!Former::token()!!}
        <div class="tab-content">
		
		<div class="row">
		<div class="col-md-6">
                {!! Former::text('brand_name')
                -> label(trans(trans('goods.brand.label.name')))
                -> placeholder(trans(trans('goods.brand.placeholder.name')))
                -> disabled()!!}
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-6">
                {!! Former::text('brand_initial')
                -> label(trans(trans('goods.brand.label.brand_initial')))
                -> placeholder(trans(trans('goods.brand.placeholder.brand_initial')))
                -> disabled()!!}
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-6">
                       {!!Former::select('class_id',$brand->class_id)
                       ->options($category)
                       ->label(trans('goods.brand.label.class'))
                       ->require()
                       ->placeholder(trans('goods.brand.placeholder.class'))
					   -> disabled()!!}
		</div>
		</div>
		
		<div class="row">
		 <div class="col-md-6">
		<label for="class_id" class="control-label">
		商标图片
		 </label>
		 </div>
		<br>
		<br>
		 <div class="col-md-6">
        <img src="<?= $brand->avatar->url() ?>" alt="该图片无法显示" style="width:300px;height:200px">
		</div>
		
		</div>
		</div>
		
        </div>
    {!!Former::close()!!}
</div>
<div class="box-footer" >
&nbsp;
</div>
<script type="text/javascript">
$(document).ready(function(){
    $('#btn-close-brand').click(function(){
        $('#entry-brand').load('/admin/goods/brand/0');
    });
	
	 $('#btn-edit-brand').click(function(){
        $('#entry-brand').load('/admin/goods/brand/{{$brand->id}}/edit');
    });
		//数据删除
	$('#btn-delete-brand').click(function(){
		
	        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function(){
                    $data = new FormData();
                    $.ajax({
                        url: '/admin/goods/brand/{{$brand->id}}',
                        type: 'DELETE',
                        processData: false,
                        contentType: false,
                        success:function(data, textStatus, jqXHR)
                        {
                            swal("Deleted!", "The brand has been deleted.", "success");
							$('#main-list').DataTable().ajax.reload( null, false );
							$('#entry-brand').load('{{URL::to('admin/goods/brand/0')}}');
                        },
                    });
            });	
			
	});
});
</script>