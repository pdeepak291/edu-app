@if($menus)
    <ul class="nav sidebar-inner" id="sidebar-menu">
        @foreach($menus as $menuAccess)
            @php $menu = $menuAccess->menu; @endphp
            <li @if(Route::currentRouteName() == $menu->menu_route) class="active" @endif>
                <a class="sidenav-item-link" href="{{ route($menu->menu_route) }}">
                    <i class="mdi {{ $menu->menu_icon }}"></i>
                    <span class="nav-text">{{ $menu->menu_title }}</span>
                </a>
            </li>
        @endforeach
    </ul>
@endif