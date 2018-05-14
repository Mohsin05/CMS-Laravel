@extends('layouts.admin')


@section('styles')

    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" >

@endsection


@section('content')

    <h1>Upload Media</h1>

    {!! Form::open(['method' => 'POST','action' => 'AdminMediaController@store', 'class'=>'dropzone']) !!}


        {{csrf_field()}}
    {!! Form::close() !!}



@endsection




@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js">
    </script>


@stop