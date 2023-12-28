<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostReports extends Model
{
    use HasFactory;

    protected $fillable = [
        'post',
        'delator',
        'general_reason',
        'specific_reason'
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function delator(){
        return $this->belongsTo(User::class);
    }
}
