@extends('admin.layouts.master')
@section('content')
    <h2>All Categories</h2>
    <p><a class="btn btn-success" href="{{URL::route('admincp.categories.create')}}">Create new Category</a></p>

    <table class="table">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th class="col-md-1"></th>
        <th class="col-md-1"></th>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td><a class="btn btn-primary" href="{{URL::route('admincp.categories.edit',$category->id)}}">Edit</a></td>
            <td><a class="btn btn-danger" href="#">Delete</a></td>
        </tr>
            @endforeach
        </tbody>
    </table>
@stop