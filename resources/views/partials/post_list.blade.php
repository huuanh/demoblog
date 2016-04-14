@foreach($posts as $post)
    <article class="col-md-12">
        <h3 class="post-title">
            <a href="{{$post->link()}}">{{$post->title}}</a>
        </h3>

        <div class="col-md-12">
            <span class="published-date">{{$post->created_at->format('d/m/Y')}}</span>
            <span class="author">{{$post->user->name}}</span>
            @foreach($post->categories as $category)
                <span>
                                <a class="label label-primary"
                                   href="{{$category->link()}}">{{$category->name}}</a></span>
            @endforeach
        </div>


        <div style="margin-top: 40px;">
            <div class="col-md-3">
                <a href="{{$post->link()}}" class="thumbnail">
                    <img src="{{$post->imageLink()  }}" style="height: 160px; width: 100%; display: block;">
                </a>
            </div>
            <div class="col-md-9">
                <p class="description">
                    {{$post->description}}
                </p>

                <p>
                    <a href="{{$post->link()}}">Xem thêm...</a>
                </p>
            </div>
        </div>

    </article>

@endforeach
{!!$posts->render() !!}