@extends('layout.settings')
@section('title','Category')
@section('heading','Category')
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
                            <th>Category Name</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + $categories->firstItem() }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{!! actionmenus(array(4,5,6),encrypt($category->id)) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-3">
                    {{ $roles->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection