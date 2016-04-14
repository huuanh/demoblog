@include('partials.head')
<body>
@include('partials.main_nav')
<div class="container">
    <div class="col-md-9">
        @yield('content')
    </div>
    <div class="col-md-3 sidebar">
        @include('partials.sidebar')
    </div>
</div>

@include('partials.footer_content')
@include('partials.footer')