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
                                    <input type="text" class="form-control @error('role_name') border-danger @enderror" id="role_name" name="role_name" value="{{ old('role_name') }}">
                                    @error('role_name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3">
                                        <input type="checkbox" class="custom-control-input" id="checkall">
                                        <label class="custom-control-label" for="checkall">Check All</label>
                                        @error('menu_list')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ml-0">
                            @foreach($menus as $menu)
                                <div class="col-12 col-sm-3">
                                    <div class="row">
                                        <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3">
                                            <input type="checkbox" class="custom-control-input checksub checkmain" id="menu{{ $menu->id }}" name="menu_list[]" value="{{ $menu->id }}" >
                                            <label class="custom-control-label" for="menu{{ $menu->id }}">{{ $menu->menu_title }}</label>
                                        </div>
                                    </div>
                                    @if($menu->submenus)
                                        @foreach($menu->submenus as $submenu)
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="custom-control custom-checkbox d-inline-block mr-3 mb-3 ml-2">
                                                        <input type="checkbox" class="custom-control-input checksub checks-{{ $menu->id }}" id="menu{{ $submenu->id }}" name="menu_list[]" value="{{ $submenu->id }}">
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
                            <button class="btn btn-sm btn-success float-right">Save</button>
                            <button type="button" class="btn btn-sm btn-light" onclick="location.href='{{ url()->previous() }}'">Cancel</button>
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
                if($(this).is(":checked")){
                    $(".checksub").prop('checked', true);
                }else{
                    $(".checksub").prop('checked', false);
                }
            });

            $(".checkmain").on('click',function(){
                var mid = $(this).val();
                if($(this).is(":checked")){
                    $(".checks-"+mid).prop('checked', true);
                }else{
                    $(".checks-"+mid).prop('checked', false);
                }
            });
        });
    </script>
@endsection
