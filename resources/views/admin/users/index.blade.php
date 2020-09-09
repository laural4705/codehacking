@extends('layouts.admin')
@section('content')
    @if(Session::has('created_user'))
        <div class="alert alert-success">
            <p>{{session('created_user')}}</p>
        </div>
    @endif
    @if(Session::has('updated_user'))
        <div class="alert alert-success">
            <p>{{session('updated_user')}}</p>
        </div>
    @endif
    @if(Session::has('deleted_user'))
        <div class="alert alert-danger">
            <p>{{session('deleted_user')}}</p>
        </div>
    @endif
    <h1>Actives Users</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Name</th>
            <th scope="col">Photo</th>
          <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
          <th scope="col">Created</th>
          <th scope="col">Updated</th>
        </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
          @if($user->IsActive())
                <tr @if($user->is_active != 1) class="danger" @else class="success" @endif>
                    <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td><img height="50" src="{{$user->photo ? $user->photo->file : '../images/guest.jpg'}}" alt="" /></td>
                  <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td >{{$user->is_active==1 ? 'Active' : 'Not Active'}}</td>
                  <td>{{$user->created_at->diffForHumans()}}</td>
                  <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endif
        @endforeach
      </tbody>
    </table>
    <hr />
    <h1>Inactive Users</h1>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Photo</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                @if(!$user->IsActive())
                    <tr @if($user->is_active != 1) class="danger" @else class="success" @endif>
                        <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td><img height="50" src="{{$user->photo ? $user->photo->file : '../images/guest.jpg'}}" alt="" /></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td >{{$user->is_active==1 ? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
