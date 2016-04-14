<div class="widget" id="widget-page-title">
    <h3>
        Laravel Viet Blog
    </h3>
</div>
<div class="widget">
    <h3 class="widget-title">
        Categories
    </h3>
    <ul class="widget-categories-list">
        <?php
        $categories = \App\Category::orderBy( 'name' )->get(); ?>
        @foreach($categories as $category)
            <li><a href="{{$category->link()}}">{{$category->name}}</a></li>

        @endforeach

    </ul>
</div>

<div class="widget">
    <h3 class="widget-title">
        Latest Posts
    </h3>
    <ul>
        @foreach(\App\Post::latestPosts() as $post)
            <li><a href="{{$post->link()}}">{{$post->title}}</a> <br> {{$post->created_at->format('d/m/Y')}}</li>
        @endforeach
    </ul>

</div>