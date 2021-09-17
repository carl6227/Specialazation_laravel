<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\facades\Image;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use App\Models\User;
use DB;
class PostsController extends Controller
{
  
    

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {


        $data=request()->validate([
            'title'=>'required',
            'caption'=>'required',
            'image'=>'required|image',
        ]);
      
        $ImagePath=request('image')->store('uploads','public');
        
        $image=Image::make(public_path("storage/{$ImagePath}"))->fit(1500,1500);
        $image->save();          


        Auth::user()->posts()->create([
            'title'=>$data['title'],
            'caption'=>$data['caption'],
            'image'=>$ImagePath,
            'isApproved'=>'false'

        ]);
       
            return redirect('/dashboard');
       


    }

    public function show (Post $post)
    {
       return view('posts/show',compact('post'));
      
    }
    public function edit(Post $post){
       
    $post->update(['isApproved'=>'true']);
     
    return redirect('/posts.show');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/dashboard');
        }

        public function editinfo(Post $post)
  {
   
   return view('posts.edit',compact('post')); 
  }
  
  public function update(Post $post)
  {

    $post->update(['title'=>request('title')]);
    $post->update(['caption'=>request('caption')]);
    $ImagePath=request('image')->store('upload','public');
   
    $image=Image::make(public_path("storage/{$ImagePath}"))->resize(1200,1200);
    $image->save();
    $post->update(['image'=>$ImagePath]);


  return redirect("/p/$post->id");

  }
        
}