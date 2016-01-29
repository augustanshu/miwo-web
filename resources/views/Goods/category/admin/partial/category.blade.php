<div class="tab-pane active" id="detail">
<div class="row">
<div class="col-md-6">
{!!Former::text('name')
->label(trans('goods.category.label.name'))
->require()
->placeholder(trans('goods.category.placeholder.name'))!!}
</div>
</div>
<div class="row">
<div class="col-md-6">
{!!Former::text('order')
->label(trans('goods.category.label.order'))
->placeholder(trans('goods.category.placeholder.order'))!!}
</div>
</div>
<div class="row">
<div class="col-md-12">
{!!Former::text('description')
->label(trans('goods.category.label.description'))
->placeholder(trans('goods.category.placeholder.description'))!!}
</div>
</div>
<div class="row">
<div class="col-md-12">
@if($category->is_parent==0)
@include('Goods.category.admin.props')
@endif
</div>
</div>
<div class="row">
<div class="col-md-12">

</div>
</div>