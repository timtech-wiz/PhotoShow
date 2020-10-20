@extends('layouts.app')


@section('content')

<h3>Create Photo</h3>
            {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            
            <div class="form-group">
                {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Enter  Title'])}}
            </div>
            
             <div class="form-group">
                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter Photo description'])}}
            </div>
            {{ Form::hidden('album_id', $album_id)}}
             <div class="form-group">
                {{ Form::file('photo')}}
            </div>
            
             <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
            
            {!! Form::close() !!}
@endsection