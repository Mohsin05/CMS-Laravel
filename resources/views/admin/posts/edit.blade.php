@extends('layouts.admin')

@section('content')


    <h1>Edit Posts</h1>



    <div class="row">

        <div class="col-sm-3">
            <img class="img-responsive img-rounded"  src="{{$post->photo? URL::to($post->photo->file) : 'http://placehold.it/400x400'}}" alt="" >
        </div>

        <div class="col-sm-9">

        {!! Form::model($post,['action' => ['AdminPostsController@update',$post->id],'files'=>true, 'method' => 'PATCH']) !!}

        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title',null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Categories:') !!}
            {!! Form::select('category_id', $categories,null, ['class'=>'form-control'])!!}
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
            {!! Form::submit('Edit User', ['class'=>'btn btn-primary col-sm-6']) !!}

        </div>
        {{csrf_field()}}

        {!! Form::close() !!}



        {!! Form::open(['action' => ['AdminPostsController@destroy', $post->id], 'method' => 'DELETE']) !!}


        <div class="form-group">
            {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>

        {{csrf_field()}}

        {!! Form::close() !!}
    </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>
@endsection