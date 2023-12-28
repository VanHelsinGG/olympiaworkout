@extends('layouts.app')

@section('title', $title)

@section('head')
<link rel="stylesheet" href="{{ asset('css/user/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/user/layouts/header.css') }}">
<link rel="stylesheet" href="{{ asset('css/user/layouts/post.css') }}">
<script src="{{ asset('js/user/main.js') }}"></script>
@endsection

@section('navbar')
@include('user.layouts.header')
@endsection

@section('content')

<!-- Title -->
<div class="container-fluid text-center d-flex justify-content-center align-items-center" id="title-div">
    <div class="row">
        <div class="col">
            <h1 class="text-white">OlympiaWorkout: Promovendo Saúde e Bem-Estar!</h1>
        </div>
    </div>
    <video autoplay muted loop id="background-video">
        <source src="{{url('images/fundo.mp4')}}" type="video/mp4">
        Seu navegador não suporta vídeo HTML5.
    </video>
</div>
<!-- End title -->

<!-- Training info container -->
<div class="container-fluid p-4">
    <!-- Title -->
    <div class="row mb-4" style="border-bottom: 1px solid #363330;">
        <h2 class="fs-3">Treinamento</h2>
    </div>
    <div class="row bg-variant-1 rounded shadow-sm p-3">
        <!-- Next Training -->
        <div class="col-lg-6 col-12 ">
            <h3 class="fs-5 pb-2">Próximo Treino</h3>
        </div>
        <!-- End Next Training -->

        <!-- Today History -->
        <div class="col-lg-6 col-12 mt-md-0">
            <h3 class="fs-5 pb-2">Histórico Diario</h3>
        </div>
        <!-- End Today History -->

    </div>
</div>
<!-- End Training Info Container -->

<!-- General Informations Container -->
<div class="container-fluid p-4">
    <!-- Title -->
    <div class="row mb-4" style="border-bottom: 1px solid #363330;">
        <h2 class="fs-3">Estatísticas Gerais</h2>
    </div>
    <div class="row">
        <!-- Recent Posts -->
        <div class="col-lg-9 col-12">
            <div class="container my-2 bg-variant-1 p-4 rounded shadow-sm">
                <div class="row mb-4">
                    <h3 class="fs-4">Ultimas Postagens</h2>
                </div>
                <!-- Post creation form -->
                <div class="row">
                    <div class="col">
                        <form action="{{ route('user.post.create') }}" method="POST" id="post-form">
                            @csrf
                            <div class="input-group rounded" id="post-container">
                                <input type="text" class="form-control p-3" name="content" autocomplete="off" placeholder="Diga-nos oque está pensando!" max='255' min='2'>
                                <input type="hidden" name="userid" value="{{ $user->id }}">
                                <button type="button" class="input-group-text" id="post-icon" onclick="document.getElementById('post-form').submit();"><i class="bi bi-send"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Posts creation -->
                @foreach (\App\Models\Post::latest()->limit(3)->get() as $post)
                @include('user.layouts.post', ['post' => $post, 'user' => $user])
                @endforeach

                <div class="row text-center mt-4">
                    <div class="col w-100">
                        <a href="" class="btn btn-blue w-100">Ver mais publicações</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Posts -->

        <!-- Ranks -->
        <div class="col-lg-3 col-12">
            <div class="container my-2 bg-variant-1 p-4 rounded shadow-sm">
                <!-- Title -->
                <div class="row mb-4">
                    <h3 class="fs-4">Tops</h2>
                </div>
                <!-- Today Ranks -->
                <div class="row bg-variant-2 rounded shadow-sm">
                    <div class="col rounded p-3">
                        <h3 class="fs-5 py-2"><i class="bi bi-arrow-right me-2"></i>Top Diario</h3>
                        <table class="table-dark table-striped table text-center">

                        </table>
                    </div>
                </div>
                <!-- Week Ranks -->
                <div class="row bg-variant-2 rounded shadow-sm my-4">
                    <div class="col p-3">
                        <h3 class="fs-5 py-2"><i class="bi bi-arrow-right me-2"></i>Top Semanal</h3>
                        <table class="table-dark table-striped table text-center">

                        </table>
                    </div>
                </div>
                <!-- Month Ranks -->
                <div class="row bg-variant-2 rounded shadow-sm">
                    <div class="col p-3">
                        <h3 class="fs-5 py-2"><i class="bi bi-arrow-right me-2"></i>Top Mensal</h3>
                        <table class="table-dark table-striped table text-center">

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Ranks -->
    </div>
</div>

<!-- Toasts -->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    @if(session('post_success'))
    <div class="toast align-items-center text-bg-success rounded" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-check-circle-fill fs-5 text-white me-2"></i>
                <span>Publicação realizada com sucesso!</span>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="progress" role="progressbar" style="height: 3px;" aria-label="Toast timer progress bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: 0%"></div>
        </div>
    </div>
    @endif
    @if(session('post_error'))
    <div class="toast align-items-center text-bg-danger rounded" role="alert" aria-live="assertive" aria-atomic="true" data-bs-animation="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="bi bi-x-circle-fill fs-5 text-white me-2"></i>
                <span>{{ session('post_error') }}</span>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ __($error) }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="progress" role="progressbar" style="height: 3px;" aria-label="Toast timer progress bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger" style="width: 0%"></div>
        </div>
    </div>
    @endif
</div>

<x-modal dismissable='false' title='Editar Publicação'></x-modal>

@endsection

@section('footer')

@endsection