<div class="box-header with-border">
<h3 class="box-title">{{trans('cms.select-category')}}</h3>
</div>
<div class="box-body">
<div class="col-md-5 col-lg-5" id="category">
<div class="form-group" id="row-0">
<label class="col-md-2 control-label">大类</label>
<select id="category-0" class="form-control"> 
      <option>----请选择类目----</option> 
</select> 
</div>
<div class="form-group" id="row-1" style="display:none">
<label class="col-sm-2 control-label">子类</label>
<select id="category-1" class="form-control" > 
      <option>----请选择类目----</option> 
</select> 
</div>

<div class="form-group" id="row-2" style="display:none">
<label class="col-sm-2 control-label">子叶类</label>
<select id="category-2" class="form-control" > 
      <option>----请选择类目----</option> 
</select> 
</div>
</div>
</div>
<div class="box-footer">
<div class="form-group text-center">
<button id="next" class="btn btn-default disabled">下一步</button>
</div>
</div>
<script type="text/javascript">
(function($){
	var item=$("#category");
	var item0=$("#category-0");
	var item1=$("#category-1");
	var item2=$("#category-2");

		    $.ajax({
		    type:"POST",  
            url:"/u/showCategory",  
            data:{"rank":0},
            dataType:"json",  
			error:function(){    alert('error');        },
            success:function(msg){				
			$.each(msg.data,function(key,val){
                var option = $("<option>").text(val["name"]).val(val["id"])
                item0.append(option);
			})
			
			}
	              });
	
	        
		    item0.change(function(){
			var id=$("#category-0").val();
			$.ajax({
		    type:"POST",  
            url:"/u/showCategory",  
            data:{"rank":id},
            dataType:"json",  
			error:function(){    alert('error');        },
            success:function(msg){	
            if(msg.flag=="false")
			{
				$("#row-1").hide();
				$("#row-2").hide();
				 
			}
            else	
			 {		
		   
            item1.empty();	
            item2.empty();			
            item1.append("<option>----请选择类目----</option>");	
            item2.append("<option>----请选择类目----</option>");			
			$.each(msg.data,function(key,val){
                var option = $("<option>").text(val["name"]).val(val["id"])
                item1.append(option);
			       });
					   }
			}
		    });	
			});
			
            item1.change(function(){
		    var id=$("#category-1").val();
		  
			$.ajax({
		    type:"POST",  
            url:"/u/showCategory",  
            data:{"rank":id},
            dataType:"json",  
			error:function(){    alert('error');        },
            success:function(msg){	
			if(msg.flag=="false")
			{
				$("#row-2").hide();
			}
			else
			 {
            item2.empty();		
            item2.append("<option>----请选择类目----</option>");		
			$.each(msg.data,function(key,val){
                var option = $("<option>").text(val["name"]).val(val["id"])
                item2.append(option);
			 });
			   $("#row-2").show();
			 }
			}
		    });	
			});				
}(jQuery));
</script>