@extends('layout.template')
@section('title','Universities')
@section('heading','Edit University')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('university.update') }}" method="post">
                @csrf
                <input type="hidden" name="university_id" value="{{ encrypt($university->id) }}">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label class="required" for="university_code">University Code</label>
                            <input type="text" class="form-control @error('university_code') border-danger @enderror" id="university_code" name="university_code" value="{{ old('university_code') ?? $university->university_code }}">
                            @error('university_code')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label class="required" for="university_name">University Name</label>
                            <input type="text" class="form-control @error('university_name') border-danger @enderror" id="university_name" name="university_name" value="{{ old('university_name') ?? $university->university_name }}">
                            @error('university_name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
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
@endsection
