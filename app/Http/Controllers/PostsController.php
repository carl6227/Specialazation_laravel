<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\facades\Image;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;
use DB;
class PostsController extends Controller
{
  
    public function index() {

        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->get();
        
        return view('posts.index', compact('posts'));

    }

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
     
    return redirect('/dashboard');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/dashboard');
        }
}
