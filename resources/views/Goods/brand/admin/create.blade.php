<div class="box-header with-border">
<div class="box-tools pull-right">
  <button type="button" class="btn btn-primary btn-sm" id="btn-save"><i class="fa fa-floppy-o"></i> {{ trans('cms.save') }}</button>
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" id="btn-cancel"><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        {!!Former::vertical_open()
        ->id('create-brand')
        ->method('POST')
        ->action(URL::to('admin/goods/brand'))!!}
        {!! Former::token() !!}
            <div class="tab-content">
                @include('goods.brand.admin.partial.brand')
            </div>
        {!! Former::close() !!}
		</div>
		</div>
<script>
(function ($) {
    $('#btn-save').click(function(){
        $('#create-brand').submit();
    });

    $('#btn-cancel').click(function(){
        $('#entry-brand').load('{{URL::to('admin/goods/brand/0')}}');
    });

$('#create-brand')
    .submit( function( e ) {
        if($('#create-brand').valid() == false) {
            toastr.error('Please enter valid information.', 'Error');
            return false;
        }
        var url  = $(this).attr('action');
        $.ajax( {
            url: url,
            type: 'POST',
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success:function(data, textStatus, jqXHR)
            {
				 $('#main-list').DataTable().ajax.reload( null, false );
                $('#entry-brand').load('{{URL::to('admin/goods/brand/0')}}');
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
				
            }
        });
        e.preventDefault();
    });
}(jQuery));
</script>