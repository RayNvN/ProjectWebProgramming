@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Account Login</h3>
                <p class="text-center">If you are already a member you can login with your email address and password.</p>

                <!-- Login Form -->
                <form action="/Login" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="sampleuser@email.com" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="********" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>

                <hr>

                <!-- Register Link -->
                <p class="text-center">Don't have an account? <a href="/signup">Sign up here</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
