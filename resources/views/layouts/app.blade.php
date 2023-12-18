<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Style -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    @yield('head')
</head>

<body>
    @yield('navbar')

    <main>@yield('content')</main>

    <!-- Footer -->
    @yield('footer')

    <!-- Aviso de uso de cookies -->
    <div id="cookie-warning" class="alert alert-info fixed-bottom mb-0 rounded-0 text-dark" style="display:none;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <p class="text-dark">Este site utiliza cookies para melhorar a sua experiência. Ao
                        continuar
                        navegando, você concorda com o uso de cookies.</p>
                </div>
                <div class="col-md-3 text-end">
                    <button id="acceptCookie" class="btn btn-primary">Aceitar</button>
                </div>
            </div>
        </div>
    </div>

<!-- Script -->
<script src="{{ asset('css/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/layouts/rootLayout.js') }}"></script>

</body>

</html>