@extends('layouts.auth')

@section('content')
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="container-flex">
            <div class="card border-0 shadow-lg" style="width: 25rem; padding: 2rem; border-radius: 25px;">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col">
                            <img class="mx-auto d-block"
                                src="https://img.icons8.com/emoji/48/000000/waving-hand-emoji.png" />
                            <h2 class="my-5 text-center"><strong>Welcome back!</strong></h2>
                            <form class="my-5" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email"
                                        class="form-control border-0 bg-input @error('email') is-invalid @enderror"
                                        name="email" autocomplete="email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control border-0 bg-input @error('password') is-invalid @enderror"
                                        name="password" autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="remember">
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
@endsection
