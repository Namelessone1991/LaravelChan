<?php

namespace App\Http\Controllers;

use App\thread; 
use App\posts; 
use Illuminate\Http\Request;

use App\Http\Requests\threadRequest;
use App\Http\Requests\postRequest;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image; 


class mainController extends Controller
{
    
   public function index()
   {

      return view('board.index');
   }


public function postComment($thread,postRequest $postRequest)
{


  $post = new posts; 

  if ($postRequest->hasFile('image'))
  {

       $image = $postRequest->file('image');

       $filename = time().'.'.$image->getClientOriginalExtension(); 
       Image::make($image)->save(public_path('/uploads/images/'.$filename));

       $post->image = $filename; 
  }




  $post->fill($postRequest->only('title'));

  $post->comment = nl2br($postRequest->comment);

  $post->thread_id = $thread;
   
  $post->save(); 

  

  return redirect()->route('thread_path', ['thread' => $thread]);


}



  public function showThread(thread $thread)
  {
    $threadPosts = posts::where('thread_id',$thread->id)->get();   

    return view('board.thread')->with('thread',$thread)->with('threadPosts',$threadPosts);  

  }



   public function newThread(threadRequest $request)
   {

    
     $thread = new thread; 
        
    if ($request->hasFile('image'))
    {

         $image = $request->file('image');

         $filename = time().'.'.$image->getClientOriginalExtension(); 
         Image::make($image)->save(public_path('/uploads/images/'.$filename));
         
        $height =   Image::make($image)->height();  

        $width = Image::make($image)->width();
        
        
       


         $thread->title = $request->title; 
         $thread->comment = nl2br($request->comment); 
         $thread->image = $filename; 
         $thread->save(); 


         //return view('board.thread')->with('thread',$thread);


        

          
          return redirect()->route('thread_path', ['thread' => $thread]);
          

    }



     //return dd($file); 


     //$thread->fill($request->only('title','comment','image'));

     //$thread->save();

       //->with('thread',$thread);

   }

}
