@extends('layout.template')
@section('title','Course')
@section('heading','View Course')
@section('content')
    <div class="card card-primary">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group row">
                        <div class="col-4">Course Code :</div>
                        <div class="col-8 text-danger">{{ $course->course_code }}</div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">Course Name :</div>
                        <div class="col-8 text-danger">{{ $course->course_name }}</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group row">
                        <div class="col-4">University :</div>
                        <div class="col-8 text-danger">{{ $course->university->university_name }}</div>
                    </div>
                </div>
            </div>
            <div class="form-footer pt-5 border-top">
                <button type="button" class="btn btn-sm btn-light" onclick="location.href='{{ url()->previous() }}'">Cancel</button>
            </div>
        </div>
    </div>
@endsection
