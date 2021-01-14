@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">{{isset($post) ? 'Edit Post' : 'Create Post'}}</div>
        <div class="card-body">
            @include('partials.errors')
            {!! Form::open(['action' => isset($post)? ['PostsController@update',$post->id] : 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title',isset($post) ? $post->title : '', ['class' => 'form-control', 'placeholder' => 'Title'  ])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description',isset($post) ? $post->description : '', ['class' => 'form-control', 'placeholder' => 'Description Text', 'cols' => '5', 'rows' => '5'])}}
            </div>
            <div class="form-group">
                {{Form::label('location', 'Location')}}
               {{Form::text('location',isset($post) ? $post->location : '', ['class' => 'form-control', 'placeholder' => 'Location'])}}
                
            </div>
            <div class="form-group">
                {{Form::label('price', 'Price')}}
                {{Form::text('price',isset($post) ? $post->price : '', ['class' => 'form-control', 'placeholder' => 'Price', 'id' => 'price'])}}
            </div>
            @if(isset($post))
                <div class="form-group">
                    <img src="/storage/cover_images/{{$post->image}}" alt="" width="100%">
                </div>
            @endif
            <div class="form-group">
                {{Form::label('image', 'Image')}}
                {{Form::file('cover_image', ['class' => 'form-control-file'])}}
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category" class="form-control form-control-sm">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                            @if(isset($post))
                            @if($category->id === $post->category_id)
                                selected
                            @endif
                            @endif
                            >
                            {{$category->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            @if($tags->count() > 0)
            <div class="form-group">
                <label for="tags">Tags</label>
                <select name="tags[]" id="tags" class="form-control form-control-sm tags-selector" multiple>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}"
                            @if(isset($post))
                            @if($post->hasTag($tag->id))
                                selected
                            @endif
                            @endif
                            >
                            {{$tag->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            @endif
            {{Form::submit(isset($post)?'Update Post' : 'Create Post', ['class' => 'btn btn-success'])}}
        {!! Form::close() !!}
        </div>
    </div>
@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection

@section('css')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection