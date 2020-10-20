<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
      public function index(){
        $photo = Photo::with('photos')->get();
        return view('photos.index')->with('albums', $album);
    }
    
    public function create($album_id){
        return view('photos.create')->with('album_id', $album_id);
    }
    
   
     public function store(Request $request){
         $this->validate($request, [
             'title' => 'required',
             'description' => 'required',
             'photo' => 'image|nullable|max:1999'
         ]);
         if($request->hasFile('photo')){
         // validate cover image
         $fileNameWithExt = $request->file('photo')->getClientOriginalName();
         
         $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
         
         $fileExt = $request->file('photo')->getClientOriginalExtension();
         
         $fileNameToStore = $filename.'_'. time() .'.'. $fileExt;
         
         $path = $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $fileNameToStore);
         }else{
           $fileNameToStore = 'nophoto.jpg';  
         }
         
         
         $photo = new Photo();
         $photo->album_id = $request->input('album_id');                                 $photo->title = $request->input('title');
         $photo->description = $request->input('description');
         $photo->photo = $fileNameToStore;
         $photo->size = $request->file('photo')->getClientSize();                                          
         $photo->save();
         return redirect('/albums/'.$request->input('album_id'))->with('success', 'Photo Uploaded');
    }
    
    public function show($id){
        $photo = Photo::find($id);
         return view('photos.show')->with('photo', $photo);
    }
    
    public function destroy($id){
        $photo = Photo::find($id);
        
        if(Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)){
         $photo->delete();   
         return redirect('./')->with('success', 'Photo Deleted');
        }
    }
    
}
