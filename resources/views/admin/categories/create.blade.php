@extends('admin.layouts.master')
@section('content')
    <h2>Create new Category</h2>

    {!!Form::model($category,[
        'route'=>'admincp.categories.store',
    ])!!}
    @include('admin.categories.form')

    <div class="form-actions fluid col-md-12">
         {!!Form::submit('Create',['class'=>'btn btn-success col-md-offset-4'])!!}
         <a class="btn btn-default" href="{!!URL::previous()!!}">Quay lại</a>
    </div>



    {!!Form::close()!!}

@stop