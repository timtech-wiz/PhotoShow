@extends('layouts.app')


@section('content')

<h3>{{$photo->title}}</h3>
           <p>{{$photo->description}}</p>
    <a class="btn btn-default" href="../albums/{{$photo->album_id}}">Back to Gallery</a>
           <img src="../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" class="thumbnail" width="400" alt="{{$photo->title}}">
           <br><br>
            
           <a class="btn btn-default" href="">Edit</a>
           
           {!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
           {{ Form::hidden('_method', 'DELETE')}}
           {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
           
           {!! Form::close() !!}
           
           <hr>
           <small>Size: {{$photo->size}}</small>
            
@endsection