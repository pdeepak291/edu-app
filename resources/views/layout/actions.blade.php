@if($menus)
    @foreach($menus as $menuAccess)
        @php $menu = $menuAccess->menu; @endphp
        <a href="{{ route($menu->menu_route,$id) }}" @if($menu->menu_warning=='Y') onclick="confirm('Are you sure want to delete ?')" @endif @if($menu->menu_target=='blank') target="_blank" @endif><i class="mdi mdi-24px {{ $menu->menu_icon.' '.$menu->menu_class }}"></i></a>
    @endforeach
@endif