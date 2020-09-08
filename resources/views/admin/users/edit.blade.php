@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Users</h4>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-sm-3">
                    <img src="{{$user->photo ? $user->photo->file : '../../../images/guest.jpg'}}" alt="" class="img-responsive img-rounded">
                </div>
                <div class="col-sm-9">
                    {!! Form::model($user, ['method'=>'PATCH', 'action' => ['AdminUsersController@update', $user->id], 'files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::email('email', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Password -->
                    <div class="form-group">
                        {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Optional - Change Password']) !!}
                    </div>
                    <!-- Select With One Default -->
                    <div class="form-group">
                        {!! Form::label('role_id', 'Role', ['class' => 'col-lg-2 control-label'] )  !!}
                        {!!  Form::select('role_id', [$user->role->name] + $roles, $user->role->id, ['class' => 'form-control' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('is_active', 'Active', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::checkbox('is_active') !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo_id', 'Upload Photos', ['class' => 'col-lg-3 control-label']) !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control']); !!}
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::submit('Update User Information', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-sm-6">
                    @include('includes/form_error')
                </div>
            </div>
        </div>
@endsection
