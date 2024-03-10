@extends('layout.template')
@section('title','Users')
@section('heading','Users')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! actionbuttons(array(8)) !!}
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