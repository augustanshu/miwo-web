<div id="menu" class="menu">
<ul>
<?php $i=0?>
@while (isset($category['0.'.++$i]))
	@if (($category['0.'.$i]->parent))
		<li>
	    <a href="{{URL::to('admin/goods/subcategory')}}/{!!$category['0.'.$i]->id!!}"data-target="category-entry"><i class="fa"></i>
	    {!!$category['0.'.$i]->name!!}
		<span class='submenu-indicator'>+</span>
		</a>
		 <ul class="submenu">
         @include('Goods.category.category.sub.edit',array('category'=>$category,'key'=>'0.'.$i))
		 </ul>
		</li>
	@else
		<li>
	 <a href="{{URL::to('admin/goods/subcategory')}}/{!!$category['0.'.$i]->id!!}"data-target="category-entry">{!!$category['0.'.$i]->name!!}</a>
	</li>
    @endif
@endwhile	
</ul>
</div>