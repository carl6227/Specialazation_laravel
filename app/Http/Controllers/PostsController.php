<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{


    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {


        $data=request()->validate([
            'caption'=>'required',
            'image'=>['required','image']
        ]);

        $ImagePath=request('image')->store('uploads','public');

        Auth::user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$ImagePath

        ]);
        if(Auth::user()->hasRole('user')){
            return view('userdash');
       
          }elseif(Auth::user()->hasRole('blogwriter')){
          
           return view('blogwriterdash');
          }elseif(Auth::user()->hasRole('admin')){
            return view('dashboard');
      
          }


    }
}
