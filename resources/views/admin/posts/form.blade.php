<!-- Title Form Input -->
<div class="form-group col-md-8">
    {!! Form::label('title','Title:',['class'=>'control-label']) !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<!-- Author Form Input -->
<div class="form-group col-md-4">
    {!! Form::label('user_id','Author:',['class'=>'control-label']) !!}
    {!! Form::select('user_id',App\User::lists('name','id'),Auth::user()->id,['class'=>'form-control']) !!}
</div>
<div class="form-group col-md-6">
    @if($post->image)
        <a href="#" class="thumbnail">
        <img src="{{$post->imageLink()}}" alt=""/>
            </a>
        @endif

                <!-- Image Form Input -->
        {!! Form::label('image','Upload image:',['class'=>'control-label']) !!}
        {!! Form::file('image',['class'=>'form-control']) !!}
</div>
<div class="col-md-6">
    <!-- Categories Form Input -->
    <div class="form-group col-md-12">
            {!! Form::label('categories[]','Categories:',['class'=>'control-label']) !!}
            {!! Form::select('categories[]',
                \App\Category::lists('name','id'),
                $post->categories()->lists('id')->toArray(),
                ['class'=>'form-control','multiple']) !!}
    </div>
    
    <!-- Description Form Input -->
    <div class="form-group col-md-12">
        {!! Form::label('description','Description:',['class'=>'control-label']) !!}
        {!! Form::textarea('description',null,['class'=>'form-control','rows'=>'3']) !!}
    </div>

</div>

<!-- Content Form Input -->
<div class="form-group col-md-12">
    {!! Form::label('body','Content:',['class'=>'control-label']) !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}
</div>