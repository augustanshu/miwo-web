<?php $i=0?>
@while (isset($category[$key.'.'.++$i]))	
	@if(($category[$key.'.'.$i]->parent))
		<li> <a href="{{URL::to('admin/goods/subcategory')}}/{!!$category[$key.'.'.$i]->id!!}" data-target="category-entry">
		{!!$category[$key.'.'.$i]->name!!}
		<span class='submenu-indicator'>+</span>
		</a>
		<ul class="submenu">
        @include('Goods.category.category.sub.edit',array('category'=>$category,'key'=>$key.'.'.$i))
		</ul>
	    </li>
    @else
	   <li>
	    	 <a href="{{URL::to('admin/goods/subcategory')}}/{!!$category[$key.'.'.$i]->id!!}" data-target="category-entry">{!!$category[$key.'.'.$i]->name!!}</a>
	    </li>
@endif
@endwhile