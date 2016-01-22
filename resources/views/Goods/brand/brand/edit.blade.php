<div class="box-header with-border">
    <h3 class="box-title">{{ trans('goods.brand.names')}}</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" id="btn-save"><i class="fa fa-floppy-o"></i> 保存</button>
        <button type="button" class="btn btn-default btn-sm" id="btn-close"><i class="fa fa-times-circle"></i> 取消</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        {!!Former::vertical_open()
        ->id('edit-brand')
        ->method('PUT')
        ->action(URL::to('admin/goods/brand/'. $brand['id']))!!}
        {!!Former::token()!!}
        <div class="tab-content">
          @include('Goods.brand.admin.partial.brand')
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
        $('#entry-brand').load('{{URL::to('admin/goods/brand/0')}}');
    });
	  $('#btn-save').click(function(){
        $('#edit-brand').submit();
    });
    $('#edit-brand')
    .submit( function( e ) {
        var url  = $(this).attr('action');
        $.ajax( {
            url: url,
            type: 'POST',
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success:function(data, textStatus, jqXHR)
            {
                $('#entry-brand').load('{{URL::to('admin')}}/goods/brand/{{$brand->id}}');
				 $('#main-list').DataTable().ajax.reload( null, false );
				
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                app.message(jqXHR, {{config('app.debug') ? 'true' : 'false'}});
            }
        });
        e.preventDefault();
    });
}(jQuery));
</script>