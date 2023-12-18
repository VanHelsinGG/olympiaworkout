@extends('layouts.app')

@section('title','OlympiaWorkout - Recuperação de Conta')

@section('head')

<link rel="stylesheet" href="{{ asset('css/auth/forgot-password.css') }}">

@endsection

@section('content')
<header class="d-flex justify-content-start ps-3 align-items-center bg-laranja" style="height: 3rem;">
    <a href="{{ url('user/auth/login') }}" class="btn text-white mt-1"><i class="bi bi-x display-5"></i></a>
</header>

<div class="wrapper vh-100 d-flex justify-content-center align-items-center flex-column">
    <form action="{{ url('user/auth/forgot-password') }}" method="post" class="container rounded shadow-sm p-5 bg-dark-2 d-flex justify-content-center align-items-center flex-column">
        @csrf
        <div class="row text-center my-4 pb-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.4) !important;width:35rem;">
            <div class="col-12">
                <h2>Recuperação de Conta</h2>
                <span>Insira abaixo o email para receber o token:</span>
            </div>
        </div>
        <div class="row my-4">
            <div class="form-group col-12">
                <label for="email">INSIRA SEU EMAIL</label>
                <div class="input-group mt-3">
                    <input type="email" name="email" id="email" required placeholder="Insira seu email" class="p-3">
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col w-100">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
</div>
@endsection