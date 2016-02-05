
<div class="row">
<div class="col-md-3 col-sm-4">
<div class="col-md-12 col-sm-12">
<label class="name">{!!$array_input[$j][0]->name!!}</label>
<input type="text" class="form-control" id="input-{!!$array_input[$j][0]->id!!}" 
         placeholder="ÇëÊäÈëÃû³Æ"  name="input-str" value="{!!$array_input[$j][1]!!}">
		 <br>
</div>
</div>
</div>
<script type="text/javascript">
(function($){
	var input_pids=$("input[name='input_pids']").attr("value");
    var input_str=$("input[name='input_str']").attr("value");
    var _input_pid=input_pids.split(",");
    var _input_str=input_str.split(",");
	var str;
	$('input[name=input-str]').change(function(){
		var item=$(this).attr("id");
		var text=$(this).val();
		var _item=item.split('-');
		var _id=_item[1];
		var i=0;
		$.each(_input_pid,function(key,val){
			if(val==_id)
			{
				return;
			}
			i++;
		});
		_input_str[i]=text;
		str=_input_str.toString();
		$("input[name='input_str']").attr("value",str);
		
	});
	
	
}(jQuery));

</script>