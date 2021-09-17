<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

use Overtrue\LaravelFollow\Traits\CanFollow;
use Overtrue\LaravelFollow\Traits\CanBeFollowed;
class User extends Authenticatable
{
    // https://www.codecheef.org/article/laravel-58-follow-unfollow-system-example-from-scratch
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function boot()
    {
      parent::boot();
      static::created(function($user){
        $user->profile()->create([
            'title'=>$user->username
 
         ]);

      });

    }

    public function posts()
    {

        return $this->hasmany(Post::class)->orderBy('created_at','DESC');
    }
    public function comments()
    {

        return $this->hasmany(Comment::class)->orderBy('created_at','DESC');
    }

    public function following() {

        return $this->belongsToMany(Profile::class);
    }


    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}