@extends('admin.layouts.master')
@section('footer')
    <script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@stop

@section('content')
    <div class="container">
        <h1>Edit Post: {{$post->title}}</h1>
        {!!Form::model($post,[
        'route'=>['admincp.posts.update',$post->id],
        'method'=>'PATCH',
        'files'=>true,
        ])!!}

        @include('admin.posts.form')

        <div class="form-actions fluid col-md-12">
            {!! Form::submit('Update',['class'=>'btn btn-primary col-md-offset-4']) !!}
            <a class="btn btn-default" href="{!! URL::previous() !!}">Quay lại</a>
        </div>
        {!! Form::close() !!}

    </div>

@stop