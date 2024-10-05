@extends('layout.settings')
@section('title','Types')
@section('heading','Add Type')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('type.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="name">Name</label>
                                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{ old('name') }}">
                                    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="role" class="required">Role</label>
                                    <select class="custom-select @error('role') border-danger @enderror" id="role" name="role" >
                                        <option value="">Select</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ old('role') == $role->id ? "selected":"" }}>{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')<div class="text-daborder-danger small mt-1 text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            
                        <div class="row">
                            <div class="form-footer pt-5 border-top">
                                <button class="btn btn-sm btn-success float-right">Save</button>
                                <button type="button" class="btn btn-sm btn-light" onclick="location.href='{{ url()->previous() }}'">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
