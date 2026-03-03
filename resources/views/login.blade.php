@extends('layout')

@section('content')

<style>
    body {
        background-color: #f4f6f9;
    }

    .auth-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        width: 420px;
        border-radius: 20px;
        box-shadow: 0 20px 45px rgba(0, 0, 0, 0.08);
        padding: 40px;
        background: #ffffff;
    }

    .brand-logo {
        font-size: 50px;
    }

    .form-control {
        height: 48px;
        border-radius: 12px;
        border: 1px solid #dee2e6;
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #dc3545;
    }

    .login-btn {
        height: 48px;
        border-radius: 12px;
        font-weight: 600;
        background-color: #dc3545;
        border: none;
        transition: all 0.2s ease;
    }

    .login-btn:hover {
        background-color: #bb2d3b;
        transform: translateY(-2px);
    }

    .register-link {
        text-decoration: none;
        font-weight: 600;
    }

    .register-link:hover {
        text-decoration: underline;
    }
</style>

<div class="container-fluid auth-container">

    <div class="login-card">

        <div class="text-center mb-4">
            <div class="brand-logo">🩸</div>
            <h3 class="fw-bold mt-2">BloodConnect</h3>
            <p class="text-muted small">
                Secure access for donors and administrators
            </p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.process') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Enter your email"
                       required>
            </div>

            <div class="mb-4">
                <label class="form-label fw-semibold">Password</label>
                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Enter your password"
                       required>
            </div>

            <button type="submit" class="btn login-btn w-100">
                Login
            </button>

            <div class="text-center mt-4">
                <small class="text-muted">
                    New user?
                    <a href="{{ route('register') }}" class="text-danger register-link">
                        Create an account
                    </a>
                </small>
            </div>

        </form>

    </div>

</div>

@endsection