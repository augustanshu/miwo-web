<div class="box-header with-border">
    <h3 class="box-title"> 分类管理-{{$category->name or '新建分类'}}</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn-category-save"><i class="fa fa-floppy-o"></i>保存</button>
        <button type="button" class="btn btn-default btn-sm" id="btn-category-close"><i class="fa fa-times-circle"></i> 关闭</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">分类 </a></li>
        </ul>
        {!!Former::vertical_open()
        ->id('edit-category')
        ->method('PUT')
        ->action(URL::to('admin/goods/category/'.$category['id']))!!}
        {!! Former::token() !!}
		 {!!Former::hidden('upload_folder')!!}
            <div class="tab-content">
          @include('Goods.category.admin.partial.subcategory')
            </div>
        {!! Former::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>

<script type="text/javascript">
(function ($) {
    $('#btn-category-close').click(function(){
        $('#category-entry').load('{!!URL::to('admin')!!}/goods/subcategory/{!!$category->parent_id!!}');
	});
	
	$('#btn-category-save').click(function(){
	$('#edit-category').submit();
	});
	
	$('#edit-category').submit(function(e){
		var url=$(this).attr('action');
		$.ajax({
			url:url,
			type:'POST',
			data:new FormData(this),
			processData:false,
			contentType:false,
			success:function(data,textStatus,jqXHR)
			{
				window.location.reload();
			},
			error:function(jqXHR,textStatus,errorThrown)
			{}
		});
		e.preventDefault();
	});
}(jQuery));
</script>