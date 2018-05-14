@extends('layouts.admin')



@section('content')

<h1>Media</h1>

@if($photos)

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created</th>

      </tr>
    </thead>
    <tbody>

@foreach($photos as $photo)

      <tr>
        <td>{{$photo->id}}</td>
          <td> <img height="50" src="{{$photo->file? URL::to($photo->file) : 'http://placehold.it/400x400'}}" alt="" ></td>
        <td>{{$photo->created_at ? $photo->created_at : 'no date'}}</td>
          <td>

              {!! Form::open(['action' =>['AdminMediaController@destroy', $photo->id], 'method' => 'DELETE']) !!}
                            <div class="form-group">
                  {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
              </div>

              {{csrf_field()}}
          {!! Form::close() !!}
          </td>
      </tr>

@endforeach

    </tbody>
  </table>

@endif

    @endsection