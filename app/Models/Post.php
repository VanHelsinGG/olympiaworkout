<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'content',
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            $post->reactions->each->delete();
            $post->reports->each->delete();
        });
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function reactions()
    {
        return $this->hasMany(PostReactions::class, 'post');
    }

    public function reports()
    {
        return $this->hasMany(PostReports::class, 'post');
    }

    public function react($user, $type)
    {
        $existingReaction = $this->reactions()->where('user', $user)->first();

        if ($existingReaction) {
            if ($existingReaction->reaction_type === $type) {
                $existingReaction->delete();
                return __('post/react.success.remove');
            } else {
                $existingReaction->update(['reaction_type' => $type]);
                return __('post/react.success.update');
            }
        } else {
            $this->reactions()->create([
                'user' => $user,
                'reaction_type' => $type,
            ]);
            return __('post/react.success.create');
        }
    }

    public function report($delator, $generalReason, $specificReason)
    {
        $this->reports()->create([
            'delator' => $delator,
            'general_reason' => $generalReason,
            'specific_reason' => $specificReason,
        ]);

        return 1;   
    }
}
