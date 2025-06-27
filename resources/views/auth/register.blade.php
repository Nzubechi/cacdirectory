@extends('layouts.app')

@section('content')
<div class="auth-card">
    <h2 class="text-custom">Create Account</h2>

    <form method="POST" action="{{ route('auth.register.submit') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input type="email" name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}" required>
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

        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation"
                class="form-control" required>
        </div>

        <button type="submit" class="btn btn-custom w-100">Register</button>
    </form>

    <div class="text-center mt-3">
        <small>Already have an account? <a class="link-custom" href="{{ route('auth.login') }}">Login here</a></small>
    </div>
</div>
@endsection
