
<div class="row">
<div class="col-md-3 col-sm-4">
<div class="col-md-12 col-sm-12" id="props-item">
<label class="name">{!!$array[$i][0]->name!!}</label>
@if($array[$i][0]->is_enum_prop)
     <select class="form-control" name="items" id="props-{!!$array[$i][0]->id!!}">
     @foreach($array[$i][2] as $option)
	 @if($option->id==$array[$i][1])
	 <option selected="selected" value="{!!$option->id!!}">{!!$option->name!!}</option>
     @else
     <option  value="{!!$option->id!!}">{!!$option->name!!}</option>
     @endif
     @endforeach
     </select>	 
@endif
</div>
</div>
</div>

<script type="text/javascript">

(function ($) {
  var props=$("input[name='props']").attr("value");
  var _prop=props.split(",");
  
  $("select").change(function(){  
	var id=$(this).attr("id");
	var _id=id.split("-");
    var _val=$(this).val();
	  $.each(_prop,function(key,val)
	  {
		  var p=val.split(":");
	      var p_id=p[0];
		  var p_val=p[1]; 
		  if(p_id==_id[1])
		  {
			  var _old=p_id+":"+p_val;
			  var _new=p_id+":"+_val;
			  props=props.replace(_old,_new);
			  _prop=props.split(",");
			  $("input[name='props']").attr("value",props);
			  return true;
		  } 
	  });
	  
 });
}(jQuery));
</script>