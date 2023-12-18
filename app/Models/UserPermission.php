<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user',
        'general_group',
        'specific_permissions',
    ];

    public function isAdmin(){
        return $this->general_group === 'a';
    }

    public function isModerator()
    {
        return in_array($this->general_group, ['m', 'a']);
    }

    public function isTeacher()
    {
        return in_array($this->general_group, ['m', 'a', 't']);
    }
}
