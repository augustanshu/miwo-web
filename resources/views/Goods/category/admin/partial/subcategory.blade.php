<div class="tab-pane active" id="details">
    <div class="row">
        <div class="col-md-6 ">
            {!! Former::text('name')
            -> label(trans('goods.category.label.name'))
            -> placeholder(trans('goods.category.placeholder.name'))!!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ">
            {!! Former::text('order')
            -> label(trans('goods.category.label.order'))
            -> placeholder(trans('goods.category.placeholder.order'))!!}
        </div>
    </div>
	<div class="row">
	<div class="col-md-6">
{!!Former::text('type_name')
->label(trans('goods.category.label.type'))
->placeholder(trans('goods.category.placeholder.type'))!!}
  </div>
 </div>
    <div class="row">
        <div class="col-md-12 ">
            {!! Former::textarea('description')
            -> label(trans('goods.category.label.description'))
            -> placeholder(trans('goods.category.placeholder.description'))!!}
            {!! Former::hidden('parent_id')->id('parent_id') !!}
        </div>
    </div>
</div>