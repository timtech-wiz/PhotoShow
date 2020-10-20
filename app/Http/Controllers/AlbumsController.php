<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index(){
        $album = Album::with('photos')->get();
        return view('albums.index')->with('albums', $album);
    }
    
    public function create(){
        return view('albums.create');
    }
    
     public function store(Request $request){
         $this->validate($request, [
             'name' => 'required',
             'description' => 'required',
             'cover_image' => 'image|nullable|max:1999'
         ]);
         if($request->hasFile('cover_image')){
         // validate cover image
         $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
         
         $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
         
         $fileExt = $request->file('cover_image')->getClientOriginalExtension();
         
         $fileNameToStore = $filename.'_'. time() .'.'. $fileExt;
         
         $path = $request->file('cover_image')->storeAs('public/album_covers', $fileNameToStore);
         }else{
           $fileNameToStore = 'noimage.jpg';  
         }
         
         
         $album = new Album();
         $album->name = $request->input('name');
         $album->description = $request->input('description');
         $album->cover_image = $fileNameToStore;
         $album->save();
         return redirect('/')->with('success', 'Album Created');
    }
    
    
    public function show($id){
        $album = Album::with('photos')->find($id);
        return view('albums.show')->with('album', $album);
        
    }
}
