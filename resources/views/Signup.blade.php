@extends('layouts.app')

@section('title', 'Sign Up')

@section('content')
<div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center mb-4">Sign Up</h3>

                <!-- Sign Up Form -->
                <form action="/signup" method="POST">
                    @csrf
                    <div>
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit">Register</button>
                </form>



                <hr>

                <!-- Login Link -->
                <p class="text-center">Already have an account? <a href="/login">Log in</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
