@if($menus)
    @foreach($menus as $menuAccess)
        @php $menu = $menuAccess->menu; @endphp
        <a class="btn btn-sm {{ $menu->menu_class }}" href="{{ route($menu->menu_route) }}">{{ $menu->menu_title }}</a>
    @endforeach
@endif