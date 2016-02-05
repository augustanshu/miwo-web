<div class="box-header with-border">
    <h3 class="box-title">  {{ trans('cms.new') }}  [{{ $product->name }}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn-save"><i class="fa fa-plus-circle"></i>  {{ trans('cms.save') }}</button>
        <button type="button" class="btn btn-default btn-sm" id="btn-close"><i class="fa fa-pencil-square"></i>  {{ trans('cms.close') }}</button>
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
        ->id('create-product')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/goods/product'))!!}
            <div class="tab-content">
                @include('Goods.product.admin.partial.entry')
            </div>
        {!! Former::close() !!}
    </div>
</div>

