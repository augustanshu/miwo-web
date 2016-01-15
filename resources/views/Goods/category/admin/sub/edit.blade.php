<div class="box-header with-border">
<h3 class="box-title">Category管理
[{{$category->name or 'New Category'}}]</h3>
<div class="box-tools pull-right">
<button type="button" class="btn btn-success btn-sm" id="btn-category-create"><i class="fa fa-plus-circle"></i> 新建种类</button>
@if($category->id)
	<button type="button" class="btn btn-primary btn-sm" id="btn-category-edit"><i class="fa fa-pencil-square"></i> 编辑</button>
    <button type="button" class="btn btn-danger btn-sm" id="btn-category-delete"><i class="fa fa-times-circle"></i> 删除</button>
	@endif
	<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
<div class="box-body">
<div class="nav-tabs-custom">
<!--Nav tabs-->
<ul class="nav nav-tabs primary">
<li class="active"><a href="#detail" data-toggle="tab">种类</a></li>
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
    @if($category->id)
        
    @endif

});
</script>