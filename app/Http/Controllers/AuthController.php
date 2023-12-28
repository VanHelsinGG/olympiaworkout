<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsersPermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules\Password as PasswordRules;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth/register');
    }

    public function showLoginForm()
    {
        return view('auth/login');
    }

    public function showForgotPasswordForm(){
        return view('auth/forgot-password');
    }

    public function showResetPasswordForm(){
        return view('auth/forgot-password');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:40|min:4',
            'email' => 'required|string|email|max:255|min:10|unique:users',
            'gender' => 'required|in:Masculino,Feminino',
            'password' => ['required', 'confirmed', PasswordRules::min(6)],
        ]);

        $gender = $request->gender === 'Masculino' ? 'M' : 'F';

        $email = strtolower($request->email);
        $name = ucwords($request->nome);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'password' => Hash::make($request->password),
        ]);

        UsersPermissions::create([
           'user' => $user->id ,
           'general_group' => 'u',
           'specific_permissions' => "",
        ]);

        return redirect()->route('auth.login')
        ->with('success', __('user/auth.register_success'))
        ->with('registered_email', $request->input('email'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            return redirect()->route('user.main')
                ->with('user_name', $user->name);
        }

        throw ValidationException::withMessages([
            'email' => [__('user/auth.failed')],
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('home');
    }
}