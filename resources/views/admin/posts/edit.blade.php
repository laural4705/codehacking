@extends('layouts.admin')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Edit Post</h4>
        </div>
        <div class="card-body">
            <div class="row ">
                <div class="col-sm-3">
{{--                    <img src="{{$post->photo ? $post->photo->file : '../../../images/placeholder.jpg'}}" alt="" class="img-responsive img-rounded">--}}
                </div>
                <div class="col-sm-9">
                    {!! Form::model($post, ['method'=>'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files'=>true]) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title:', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::text('title', null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'Body:', ['class' => 'col-lg-2 control-label']) !!}
                        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                    </div>
                    <!-- Select With One Default -->
                    <div class="form-group">
                        {!! Form::label('category_id', 'Category', ['class' => 'col-lg-2 control-label'] )  !!}
                        {!!  Form::select('category_id', [$post->category->name] + $categories, $post->category->id, ['class' => 'form-control' ]) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('photo_id', 'Upload Photo', ['class' => 'col-lg-3 control-label']) !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control']); !!}
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group">
                        {!! Form::submit('Update Post', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                    </div>
                    {!! Form::close() !!}
                <!-- Delete Form -->
                    @if($post->id !== Auth::id())
                        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete Post', ['class' => 'btn btn-lg btn-danger pull-left']) !!}
                        </div>
                        {!! Form::close() !!}
                    @endif
                </div>
                <div class="col-sm-6">
                    @include('includes/form_error')
                </div>
            </div>
        </div>
@endsection
