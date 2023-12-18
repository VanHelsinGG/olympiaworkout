@extends('layouts.app')

@section('title','Cadastro - OlympiaWorkout')

@section('head')

<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
<script src="{{ asset('js/auth/register.js') }}"></script>

@endsection

@section('content')
<div>
    <header class="container-fluid d-md-none d-block p-2" style="position: relative;">
        <div class="row">
            <a href="{{ url('/') }}" class="btn text-white"><i class="bi bi-arrow-left display-4"
                    style="position:absolute; left:1rem; top:1.3rem;"></i></a>
            <div class="col-12 text-center">
                <h1 class="text-white">OlympiaWorkout</h1>
            </div>
        </div>
    </header>
    <!-- Corpo do site -->
    <div class="container-fluid fs-md-5 h-100" id="formulario">
        <!-- Parte laranja decorativa -->
        <div class="row h-100">
            <div class="col-6 d-md-flex d-none text-center align-items-center justify-content-center title text-white position-relative"
                style="background: #ff9f1a url('data:image/svg+xml,%3Csvg width=&quot;6&quot; height=&quot;6&quot; viewBox=&quot;0 0 6 6&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;%23ca7f16&quot; fill-opacity=&quot;1&quot; fill-rule=&quot;evenodd&quot;%3E%3Cpath d=&quot;M5 0h1L0 6V5zM6 5v1H5z&quot;/&gt;%3C/g%3E%3C/svg%3E');"
                id="decoration-form">
                <a href="{{ url('/') }}" class="btn text-white"><i class="bi bi-x display-4"
                        style="position:absolute; left:0; top:0;"></i></a>
                <div class="col-7">
                    <h2 class="font-weight-bold fs-1">Já é membro?</h2>
                    <p class="text-white text-opacity-75">Faça login para ter acesso aos benefícios da sua conta!</p>
                    <a href="{{ url('auth/login') }}" class="btn btn-outline-light w-100 btn-lg"
                        style="border-radius:20px;">Conectar-se</a>
                </div>
                <!-- Setinha redonda -->
                <div class="col-6 shadow d-md-flex d-none justify-content-end position-absolute top-50 end-0 p-2 rounded-circle d-flex align-items-center justify-content-center"
                    id="circulo">
                    <a href="{{ url('auth/login') }}" class="btn text-white">
                        <span class="bi bi-caret-left-fill"></span>
                    </a>
                </div>
            </div>
            <!-- Formulario -->
            <div
                class="col-md-6 col-12 d-flex align-items-md-center align-items-start justify-content-center">
                <form action="{{ url('auth/register') }}" method="post" class="my-md-0 my-3 p-4">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <h1 class="display-4 text-center">Inscreva-se</h1>
                            <p class="d-md-none d-block text-center">Já possuí uma conta? <a 
                                    href="{{ url('auth/login') }}">Conectar-se</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ __($error) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-12 ">
                            <div class="form-group">
                                <label for="nome" class="form-label">NOME</label>
                                <input type="text" class="form-control" id="name" name="nome" autocomplete="off"
                                    placeholder="Digite seu nome" required>
                            </div>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-md-8 col-12">
                            <div class="form-group">
                                <label for="email" class="form-label">EMAIL</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off"
                                    placeholder="Digite seu email" required>
                            </div>
                        </div>
                        <div class="col-md-4 col-12 mt-md-0 mt-4">
                            <p class="form-label">SEXO</p>
                            <select id="sexo" name="gender" tabindex="-1" class="form-select">
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                            </select>
                        </div>
                    </div>
                    <div class="row py-3">
                        <div class="col-lg-6 col-12 mb-md-0 mb-4">
                            <div class="form-group">
                                <label for="senha" class="form-label">SENHA</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="off" placeholder="Digite sua senha" required
                                        minlength="4">
                                    <button class="btn togglePassword" tabindex="-1" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mt-lg-0 mt-4">
                            <div class="form-group">
                                <label for="senha2" class="form-label">CONFIRME SUA SENHA</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password-confirmation"
                                        name="password_confirmation" autocomplete="off" placeholder="Repita sua senha"
                                        required minlength="4">
                                    <button class="btn togglePassword" tabindex="-1" type="button">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p style="font-size:13px;"><span class="text-danger">**
                                </span>Ao se registrar, você concorda com nossos termos de
                                uso.
                            <p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-blue mt-2 w-100 rounded-5" id="register"
                                type="submit">Inscrever-se</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection