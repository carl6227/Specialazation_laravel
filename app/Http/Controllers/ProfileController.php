<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
class ProfileController extends Controller
{
   public function show(User $user){
  
      $follows = (auth()->user())? auth()->user()->following->contains($user->id): false;

      return view('profiles.show',compact('user', 'follows')); 
    

   }

}
