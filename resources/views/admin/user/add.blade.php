@extends('layout.template')
@section('title','Users')
@section('heading','Add User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.save') }}" method="post" enctype="multipart/form-data">
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
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="gender">Gender</label>
                                    <select class="custom-select @error('gender') border-danger @enderror" id="gender" name="gender">
                                        <option value="">Select</option>
                                        <option value="male" {{ old('gender') == 'male' ? "selected":"" }}>Male</option>
                                        <option value="female" {{ old('gender') == 'female' ? "selected":"" }}>Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') border-danger @enderror" id="dob" name="dob" value="{{ old('dob') }}">
                                    @error('dob')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="mobile">Mobile</label>
                                    <input type="text" class="form-control @error('mobile') border-danger @enderror" id="mobile" name="mobile" value="{{ old('mobile') }}">
                                    @error('mobile')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="email">Email</label>
                                    <input type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email" value="{{ old('email') }}">
                                    @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') border-danger @enderror" id="image" name="image">
                                    @error('image')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
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
