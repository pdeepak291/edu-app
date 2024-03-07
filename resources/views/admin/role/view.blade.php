@extends('layout.template')
@section('title','Roles')
@section('heading','View Role')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label for="role_name">Role Name</label>
                                <input type="text" class="form-control " id="role_name" value="{{ $role->role_name }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row ml-0">
                        @foreach($menus as $menu)
                            <div class="col-12 col-sm-3">
                                <div class="row">
                                    <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3">
                                        <input type="checkbox" class="custom-control-input" id="menu{{ $menu->id }}" {{ $access->contains('menu_id', $menu->id) ? 'checked' : '' }} disabled>
                                        <label class="custom-control-label" for="menu{{ $menu->id }}">{{ $menu->menu_title }}</label>
                                    </div>
                                </div>
                                @if($menu->submenus)
                                    @foreach($menu->submenus as $submenu)
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3 ml-2">
                                                    <input type="checkbox" class="custom-control-input" id="menu{{ $submenu->id }}" {{ $access->contains('menu_id', $submenu->id) ? 'checked' : '' }} disabled>
                                                    <label class="custom-control-label" for="menu{{ $submenu->id }}">{{ $submenu->menu_title }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="form-footer pt-5 border-top">
                        <button type="button" class="btn btn-sm btn-light" onclick="location.href='{{ url()->previous() }}'">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
