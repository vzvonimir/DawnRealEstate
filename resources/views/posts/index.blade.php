@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2 mt-2">
        <a href="{{route('posts.create')}}" class="btn btn-success">Add Property</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Properties</div>
        <div class="card-body">
            <div class="table-responsive">
           @if($posts->count() > 0)
            <table class="table">
                <thead>
                    <th>Image</th>
                    <th>Title</th>
                    @if(auth()->user()->isAdmin())
                        <th>Author</th>
                    @endif
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><img width="130" height="80" src="{{asset('storage/cover_images/'.$post->image)}}"></td>
                            <td>{{$post->title}}</td>
                            @if(auth()->user()->isAdmin())
                                <td>
                                    @foreach($users as $user)
                                    @if($user->id === $post->user_id)
                                        {{$user->name}}
                                    @endif
                                    @endforeach
                                </td>
                            @endif
                            <td>
                                {{$post->category->name}}
                                <!--<a href="{{route('categories.edit', $post->category->id)}}">{{$post->category->name}}</a>-->
                            </td>
                            @if($post->trashed())
                            <td>
                                <form action="{{ route('restore-posts', $post->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info btn-sm">Restore</button>
                                </form>
                            </td>
                            @else
                            <td>
                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-info btn-sm">Edit</a>
                            </td>
                            @endif
                            <td>
                                <form action="{{route('posts.destroy', $post->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{$post->trashed() ? 'Delete' : 'Trash'}}
                                    </button>
                                </form>
                            </td>
                        </tr>
                
                    @endforeach
                    
                </tbody>
                <tfoot>
                    <tr><td>{{$posts->links()}}</td></tr>
                </tfoot>
            </table>
            </div>
            @else
                <h3>You have no properties.</h3>
            @endif
        </div>
    </div>

@endsection