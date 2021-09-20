<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-image: url({{ asset('svg/bg.svg') }}); background-size: cover;">
    <div id="app">
        <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
            <div class="card border-0 shadow-lg" style="width: 25rem; padding: 2rem; border-radius: 25px;">
                <div class="card-body">
                    <div class="row gy-3 justify-content-center">
                        <div class="col">
                            <img class="mx-auto d-block"
                                src="https://img.icons8.com/emoji/48/000000/waving-hand-emoji.png" />
                            <h2 class="my-5 text-center"><strong>Welcome back!</strong></h2>
                            <form class="my-5" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email"
                                        class="form-control border-0 bg-light @error('email') is-invalid @enderror"
                                        id="email" name="email" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control border-0 bg-light @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember"
                                        {{ old('remember') ? 'checked' : '' }}>Keep me logged in</label>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Sign in</button>

                                </div>
                            </form>
                            <div class="mb-5">
                                <span>Don't have an account? <a href="register" class="text-decoration-none">Sign
                                        up</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>

</html>
