<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes

    @inertiaHead

    <style>
        .nprogress-busy {
            z-index: 9999999 !important;
        }

        .MuiPaginationItem-root {
            color: #8898aa;
            width: 36px;
            border: none !important;
        }
    

    </style>
</head>
    
<body class="font-sans antialiased">

    @inertia

    @env('local')
    <script src="http://localhost:8080/js/bundle.js"></script>
    @endenv
</body>

<script src="{{ mix('js/app.js') }}" defer></script>

</html>
