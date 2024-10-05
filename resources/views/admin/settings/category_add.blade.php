@extends('layout.settings')
@section('title','Category')
@section('heading','Add Category')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.save') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="form-group">
                                    <label class="required" for="role_name">Category Name</label>
                                    <input type="text" class="form-control @error('category_name') border-danger @enderror" id="category_name" name="category_name" value="{{ old('category_name') }}">
                                    @error('category_name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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

