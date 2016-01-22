<div class="tab-pane active" id="detail">
<div class="row">
<div class="col-md-6">
{!!Former::text('brand_name')
->label(trans('goods.brand.label.name'))
->require()
->placeholder(trans('goods.brand.placeholder.name'))!!}
</div>
</div>

<div class="row">
<div class="col-md-6">
{!!Former::text('brand_initial')
->label(trans('goods.brand.label.brand_initial'))
->require()
->placeholder(trans('goods.brand.placeholder.brand_initial'))!!}
</div>
</div>

<div class="row">
<div class="col-md-6">
{!!Former::select('class_id')
->options($category)
->label(trans('goods.brand.label.class'))
->require()
->placeholder(trans('goods.brand.placeholder.class'))!!}
</div>
</div>
	
<div class="row">
<div class="col-md-6">
{!!Former::file('avatar','商标图')
->label(trans('goods.brand.label.img'))
!!}
</div>
</div>
<div class="row">
<div class="col-md-6">
@if(isset($brand->avatar_file_name))
<img src="<?= $brand->avatar->url('thumb') ?>" >
@endif
</div>
</div>


