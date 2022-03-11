<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('API Dokumentation') }}</title>

    <!-- Scripts -->
    <script src="{{mix('js/swagger.js')}}" defer></script>
</head>
<body>
<!-- Page Content -->
<main>
    <div id="swagger-ui"></div>
    <script type="text/javascript" src="{{mix('js/swagger.js')}}"></script>
</main>
</body>
</html>
