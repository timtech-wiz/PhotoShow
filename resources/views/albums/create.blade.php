@extends('layouts.app')


@section('content')

<h3>Create Album</h3>
            {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            
            <div class="form-group">
                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter album name'])}}
            </div>
            
             <div class="form-group">
                {{ Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Enter the description'])}}
            </div>
            
             <div class="form-group">
                {{ Form::file('cover_image')}}
            </div>
            
             <div class="form-group">
                {{ Form::submit('Submit', ['class' => 'btn btn-primary'])}}
            </div>
            
            {!! Form::close() !!}
@endsection