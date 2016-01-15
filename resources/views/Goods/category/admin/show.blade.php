<div class="box-header with-border">
<h3 class="box-title">分类管理
[{{$category->name or 'New Category'}}]</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-success btn-sm" id="btn-category-create"><i class="fa fa-plus-circle"></i> 新建种类</button>
@if($category->id)
	@endif
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
</div>
<div class="box-body">
<div class="nav-tabs-custom">

</div>
</div>
<script type="text/javascript">
$(document).ready(function(){	
		$('#btn-category-create').click(function(){
			$('#category-entry').load('{{URL::to('admin')}}/goods/subcategory/create?parent_id={{$category->id}}');
		});

});
</script>