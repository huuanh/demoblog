@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Hello Laravel!</h1>

            <p>Hello All!</p>

            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
        </div>
    </div>
    <div class="container">
        @include('partials.post_list')

    </div>

@stop