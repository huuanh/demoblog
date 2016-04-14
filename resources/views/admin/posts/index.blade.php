@extends('admin.layouts.master')

@section('content')

    <div class="container">
        <h1>Show All Posts</h1>

        <p>
            <a href="{{URL::route('admincp.posts.create')}}" class="btn btn-success">Create new Posts</a></p>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>Imaage</th>
            <th>Title</th>
            <th>Categoríe</th>
            <th class="col-md-1"></th>
            <th class="col-md-1"></th>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img src="{{$post->imageLink()}}" style="height: 40px;" alt=""/></td>
                    <td><a href="{{$post->link()}}">{{$post->title}}</a></td>
                    <td>
                        <ul class="categories-list">
                            @foreach($post->categories as $category)
                                <li><a class="label label-primary" href="{{$category->link()}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </td>
                    <td><a class="btn btn-primary" href="{{URL::route('admincp.posts.edit',$post->id)}}">Edit</a></td>
                    <td>
                        <a class="btn btn-danger delete-button" href="#">Delete</a>
                        {!!Form::open([
                        'route'=>['admincp.posts.destroy',$post->id],
                        'method'=>'DELETE',
                        ])!!}

                        {!!Form::submit('DELETE',['style'=>'display:none','class'=>'delete-submit'])!!};

                        {!!Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {!!$posts->render() !!}
    </div>

@stop