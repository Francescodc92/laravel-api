@extends('layouts.guest')

@section('main-content')
    <h1 class="text-center text-primary text-uppercase">Register</h1>
    <div class="row">
        <div class="col-6 mt-4 mx-auto">
            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <!-- Name -->
                <div>
                    <label class="form-label" for="name">
                        Name
                    </label>
                    <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" id="name" name="name">
                </div>
                @error('name')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <!-- Email Address -->
                <div class="mt-4">
                    <label class="form-label" for="email">
                        Email
                    </label>
                    <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" id="email" name="email">
                </div>
                @error('email')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <!-- Password -->
                <div class="mt-4">
                    <label class="form-label" for="password">
                        Password
                    </label>
                    <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password">
                </div>
                @error('password')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <!-- Confirm Password -->
                <div class="mt-4">
                    <label class="form-label" for="password_confirmation">
                        Conferma Password
                    </label>
                    <input class="form-control @error('password_confirmation') is-invalid @enderror"  type="password" id="password_confirmation" name="password_confirmation">
                </div>
                @error('password_confirmation')
                    <div class="alert alert-danger my-2">
                        {{ $message }}
                    </div>
                @enderror
        
                <div class="d-flex flex-column items-center justify-end mt-4">
                    <a href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <button type="submit" class="btn btn-primary mt-2">
                    Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
