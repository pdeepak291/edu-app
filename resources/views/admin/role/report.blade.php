@extends('layout.template')
@section('title','Roles')
@section('heading','Roles')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                {!! actionbuttons(array(3)) !!}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->role_name }}</td>
                                    <td>{!! actionmenus(array(4,5,6),encrypt($role->id)) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection