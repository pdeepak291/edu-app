@extends('layout.template')
@section('title','Universities')
@section('heading','Universities')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! actionbuttons(array(13)) !!}
            </div>
        </div>
    </div>
    <div class="card card-default">
        <div class="card-body">
            <div class="scroll">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection