<div class="box-header with-border">
<h3 class="box-title">
{{$category->name or '新建分类'}}</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-success btn-sm" id="btn-category-create"><i class="fa fa-plus-circle"></i> 新建分类</button>
@if($category->id)
	<button type="button" class="btn btn-primary btn-sm" id="btn-category-edit"><i class="fa fa-pencil-square"></i> 编辑</button>
    <button type="button" class="btn btn-danger btn-sm" id="btn-category-delete"><i class="fa fa-times-circle"></i> 删除</button>
	@endif
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
</div>
<div class="box-body">
<div class="nav-tabs-custom">
<!--Nav tabs-->
<ul class="nav nav-tabs primary">
<li class="active"><a href="#detail" data-toggle="tab">分类</a></li>
</ul>
{!!Former::vertical_open()
->id('show-category')
->method('PUT')
->action(URL::to('admin/goods/category'.$category['id']))!!}
<div class="tab-content">
   @include('Goods.category.admin.partial.category')
</div>
{!!Former::close()!!}
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	
		$('#btn-category-create').click(function(){
			$('#category-entry').load('{{URL::to('admin')}}/goods/subcategory/create?parent_id={{$category->id}}');
		});
		@if($category->id)
		$('#btn-category-edit').click(function(){
		   $('#category-entry').load('{{URL::to('admin/goods/category')}}/{{$category->id}}/edit');	
		});
		
		$('#btn-category-delete').click(function(){
			swal({
			 title: "确定删除?",
            text: "删除后该分类无法恢复",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确定删除",
			cancelButtonText:"	取消",
            closeOnConfirm: false
			},function(){
				var data = new FormData();
                $.ajax({
                    url: '/admin/goods/category/{{$category->id}}',
                    type: 'DELETE',
                    processData: false,
                    contentType: false,
                    success:function(data, textStatus, jqXHR)
                    {
                        swal("Deleted!", "The category has been deleted.", "success");
						window.location.reload();
                    },
                });
			});
		});
		@endif
});
</script>