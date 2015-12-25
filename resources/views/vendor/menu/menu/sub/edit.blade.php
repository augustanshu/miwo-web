
<?php $i=0?>
@while (isset($menu[$key . '.' . ++$i]))
@if (($menu[$key . '.' . $i]->parent))
<li class="dd-item dd3-item" data-id="{!!$menu[$key . '.' . $i]->id!!}">
    <div class="dd-handle dd3-handle">Drag</div>
    <div class="dd3-content">
        <a href="{{URL::to('admin/menu/submenu')}}/{!!$menu[$key . '.' . $i]->id!!}" data-target='menu-entry'>
            <i class="{!! !empty($menu[$key . '.' . $i]->icon) ?  $menu[$key . '.' . $i]->icon : '' !!}"></i> {!!$menu[$key . '.' . $i]->name!!}
            <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
        </a>
    </div>
    <ol class="dd-list">
        @include('menu::menu.sub.edit', array('menu' => $menu, 'key' => $key . '.' . $i))
    </ol>
</li>
@else
<li class="dd-item dd3-item" data-id="{!!$menu[$key . '.' . $i]->id!!}">
    <div class="dd-handle dd3-handle">Drag</div>
    <div class="dd3-content">
        <a href="{{URL::to('admin/menu/submenu')}}/{!!$menu[$key . '.' . $i]->id!!}"  data-target='menu-entry'>
            <i class="{!! !empty($menu[$key . '.' . $i]->icon) ?  $menu[$key . '.' . $i]->icon : '' !!}"></i> {!!$menu[$key . '.' . $i]->name!!}
            <span class="pull-right"><i class="fa fa-angle-double-right"></i></span>
        </a>
    </div>
</li>
@endif
@endwhile
