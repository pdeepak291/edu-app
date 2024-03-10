@extends('layout.template')
@section('title','Users')
@section('heading','View User')
@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group row">
                        <div class="col-4">Name :</div>
                        <div class="col-8 text-danger">{{ $user->name }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">Role :</div>
                        <div class="col-8 text-danger">{{ $user->role->role_name }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">Gender :</div>
                        <div class="col-8 text-danger">{{ ucwords($user->gender) }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">Mobile :</div>
                        <div class="col-8 text-danger">{{ $user->mobile }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">Email :</div>
                        <div class="col-8 text-danger">{{ $user->email }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">Date of Birth :</div>
                        <div class="col-8 text-danger">{{ $user->dob_formatted }}</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group row">
                        <div class="col-4">Image :</div>
                        <div class="col-8">
                            <img src="{{ asset('storage/app/public/uploads/user/photo/thumb/'.$user->image) }}" width="150">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">Status :</div>
                        <div class="col-8 text-danger">{{ $user->status_text }}</div>
                    </div>
                </div>
            </div>
            <div class="form-footer pt-5 border-top">
                <button type="button" class="btn btn-sm btn-danger" onclick="location.href='{{ url()->previous() }}'">Cancel</button>
            </div>
        </div>
    </div>
@endsection
