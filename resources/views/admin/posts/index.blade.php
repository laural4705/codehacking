@extends('layouts.admin')
@section('content')
    @if(Session::has('created_post'))
        <div class="alert alert-success">
            <p>{{session('created_post')}}</p>
        </div>
    @endif
    @if(Session::has('updated_post'))
        <div class="alert alert-success">
            <p>{{session('updated_post')}}</p>
        </div>
    @endif
    @if(Session::has('deleted_post'))
        <div class="alert alert-danger">
            <p>{{session('deleted_psot')}}</p>
        </div>
    @endif
    <h1>Posts</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Photo</th>
            <th scope="col">User</th>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td><img height="50" src="{{$post->photo ? $post->photo->file : '../images/placeholder.jpg'}}" alt="" /></td>
                    <td><a href="{{route('users.edit', $post->user->id)}}">{{$post->user->name}}</a></td>
                    <td>{{$post->category->name}}</td>
                    <td><a href="{{route('posts.edit', $post->user->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
