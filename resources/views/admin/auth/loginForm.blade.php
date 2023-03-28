<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    @include('admin.layout.partials.alerts')
    {{-- Content --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card p-3 mt-5">
                    <h1 class="text-center">
                        Welcome again
                    </h1>
                    <form action="{{ route('login.check') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Footer --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
