@extends('layouts.admin')




@section('content')


    <h1>Categories</h1>
    <div class="col-sm-6">

        {!! Form::model($category ,['action' => ['AdminCategoriesController@update', $category->id], 'method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Category', ['class'=>'btn btn-info']) !!}
        </div>

        {{csrf_field()}}
        {!! Form::close() !!}


    </div>

    <div class="col-sm-6">




    </div>



@endsection