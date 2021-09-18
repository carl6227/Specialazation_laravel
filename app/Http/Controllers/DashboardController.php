<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use DB;
use App\Models\Post;
use App\Models\Comments;
use Intervention\Image\facades\Image;
class DashboardController extends Controller
{

  public function index()
  {
   

    if(Auth::user()->hasRole('blogwriter')){
      $userID=Auth::user()->id;
      $PendingPost = DB::table('posts')->where([['isApproved','false'],['user_id',"$userID"]])->paginate(2);
      $ApprovedPost = DB::table('posts')->where([['isApproved','true'],['user_id',"$userID"]])->paginate(2);
      $blogwriters = DB::table('users')->where([['username','!=','Admin'],['id','!=',Auth::user()->id]])->get();
      $users = Auth::user()->following()->pluck('profiles.user_id');

      $followingPosts = Post::whereIn('user_id', $users)->latest()->paginate(2);
      
   
      
   
      return view('blogwriterdash',['approvedPosts'=>$ApprovedPost,'pendingPosts'=>$PendingPost,'blogwriters'=>$blogwriters,'followingPosts'=>$followingPosts]);
     
     
    }elseif(Auth::user()->hasRole('admin')){
      $PendingPost = DB::table('posts')->where('isApproved','false')->get();
      $ApprovedPost = DB::table('posts')->where('isApproved','true')->get();
      $BlogWriters = DB::table('users')->where('username','!=','Admin')->get();
      return view('dashboard',['blogwriters'=>$BlogWriters,'pendingPost'=>$PendingPost,'approvedPost'=>$ApprovedPost]);
    }
    else
    {
      return view('auth/login');
    }

    

    
    
  }
  public function destroy($id){
    $user = User::findOrFail($id);
    $user->delete();
    return redirect('/dashboard');
    }
  


  public function edit(User $user)
  {
   return view('profiles.edit',compact('user')); 
  }
  
  public function update(User $user)
  {
   $data = request()->validate([
     'title'=>'required',
     'image'=>''

   ]);

   if(request('image'))
   {
    $ImagePath=request('image')->store('profile','public');
        
    $image=Image::make(public_path("storage/{$ImagePath}"))->resize(1200,1200);
    $image->save();
    $imageArray=['image'=>$ImagePath];          
   }

   $user->profile->update(array_merge(

    $data,
    $imageArray ?? []
   ));

  return redirect("/dashboard");

  }

  public function searchusers(Request $request)
  {
   ;
   $users= User::where([['username','like','%' .$request->get('searchQuest') . '%'],['username','!=','Admin'],['id','!=',Auth::user()->id]])->get();

   return json_encode($users);
  }
}
