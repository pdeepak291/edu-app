@extends('layout.Settings')
@section('title','Types')
@section('heading','Edit Type')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('type.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="type_id" value="{{ encrypt($type->id) }}">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="name">Type</label>
                                    <input type="text" class="form-control @error('name') border-danger @enderror" id="name" name="name" value="{{ old('name') ?? $type->type }}">
                                    @error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label for="Category" class="required">Category</label>
                                    @php $role_id = old('role') ?? $user->role_id @endphp
                                    <select class="custom-select @error('role') border-danger @enderror" id="role" name="role" >
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category_id == $category->id ? "selected":"" }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('role')<div class="text-daborder-danger small mt-1 text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="Amount">Amount</label>
                                    <input type="text" class="form-control @error('Amount') border-danger @enderror" id="amount" name="amount" value="{{ old('amount') ?? $type->amount }}">
                                    @error('amount')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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