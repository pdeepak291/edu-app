@extends('layout.template')
@section('title','Courses')
@section('heading','Edit Course')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('course.update') }}" method="post">
                @csrf
                <input type="hidden" name="course_id" value="{{ encrypt($course->id) }}">
                <div class="row">
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label class="required" for="course_code">Course Code</label>
                            <input type="text" class="form-control @error('course_code') border-danger @enderror" id="course_code" name="course_code" value="{{ old('course_code') ?? $course->course_code }}">
                            @error('course_code')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label class="required" for="course_name">Course Name</label>
                            <input type="text" class="form-control @error('course_name') border-danger @enderror" id="course_name" name="course_name" value="{{ old('course_name') ?? $course->course_name }}">
                            @error('course_name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="form-group">
                            <label for="university" class="required">University</label>
                            @php $university_id = old('university') ?? $course->university_id @endphp
                            <select class="custom-select @error('university') border-danger @enderror" id="university" name="university" >
                                <option value="">Select</option>
                                @foreach($universities as $university)
                                    <option value="{{ $university->id }}" {{ $university_id == $university->id ? "selected":"" }}>{{ $university->university_name }}</option>
                                @endforeach
                            </select>
                            @error('university')<div class="text-daborder-danger small mt-1 text-danger">{{ $message }}</div>@enderror
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
