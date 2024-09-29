@extends('layouts.master')
@section('title')
Sign Out
@endsection
@section('content')
<!--## main content here ## -->
<div class="main-content">
    <div class="container-fluid mt-5 sign-in-container">
        <div class="row">
            <!-- ## sign out ##-->
            <div class="col-md-6 sign-in-box">
                <h2>Sign Out</h2>
                <p>Are you sure you want to sign out?</p>
                <form action="{{ route('logout.post') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Sign Out</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
