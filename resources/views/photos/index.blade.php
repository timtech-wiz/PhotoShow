@extends('layouts.app')


@section('content')
<h3>Albums</h3>
    @if(count($albums) > 0)
       <?php 
        $colcount = count($albums);
        $i = 1;
        ?>
        <div id="album">
        <div class="container text-center">
           @foreach($albums as $album)
              @if($i == $colcount)
              <div class="md-4 sm-4">
                  <a href="albums/{{$album->id}}">
                      <img src="storage/album_covers/{{$album->cover_image}}" class="thumbnail" width="300" alt="{{$album->name}}">
                  </a>
                  <br>
                  <h4>{{$album->name}}</h4>
               
              @else
               <div class="md-4 sm-4">
                  <a href="albums/{{$album->id}}">
                      <img src="storage/album_covers/{{$album->cover_image}}" class="thumbnail" width="300" alt="{{$album->name}}">
                  </a>
                  <br>
                  <h4>{{$album->name}}</h4>
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
        <p>No Album to Display</p>
    @endif
    
@endsection