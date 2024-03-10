@extends('layout.template')
@section('title','Users')
@section('heading','Edit User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ encrypt($user->id) }}">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="name">Name</label>
                                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{ old('name') ?? $user->name }}">
                                    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="role" class="required">Role</label>
                                    @php $role_id = old('role') ?? $user->role_id @endphp
                                    <select class="custom-select @error('role') border-danger @enderror" id="role" name="role" >
                                        <option value="">Select</option>
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $role_id == $role->id ? "selected":"" }}>{{ $role->role_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')<div class="text-daborder-danger small mt-1 text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="gender">Gender</label>
                                    @php $gender = old('gender') ?? $user->gender @endphp
                                    <select class="custom-select @error('gender') border-danger @enderror" id="gender" name="gender">
                                        <option value="">Select</option>
                                        <option value="male" {{ $gender == 'male' ? "selected":"" }}>Male</option>
                                        <option value="female" {{ $gender == 'female' ? "selected":"" }}>Female</option>
                                    </select>
                                    @error('gender')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control @error('dob') border-danger @enderror" id="dob" name="dob" value="{{ old('dob') ?? $user->dob }}">
                                    @error('dob')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="mobile">Mobile</label>
                                    <input type="text" class="form-control @error('mobile') border-danger @enderror" id="mobile" name="mobile" value="{{ old('mobile') ?? $user->mobile }}">
                                    @error('mobile')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="email">Email</label>
                                    <input type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email" value="{{ old('email') ?? $user->email }}">
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
                                    <img src="{{ asset('storage/app/public/uploads/user/photo/thumb/'.$user->image) }}" width="150">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="status">Status</label>
                                    @php $status = old('status') ?? $user->status @endphp
                                    <select class="custom-select @error('status') border-danger @enderror" id="status" name="status">
                                        <option value="">Select</option>
                                        <option value="1" {{ $status == 1 ? "selected":"" }}>Active</option>
                                        <option value="0" {{ $status == 0 ? "selected":"" }}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button class="btn btn-sm btn-success float-right">Update</button>
                            <button type="button" class="btn btn-sm btn-light" onclick="location.href='{{ url()->previous() }}'">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection