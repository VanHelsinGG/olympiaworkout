@extends('layouts.app')

@section('title', $title)

@section('head')
<link rel="stylesheet" href="{{ asset('css/user/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/user/layouts/header.css') }}">

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
        <h2 class="fs-4">Treino</h2>
    </div>
    <div class="row">
        <!-- Next Training -->
        <div class="col-lg-6 col-12" style="border-right: 1px solid #363330;">
            <h3 class="fs-5 pb-2" style="border-bottom: 1px solid #363330;">Próximo Treino</h3>
            
        </div>
        <!-- End Next Training -->

        <!-- Today History -->
        <div class="col-lg-6 col-12 mt-md-0 mt-5">
            <h3 class="fs-5 pb-2" style="border-bottom: 1px solid #363330;">Histórico Diario</h3>
            asd
        </div>
        <!-- End Today History -->

    </div>
</div>
<!-- End Training Info Container -->

<!-- General Informations Container -->
    <div class="container-fluid p-4">
        <!-- Title -->
        <div class="row mb-4" style="border-bottom: 1px solid #363330;">
            <h2 class="fs-4">Estatísticas Gerais</h2>
        </div>
        <div class="row">
            <!-- Recent Posts -->
            <div class="col-lg-9 col-12" style="border-right: 1px solid #363330;">
                <div class="container my-2">
                    <div class="row mb-4" style="border-bottom: 1px solid #363330;">
                        <h3 class="fs-4">Ultimas Postagens</h2>
                    </div>
                    <div class="row">
                        <div class="col">
                            <form action="./actions/post_action.php" method="get">
                                <div class="input-group rounded" id="postagem-div">
                                    <input type="text" class="form-control p-3" id="postagem" name="postagem"
                                        autocomplete="off" placeholder="Diga-nos oque está pensando!">
                                    <input type="hidden" name="data" id="data">
                                    <input type="hidden" name="criador" id="criador">
                                    <button type="submit" class="input-group-text" id="postagem-icon"><i
                                            class="bi bi-send"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Posts -->

            <!-- Ranks -->
            <div class="col-lg-3 col-12">
                <div class="container my-2">
                    <!-- Title -->
                    <div class="row mb-4" style="border-bottom: 1px solid #363330;">
                        <h3 class="fs-4">Tops</h2>
                    </div>
                    <!-- Today Ranks -->
                    <div class="row">
                        <div class="col bg-escuro-secundario rounded p-3">
                            <h3 class="fs-5 py-2" style="border-bottom: 1px solid #363330;"><i
                                    class="bi bi-arrow-right me-2"></i>Top Diario</h3>
                            <table class="table-dark table-striped table text-center">

                            </table>
                        </div>
                    </div>
                    <!-- Week Ranks -->
                    <div class="row">
                        <div class="col bg-escuro-secundario p-3">
                            <h3 class="fs-5 py-2" style="border-bottom: 1px solid #363330;"><i
                                    class="bi bi-arrow-right me-2"></i>Top Semanal</h3>
                            <table class="table-dark table-striped table text-center">

                            </table>
                        </div>
                    </div>
                    <!-- Month Ranks -->
                    <div class="row">
                        <div class="col bg-escuro-secundario p-3">
                            <h3 class="fs-5 py-2" style="border-bottom: 1px solid #363330;"><i
                                    class="bi bi-arrow-right me-2"></i>Top Mensal</h3>
                            <table class="table-dark table-striped table text-center">
                        
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Ranks -->
        </div>
    </div>
    
@endsection

@section('footer')

@endsection