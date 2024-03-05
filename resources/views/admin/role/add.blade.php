@extends('layout.template')
@section('title','Roles')
@section('heading','Add Role')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('role.save') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="role_name">Role Name</label>
                                    <input type="text" class="form-control" id="role_name" name="role_name" value="{{ old('role_name') }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3">
                                        <input type="checkbox" class="custom-control-input" id="checkall">
                                        <label class="custom-control-label" for="checkall">Check All</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($menus as $menu)
                                <div class="col-12 col-sm-4">
                                    <div class="row">
                                        <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3">
                                            <input type="checkbox" class="custom-control-input checksub" id="menu{{ $menu->id }}" name="posted[]">
                                            <label class="custom-control-label" for="menu{{ $menu->id }}">{{ $menu->menu_title }}</label>
                                        </div>
                                    </div>
                                    @if($menu->submenus)
                                        @foreach($menu->submenus as $submenu)
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3 ml-2">
                                                        <input type="checkbox" class="custom-control-input checksub" id="menu{{ $submenu->id }}" name="posted[]">
                                                        <label class="custom-control-label" for="menu{{ $submenu->id }}">{{ $submenu->menu_title }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-success float-right">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#checkall").on('click',function(){
                
            });
        });
    </script>
@endsection
