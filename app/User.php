<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Profile' , 'id_user');
    }

    public function to_education()
    {
        return $this->hasMany('App\education', 'id_user');
    }

    public function posts(){
        return $this->hasMany(Post::class,'author_id');
    }

    public function getRouteKeyName(){
        return 'slug';
    }
    public function getBioHtmlAttribute($value){
        return $this->bio ? Markdown::convertToHtml(e($this->bio)) : NULL;
    }
     
    public function gravatar(){
      $email = $this->email;
      $default = "https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png";
      $size = 100;
     
      return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    }
}
