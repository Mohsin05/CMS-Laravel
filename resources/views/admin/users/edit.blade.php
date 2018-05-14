@extends('layouts.admin')




@section('content')


    <h1>Edit Users</h1>
    <div class="row">
    <div class="col-sm-3">
    <img class="img-responsive img-rounded"  src="{{$user->photo? URL::to($user->photo->file) : 'http://placehold.it/400x400'}}" alt="" >
    </div>
    <div class="col-sm-9">
    {!! Form::model($user,['method'=>'PATCH', 'action'=> ['AdminUsersController@update',$user->id],'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', $roles , null, ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('is_active', 'Status:') !!}
        {!! Form::select('is_active', array(1 => 'Active', 0=> 'Not Active'), 0 , ['class'=>'form-control'])!!}
    </div>


    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control'])!!}
    </div>



    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control'])!!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit User', ['class'=>'btn btn-primary col-sm-6']) !!}
    </div>

    {!! Form::close() !!}



        {!! Form::open(['action' => ['AdminUsersController@destroy', $user->id], 'method' => 'DELETE']) !!}


            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>

            {{csrf_field()}}

        {!! Form::close() !!}



    </div>
    </div>
    <div class="row">
    @include('includes.form_error')
    </div>


@stop