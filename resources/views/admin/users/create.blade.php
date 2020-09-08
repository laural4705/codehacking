@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Create Users</h4>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/users', 'files'=>'true']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Name:', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::text('name', $value = null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', 'Email:', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::email('email', $value = null, ['class' => 'form-control', 'placeholder' => 'E-mail Address']) !!}
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            {!! Form::label('password', 'Password:', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::password('password',['class' => 'form-control', 'placeholder' => 'Password']) !!}
                        </div>
                        <!-- Select With One Default -->
                        <div class="form-group">
                            {!! Form::label('role_id', 'Role', ['class' => 'col-lg-2 control-label'] )  !!}
                            {!!  Form::select('role_id', [''=>'Choose Role'] + $roles,  '3', ['class' => 'form-control' ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Active', ['class' => 'col-lg-2 control-label']) !!}
                            {!! Form::checkbox('is_active', 1, null ) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('photo_id', 'Upload Photos', ['class' => 'col-lg-3 control-label']) !!}
                            {!! Form::file('photo_id', null, ['class'=>'form-control']); !!}
                        </div>
                        <!-- Submit Button -->
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                {!! Form::submit('Create User', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
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
