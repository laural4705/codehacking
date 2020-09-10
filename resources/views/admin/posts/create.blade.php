@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Create Post</h4>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-sm-12">
                    {!! Form::open(['url' => '/admin/posts', 'files'=>'true']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title:', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::text('title', $value = null, ['class' => 'form-control', 'placeholder' => 'Title']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Body:', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::textarea('body', $value = null, ['class' => 'form-control', 'placeholder' => 'Body of Text']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category', ['class' => 'col-lg-2 control-label'] )  !!}
                        {!! Form::select('category_id', [''=>'Choose Category'] + $categories,  null, ['class' => 'form-control' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo_id', 'Upload Photos', ['class' => 'col-lg-3 control-label']) !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control']); !!}
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            {!! Form::submit('Create Post', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
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
