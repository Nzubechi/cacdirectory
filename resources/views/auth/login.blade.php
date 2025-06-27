@extends('layouts.app')

@section('content')
<div class="auth-card">
    <h2 class="text-custom">Login</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('auth.login.submit') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password"
                class="form-control @error('password') is-invalid @enderror" required>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 text-end">
            <a class="link-custom" href="{{ route('password.request') }}">Forgot Password?</a>
        </div>

        <button type="submit" class="btn btn-custom w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        <small>Don't have an account? <a class="link-custom" href="{{ route('auth.register') }}">Register here</a></small>
    </div>
</div>
@endsection
