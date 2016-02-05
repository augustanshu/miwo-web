<div class="tab-pane active" id="normal">
<div class="row">
<div class="col-md-3 col-sm-4">
<div class="col-md-12 col-sm-12">
{!!Former::text('name')
->label(trans('goods.product.label.name'))
->placeholder(trans('goods.product.placeholder.name'))
!!}
</div>
<div class="col-md-12 col-sm-12">
{!!Former::text('code')
->label(trans('goods.product.label.code'))
->placeholder(trans('goods.product.placeholder.code'))
!!}
</div>
<div class="cole-md-12 col-sm-12">
{!!Former::text('price')
->label(trans('goods.product.label.price'))
->placeholder(trans('goods.product.placeholder.price'))
!!}
</div>
@if(isset($product->cid))
<div class="cole-md-12 col-sm-12">
{!!Former::text('cname')
->disabled()
->label(trans('goods.product.label.category'))
->placeholder(trans('goods.product.placeholder.category'))
!!}
<!--
<label class="name">{{trans('goods.category.name')}}</label>
<select class="form-control" name="items" id="category">
<option></option>
</select>
<div class="pull-right">
<button class="btn btn-xs">编辑</button>
</div>
-->

{!!Former::hidden('cid')
!!}
</div>
<div class="cole-md-12 col-sm-12">
{!!Former::hidden('props')
!!}
{!!Former::hidden('input_pids')
!!}
{!!Former::hidden('input_str')
!!}
</div>
@endif
</div>
</div>
</div>

<div class="tab-pane" id="key">
<?php $i=-1;$j=-1?>

@while(isset($array[++$i][0]))
@if($array[$i][0]->is_key_prop==1)
@include('Goods.product.admin.partial.entry_part')
@endif
@endwhile

@while(isset($array_input[++$j][0]))
@if($array_input[$j][0]->is_key_prop==1)
@include('Goods.product.admin.partial.entry_part_input')
@endif
@endwhile

</div>

<div class="tab-pane" id="notkey">
<?php $i=-1;$j=-1?>
@while(isset($array[++$i][0]))
@if($array[$i][0]->is_key_prop!=1 &$array[$i][0]->is_sale_prop!=1)
@include('Goods.product.admin.partial.entry_part')
@endif
@endwhile

@while(isset($array_input[++$j][0]))
@if($array_input[$j][0]->is_key_prop!=1 & $array_input[$j][0]->is_sale_prop!=1)
@include('Goods.product.admin.partial.entry_part_input')
@endif
@endwhile
</div>

<div class="tab-pane" id="sale">
<?php $i=-1;$j=-1?>
@while(isset($array[++$i][0]))
@if($array[$i][0]->is_sale_prop==1)
@include('Goods.product.admin.partial.entry_part')
@endif
@endwhile

@while(isset($array_input[++$j][0]))
@if($array_input[$j][0]->is_sale_prop==1)
@include('Goods.product.admin.partial.entry_part_input')
@endif
@endwhile
</div>
<script type="text/javascript">
(function($){
	$.ajax({
		    type:"POST",  
            url:"/u/showCategory",  
            data:{}, 
            dataType:"json",  
			error:function(){            },
            success:function(msg){  
			var friends = $("#category");
               
			$.each(msg,function(key,val){
				/*
                var option = $("<option>").text(val["name"]).val(val["name"])
                friends.append(option);
				*/
			});
			}
	});  
}(jQuery));
</script>
