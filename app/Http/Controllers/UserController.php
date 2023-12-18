<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserPermission;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showMainPage() {
        $user = Auth::user();
        $title = $user->name . ' - OlympiaWorkout' ?? 'OlympiaWorkout - Promovendo Saúde e Bem-Estar!';
        $activeRoute = 'user.main';
           
       return view('user.main', compact('user', 'title', 'activeRoute'));
    }

}
