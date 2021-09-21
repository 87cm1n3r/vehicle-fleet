@extends('layouts.auth')

@section('content')
    <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
        <div class="card border-0 shadow-lg" style="width: 25rem; padding: 2rem; border-radius: 25px;">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col">
                        <h2 class="mb-5 text-center"><strong>Create your account</strong></h2>
                        <form class="my-5" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input id="name" type="text"
                                    class="border-0 bg-input form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email"
                                    class="border-0 bg-input form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password"
                                    class="border-0 bg-input form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm password</label>
                                <input id="password-confirm" type="password" class="border-0 bg-input form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                            <div class="d-grid mt-5">
                                <button type="submit" class="btn btn-primary">Sign up</button>

                            </div>
                        </form>
                        <div class="">
                        <span>Already have an account? <a href=" login"
                            class="text-decoration-none">Sign
                            in</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
