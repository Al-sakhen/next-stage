<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite([ 'resources/js/app.js' , 'resources/css/app.css'])
</head>
<body>
    {{-- Navbar --}}
    @include('admin.layout.partials.navbar')
    @include('admin.layout.partials.alerts')


    {{-- Content --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('admin.layout.partials.footer')

    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
