@extends('layouts.app')

@section('title','Login - OlympiaWorkout')

@section('head')

<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
<script src="{{ asset('js/auth/login.js') }}" defer></script>

@endsection

@section('content')
    <div class="container-fluid fs-md-5 h-100">
        <div class="row h-100">
            <div
                class="col-md-6 col-12 d-flex align-items-md-center align-items-start justify-content-center bg-variant-2">
                <form action="{{ url('/auth/login') }}" method="post" class="my-md-0 my-5 p-4">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-4 text-center">Conectar-se</h1>
                            <p class="d-md-none d-block text-center">Ainda não possui uma conta? <a
                                    href="{{ url('/auth/register') }}">Criar conta</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if ($errors->any())
                            <div class="alert alert-danger d-flex flex-column">
                                @foreach ($errors->all() as $error)
                                {{ __($error) }}
                                @endforeach
                            </div>
                            @endif
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="email" class="form-label">EMAIL</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off"
                                    placeholder="Digite seu email" required
                                    value="{{ session('registered_email') ?? old('email') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="senha" class="form-label">SENHA</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="off" placeholder="Digite sua senha" required>
                                    <button class="btn togglePassword" tabindex="-1" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-blue mt-2 w-100 rounded-5" id="connect"
                                type="submit">Conectar-se</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 d-md-flex d-none text-center align-items-center justify-content-center title text-white position-relative"
                style="background: #ff9f1a url('data:image/svg+xml,%3Csvg width=&quot;6&quot; height=&quot;6&quot; viewBox=&quot;0 0 6 6&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;%23ca7f16&quot; fill-opacity=&quot;1&quot; fill-rule=&quot;evenodd&quot;%3E%3Cpath d=&quot;M5 0h1L0 6V5zM6 5v1H5z&quot;/&gt;%3C/g%3E%3C/svg%3E');"
                id="decoration-form">
                <a href="{{ url('/') }}" class="btn text-white"><i class="bi bi-x display-4"
                        style="position:absolute; right:0; top:0;"></i></a>
                <div class="col-7">
                    <h2 class="font-weight-bold fs-1">Já é membro?</h2>
                    <p class="text-white text-opacity-75">Faça login para ter acesso aos benefícios da sua conta!</p>
                    <a href="{{ url('/auth/register') }}" class="btn btn-outline-light w-100 btn-lg"
                        style="border-radius:20px;">Conectar-se</a>
                </div>
                <!-- Setinha redonda -->
                <div class="col-6 d-md-flex d-none justify-content-end position-absolute shadow top-50 end-0 p-2 rounded-circle d-flex align-items-center justify-content-center"
                    id="circulo">
                    <a href="{{ url('/auth/register') }}" class="btn text-white">
                        <span class="bi bi-caret-right-fill"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection