@extends('layouts.app')


@section('content')

<h1>{{$album->name}}</h1>
    <a href="../" class="btn btn-default">Go Back</a>
    
    <a href="../photo/create/{{$album->id}}" class="btn btn-primary">Upload Photo To Album</a>
    <hr>
    
      @if(count($album->photos) > 0)
       <?php 
        $colcount = count($album->photos);
        $i = 1;
        ?>
        <div id="photos">
        <div class="container text-center">
           @foreach($album->photos as $photo)
              @if($i == $colcount)
              <div class="md-4 sm-4">
                  <a href="../photo/{{$photo->id}}">
                      <img src="../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" class="thumbnail" width="300" alt="{{$photo->title}}">
                  </a>
                  <br>
                  <h4>{{$photo->title}}</h4>
               
              @else
               <div class="md-4 sm-4">
                  <a href="../photo/{{$photo->id}}">
                      <img src="../storage/photos/{{$photo->album_id}}/{{$photo->photo}}" class="thumbnail" width="300" alt="{{$photo->title}}">
                  </a>
                  <br>
                  <h4>{{$photo->title}}</h4>
               @endif
               
               @if($i % 3 == 0)
                </div> </div><div class="container text-center">
                    @else
                </div>
                @endif
                <?php $i++; ?>
                 @endforeach
            </div>
         </div>
   
       
        @else
        <p>No Photo to Display</p>
    @endif
     
@endsection