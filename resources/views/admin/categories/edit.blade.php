@extends('admin.layouts.master')
@section('content')
    <h2>Edit Category: {{$category->name}}</h2>
    {!!
        Form::model($category,[
            'route'=>['admincp.categories.update',$category->id],
            'method'=>'PATCH',
        ])

    !!}




    @include('admin.categories.form')
    <div class="form-actions fluid col-md-12">
         {!! Form::submit('Update',['class'=>'btn btn-primary col-md-offset-4']) !!}
         <a class="btn btn-default" href="{!! URL::previous() !!}">Quay lại</a>
    </div>

    {!!
    Form::close()
    !!}
@stop