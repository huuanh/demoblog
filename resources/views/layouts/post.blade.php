@extends('layouts.master_with_sidebar')
@section('content')
    <div class="row">
        <article class="col-md-12">
            <div class="page-header">
               <h3> {{$post->title}}</h3>
                <p style="font-style: italic;">{{str_limit($post->description,390)}}</p>

            </div>

            <div style="margin-top: 40px;">
                <div class="col-md-12">
                    <div class="thumbnail">
                        <img src="{{$post->imageLink()  }}">
                    </div>
                </div>
                <div class="col-md-12">
                    <span class="published-date">{{$post->created_at->format('d/m/Y')}}</span>
                    <span class="author">{{$post->user->name}}</span>
                </div>
                <div class="col-md-12">
                    Categories:
                    @foreach($post->categories as $category)
                        <span>
                                <a class="label label-primary"
                                   href="{{$category->link()}}">{{$category->name}}</a></span>
                    @endforeach
                </div>

                <div class="col-md-12 post-body">
                    <hr>

                    {!! $post->body !!}
                </div>
            </div>

        </article>

    </div>
    <div class="row">
        <div class="col-md-12">
            <legend>Related Posts</legend>
            <ul class="related-posts">
                @foreach($post->relatedPosts() as $post)
                    <li><a href="{{$post->link()}}">{{$post->title}}</a>  - {{$post->created_at->format('d/m/Y')}}</li>
                @endforeach
            </ul>
        </div>
    </div>

@stop