<?php $i=0?>
<label for="description" class="control-label">属性</label><br>
	<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
	<li  class="active"><a href="#key"  data-toggle="tab">关键属性</a></li>
	<li><a href="#notkey"  data-toggle="tab">非关键属性</a></li>
	<li><a href="#sale"  data-toggle="tab">销售属性</a></li>
	<li style="display:none"><a href="#test"  data-toggle="tab" >测试</a></li>
	</ul>
	<div class="tab-content">
       <div class="tab-pane active"  id="key">
	    
		 <ul class="list-group">
		 @while (isset($items[$i++]))
			 @if ($items[$i-1]->is_key_prop)
            <li class="list-group-item">
			    @if ($items[$i-1]->is_must) 
				    <span class="badge">必填</span>
				 @endif
				  @if ($items[$i-1]->is_enum_prop) 
				    <span class="badge">枚举</span>
				@else
					<span class="badge">输入</span>
				 @endif
			{!!$items[$i-1]->name!!}
			 </li>
		   @endif
	    @endwhile
		</ul>
	  </div>
	  <div class="tab-pane"  id="sale">
	    <ul class="list-group">
            <?php $i=0?>
			@while (isset($items[$i++]))
			 @if ($items[$i-1]->is_sale_prop)
		    <li class="list-group-item">
			    @if ($items[$i-1]->is_must) 
				    <span class="badge">必填</span>
				 @endif
				  @if ($items[$i-1]->is_enum_prop) 
				    <span class="badge">枚举</span>
				@else
					<span class="badge">输入</span>
				 @endif
		   {!!$items[$i-1]->name!!}</li>
		   @endif
	    @endwhile
        </ul>
	  </div>
	  <div class="tab-pane"  id="notkey">
	    <ul class="list-group">
          <?php $i=0?>         
		 @while (isset($items[$i++]))
			 @if (!$items[$i-1]->is_sale_prop & !$items[$i-1]->is_key_prop)
			    <li class="list-group-item">
			    @if ($items[$i-1]->is_must) 
				    <span class="badge">必填</span>
				 @endif
				  @if ($items[$i-1]->is_enum_prop) 
				    <span class="badge">枚举</span>
				@else
					<span class="badge">输入</span>
				 @endif
			 {!!$items[$i-1]->name!!}</li>
		   @endif
	    @endwhile
        </ul>
	  </div>
	  
	    <div class="tab-pane" id="test">
		<ul class="list-group">
		<li class="list-group-item">
		      <div class="dropdown-toggle"  data-toggle="dropdown">
              原始 <span class="caret"></span>
               </div>
                 <ul class="dropdown-menu list-group" role="menu">
                 <li class="list-group-item"><a href="#">功能</a></li>
                 <li class="list-group-item"><a href="#">另一个功能</a></li>
                 <li class="list-group-item"><a href="#">其他</a></li>                 
                 <li class="list-group-item"><a href="#">分离的链接</a></li>
                </ul>
		</li>
		</ul>
	    </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){

});
</script>
