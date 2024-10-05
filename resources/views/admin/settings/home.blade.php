@extends('layout.settings')
@section('title','Settings')
@section('heading','Settings')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="name">Name</label>
                                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{ old('name') ?? $company->name }}">
                                    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="address">Address</label>
                                    <textarea class="form-control @error('address') border-danger @enderror" id="address" name="address" >{{ old('address') ?? $company->address }}</textarea>                                    @error('address')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                    @error('address')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="mobile">Mobile</label>
                                    <input type="text" class="form-control @error('mobile') border-danger @enderror" id="mobile" name="mobile" value="{{ old('mobile') ?? $company->mobile }}">
                                    @error('mobile')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="email">Email</label>
                                    <input type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email" value="{{ old('email') ?? $company->email }}">
                                    @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="logo">Logo</label>
                                    <input type="file" class="form-control @error('logo') border-danger @enderror" id="logo" name="logo">
                                    @error('logo')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                    <img src="{{ asset('storage/app/public/uploads/company/logo/'.$company->logo) }}" width="150">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="gstno">GSTNO</label>
                                    <input type="text" class="form-control @error('gstno') border-danger @enderror" id="gstno" name="gstno" value="{{ old('gstno') ?? $company->gstno }}">
                                 </div>
                            </div>
                        </div>
                        <div class="form-footer pt-5 border-top">
                            <button class="btn btn-sm btn-success float-right">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endsection