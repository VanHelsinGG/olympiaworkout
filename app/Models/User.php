<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'avatar',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->permissions->each->delete();
        });
    }

    public function permissions()
    {
        return $this->hasOne(UsersPermissions::class, 'user');
    }

    public function group()
    {
        return $this->permissions->general_group;
    }

    public function image()
    {
        return $this->avatar ?? 'images/user-icon.png';
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user');
    }

    public function posts_reactions()
    {
        return $this->hasMany(PostReactions::class, 'user');
    }

    public function posts_reports()
    {
        return $this->hasMany(PostReports::class, 'delator');
    }
}
