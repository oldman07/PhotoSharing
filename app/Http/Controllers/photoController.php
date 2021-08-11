<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;

class photoController extends Controller
{
    public function upload(){
        return view('pages.upload');
    }
    public function upload_confirm(Request $request){
        // dd($request->all());
        // return dd($request);
        $validatedData = $request->validate([
            'title' => 'required',
            'file' => 'required',
        ]);

        $newphotoname = time(). '-'.$request->title.'-'.$request->file->extension();
        $test= $request->file->move(public_path('images'),$newphotoname);
        // dd($test);
        $photo = new Photo;
        $photo->title =$request->input('title');
        $photo->user_id = session('id');
        $photo->image_path =$newphotoname;
         $photo->save();

      
    
       $message = "You have successfully uploaded ";
        
        return redirect('/')->with('success', $message); 

    }
    public function dashboard(){
        $photos = Photo::where('user_id', session('id'))->get();
        return view('pages.dashboard',compact('photos'));
    }
}
