<div class="box-header with-border">
    <h3 class="box-title">[{!!$product->name or 'New menu'!!}]</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn-save"><i class="fa fa-floppy-o"></i> 保存</button>
        <button type="button" class="btn btn-default btn-sm" id="btn-close"><i class="fa fa-times-circle"></i> 关闭</button>
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
        ->id('edit-product')
        ->method('PUT')
        ->action(URL::to('admin/goods/product/'. $product->id))!!}
        {!!Former::token()!!}
        {!!Former::hidden('upload_folder')!!}
        <div class="tab-content">
           @include('Goods.product.admin.partial.entry')
        </div>
        {!!Former::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>
<script type="text/javascript">
(function ($) {
    $('#btn-close').click(function(){
        $('#entry-product').load('{!!URL::to('admin/goods/product')!!}/{!!$product->id!!}');
    });
    $('#btn-save').click(function(){
       $('#edit-product').submit();
    });
	
    $('#edit-product')
    .submit( function( e ) {
        var url  = $(this).attr('action');
        $.ajax( {
            url: url,
            type: 'POST',
            data: new FormData( this ),
            processData: false,
            contentType: false,
			 beforeSubmit: function(data) {
             //给表单中某个隐藏值赋值
              //document.getElementById("oscId").value= '123';
              },
            success:function (data, textStatus, jqXHR)
            {
				
				 window.location.reload();
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
            }
        });
        e.preventDefault();
    });
	
}(jQuery));
</script>