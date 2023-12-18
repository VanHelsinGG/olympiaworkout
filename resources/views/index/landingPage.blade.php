@extends('layouts.app')

@section('title','OlympiaWorkout - Promovendo Saúde e Bem-Estar!')

@section('head')
<link rel="stylesheet" href="{{ asset('css/index/index.css') }}">
@endsection

@section('content')
<div style="background-color:var(--escuro-principal);">
    <!-- Header / NavBar -->
    <header class="header container-fluid bg-laranja shadow d-none d-md-block fixed-top" id="header">
        <div class="row">
            <div class="col-4 pt-1 d-flex justify-content-center align-items-center">
                <div class="col-6">
                    <h1 class="fs-4" id="title">OlympiaWorkout</h1>
                </div>
            </div>
            <div class="col-8 p-2">
                <nav class="navbar navbar-expand-md navbar-light ms-auto">
                    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon text-white" style="filter: invert(1);"></span>
                    </button>
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item mx-3 active">
                                <a href="{{ url('/') }}" class="nav-link text-white">Inicio</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="about.html" id="contact" class="nav-link text-white">Sobre Nós</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="team.html" id="contact" class="nav-link text-white">Nossa Equipe</a>
                            </li>
                            <li class="nav-item mx-3">
                                <a href="{{ url('user/auth/register') }}" id="registrar" class="nav-link text-white btn btn-azul px-3">Começar Agora</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <header class="container-fluid d-md-none d-block bg-laranja p-2">
        <div class="row">
            <div class="col-6 p-2 text-center">
                <h1 class="text-white">OlympiaWorkout</h1>
            </div>
            <div class="col-6 p-2 text-center">
                <a href="register.php" class="btn btn-azul text-white ">Começar Agora</a>
            </div>
        </div>
    </header>

    <div class="container-fluid d-block d-md-none background-escuro text-white">
        <div class="row">
            <div class="col text-center">
                <h1 class="display-1">OlympiaWorkout:</h1>
            </div>
            <div class="row">
                <div class="col text-center"><span>Promovendo Saúde e Bem-Estar!</span></div>
            </div>
        </div>
    </div>


    <!-- Primeira Section -->
    <div class="container-fluid background-escuro">
        <div class="row text-light d-flex justify-content-center align-items-center">
            <div class="col-md-6 px-5 fs-5 col-12" style="height: 100%;">
                <h4 class="fs-4 mb-4" style="font-weight: bold; color: #ff9f1a;">Descubra a
                    plataforma digital para uma vida ativa e saudável!</h4>
                <p>Oferecemos uma ampla gama de recursos, incluindo vídeos de exercícios inspiradores, conteúdo didático
                    de alta qualidade, um sistema nutricional inteligente e incentivos empolgantes para te manter
                    motivado. É a ferramenta perfeita para transformar seu estilo de vida. Venha se juntar a nós e cuide
                    de si mesmo de forma personalizada. Não espere mais, comece a sua jornada de bem-estar conosco
                    agora!</p>
                <a href="{{ url('user/auth/register') }}" class="btn btn-danger my-3 mb-5 w-100">Começar gratuitamente</a>
            </div>
            <div class="col-md-6 d-none d-md-block" style="height: 100%;">
                <img src="{{ url('images/section-images/Section-Image-4.png') }}" alt="" id="imagem-comecar" class="img-fluid my-5 pe-3 img-section" style="width: 100%;height: 100%;">
            </div>
        </div>
    </div>

    <!-- Numeros -->
    <div class="py-1 numero d-flex align-items-center">
        <div class="container">
            <div class="row py-4">
                <div class="col-md-4 col-12">
                    <h3 class="px-3 fs-3 my-4">

                    </h3>
                </div>
                <div class="col-md-4 col-12">
                    <h3 class="px-3 fs-3 my-4">

                    </h3>
                </div>
                <div class="col-md-4 col-12">
                    <h3 class="px-3 fs-3 my-4">

                    </h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Outras sections -->
    <div class="container-fluid m-0 p-5 background-escuro text-light fs-5 h-100">
        <div class="row py-5 d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-6 justify-content-center align-items-center d-flex">
                <img src="{{ url('images/section-images/Section-Image-1.png') }}" alt="Imagem" class="img-fluid img-section d-none d-md-block">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <h4 class="fs-4 mb-4 ms-md-4" style="font-weight: bold; color: #ff9f1a;">Descubra o Poder da Saúde e
                    Nutrição:
                    Transforme sua Vida!</h4>
                <p class="mb-4 ms-md-4">Tenha uma vida mais plena e saudável com o poder da saúde e nutrição! Nossa
                    plataforma é
                    sua aliada para descobrir como uma alimentação equilibrada, atividades físicas regulares e hábitos
                    saudáveis podem transformar sua vida para melhor. Oferecemos recursos valiosos, como conteúdo
                    informativo sobre práticas saudáveis, dicas nutricionais, sugestões de exercícios e muito mais.
                    Invista em sua saúde e bem-estar, e experimente os benefícios transformadores da saúde e nutrição em
                    sua jornada para uma vida mais vibrante e plena!</p>
                <a href="{{ url('user/auth/register') }}" class="btn btn-success w-100 ms-md-4">Descubra agora!</a>
            </div>
        </div>
        <div class="py-5 row mt-5 d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-6 col-sm-12">
                <h4 class="fs-4 mb-4 me-md-4" style="font-weight: bold; color: #ff9f1a;">Desvende os Segredos do
                    Conhecimento na
                    Atividade Física: Supere seus Limites!</h4>
                <p class="mb-4 me-md-4">Aprofunde-se no mundo do conhecimento relacionado à atividade física e desvende
                    os
                    segredos para atingir o melhor desempenho físico. Descubra as melhores práticas, estratégias de
                    treinamento, dicas de nutrição, técnicas de recuperação e muito mais para superar seus limites e
                    alcançar novos patamares em sua performance esportiva. Amplie seu entendimento sobre a ciência por
                    trás da atividade física e potencialize seus resultados, levando sua prática esportiva a um novo
                    nível!</p>
                <a href="{{ url('user/auth/register') }}" class="btn btn-danger w-100 ms-md-4">Explore o mundo do conhecimento!</a>
            </div>
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img src="{{ url('/images/section-images/Section-Image-2.png') }}" alt="Imagem" class="img-fluid img-section d-none d-md-block">
            </div>
        </div>
        <div class="row py-5 mt-5 d-flex align-items-center justify-content-center">
            <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                <img src="{{ url('/images/section-images/Section-Image-3.png') }}" alt="Imagem" class="img-fluid img-section d-none d-md-block">
            </div>
            <div class="col-12 col-md-6 col-sm-12">
                <h4 class="fs-4 mb-4 ms-md-4" style="font-weight: bold; color: #ff9f1a;">Monitoramento Inteligente:
                    Acompanhe
                    suas Atividades Físicas Diárias com Facilidade!</h4>
                <p class="mb-4 ms-md-4">Acompanhe suas atividades físicas diárias de forma fácil e eficaz com nossa
                    plataforma
                    de monitoramento inteligente. Registre, analise e otimize seu progresso para transformar sua rotina
                    de exercícios em uma jornada gratificante de bem-estar. Descubra como nosso acompanhamento pode
                    impulsionar seu estilo de vida ativo e saudável!!</p>
                <a href="{{ url('user/auth/register') }}" class="btn btn-roxo w-100 ms-md-4">Experimente Agora!</a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
    @include('layouts.footer')
@endsection