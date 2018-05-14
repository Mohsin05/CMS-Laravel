@extends('layouts.admin')




@section('content')


    <h1>Categories</h1>
<div class="col-sm-6">

    {!! Form::open(['action' => 'AdminCategoriesController@store', 'method' => 'POST']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Category', ['class'=>'btn btn-info']) !!}
        </div>

        {{csrf_field()}}
    {!! Form::close() !!}


</div>
    <div class="col-sm-6">


        @if($categories)

        <table class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Created date</th>
              </tr>
            </thead>

            @foreach($categories as $category)

            <tbody>
              <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->created_at ? $category->created_at ->diffForHumans() : 'no date'}}</td>
              </tr>

            @endforeach


            </tbody>
          </table>
        @endif


    </div>



@endsection