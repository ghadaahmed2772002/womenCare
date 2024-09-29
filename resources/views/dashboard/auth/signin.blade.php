@extends('layouts.master')
@section('title')
Sign In
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid mt-5 sign-in-container">
        <div class="row">
            <!-- ## sign in ##-->
            <div class="col-md-6 sign-in-box">
                <h2>Sign In</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="password" required>
                    </div>

                    <button type="submit" class="btn btn-primary sign-in-btn">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
