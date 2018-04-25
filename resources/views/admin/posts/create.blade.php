@extends('layouts.admin')

@section('content')


    <h1>Create Posts</h1>
    <div class="row">
    {!! Form::open(['action' => 'AdminPostsController@store','files'=>true, 'method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title',null, ['class'=>'form-control']) !!}
        </div>

         <div class="form-group">
            {!! Form::label('category_id', 'Title:') !!}
            {!! Form::select('category_id',array('1' => 'PHP','0' => 'Javascript'),null, ['class'=>'form-control'])!!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}
            {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description:') !!}
            {!! Form::textarea('body',null, ['class'=>'form-control','rows'=>3]) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Create Post', ['class'=>'btn btn-info']) !!}
        </div>

        {{csrf_field()}}

    {!! Form::close() !!}
    </div>

    <div class="row">
    @include('includes.form_error')
    </div>
@endsection