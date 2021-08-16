<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;

use App\Models\Photo;
use App\Models\User;

class photoController extends Controller
{
    public function upload(){
        return view('pages.upload');
    }
    public function ok(){
        return view('pages.home');
    }
    public function upload_confirm(Request $request){
        //  dd($request->all());
        // return dd($request);
        $validatedData = $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $newphotoname = time(). '-'.$request->title.'-'.$request->image->extension();
        // dd($newphotoname);
       $request->image->move(public_path('images'),$newphotoname);
        
        // $request->file('image')->store('public/images/');
        // $destinationPath = public_path('images\\');
        // return var_dump($destinationPath);
        // if ($request->hasFile('image')) {
        //     // $destinationPath = 'path/th/save/file/';
            
        //     $files = $request->file('image'); // will get all files
        //     return dd('dell');
        
        //     foreach ($files as $file) {//this statement will loop through all files.
        //         $file_name = time(). '-'.$request->title.'-'.$request->file; //Get file original name
        //         $file->move($destinationPath , $file_name); // move files to destination folder
        //     }
        // }
      
        
        // dd($test);
        $website = 'http://127.0.0.1:8000/images/';
        $link = $website.$newphotoname;
        $photo = new Photo;
        $photo->title =$request->input('title');
        $photo->user_id = session('id');
        $photo->link = $link;
        $photo->image_path =$newphotoname;
         $photo->save();

      
    
       $message = "You have successfully uploaded ";
        
        return redirect('/dashboard')->with('success', $message); 

    }
    public function dashboard(){
        $photos = Photo::where('user_id', session('id'))->get();
        return view('pages.dashboard',compact('photos'));
    }
    public function download(Request $request,$image){
        return response()->download(public_path('images'.$image));
    }
}
