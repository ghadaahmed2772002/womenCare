@extends('layouts.master')
@section('title')
Sign Up
@endsection
@section('content')
<!--## main content here ## -->
<div class="main-content">
    <div class="container-fluid mt-5 sign-in-container">
        <div class="row">
            <!-- ## sign up ##-->
            <div class="col-md-6 sign-in-box">
                <h2>Sign Up</h2>
                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                    </div>

                    <!-- Photo -->
                    <div class="form-group mb-3">
                        <label for="photo" class="form-label">Photo:</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

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

                    <!-- Role -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary sign-in-btn">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
