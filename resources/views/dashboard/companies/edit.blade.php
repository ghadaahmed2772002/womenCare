@extends('layouts.master')

@section('title')
Edit Company
@endsection

@section('sidebar')
<!-- Sidebar -->
<div class="d-flex">
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link"><span class="las la-home"></span> Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="nav-link"><span class="las la-user-shield"></span> Admins</a>
            </li>
            <li class="nav-item">
                <a href="orders.html" class="nav-link"><span class="las la-shopping-cart"></span> Orders</a>
            </li>
            <li class="nav-item">
                <a href="customers.html" class="nav-link"><span class="las la-users"></span> Customers</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('companies.index') }}" class="nav-link"><span class="las la-building"></span> Companies</a>
            </li>
            <li class="nav-item">
                <a href="companies.html" class="nav-link"><span class="las la-thumbs-up"></span> Reviews</a>
            </li>
            <li class="nav-item">
                <a href="salesreport.html" class="nav-link"><span class="las la-chart-bar"></span> Sales Report</a>
            </li>
            <li class="nav-item">
                <a href="messages.html" class="nav-link"><span class="las la-comment-dots"></span> Messages</a>
            </li>
            <li class="nav-item">
                <a href="settings.html" class="nav-link"><span class="las la-tools"></span> Settings</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout.post') }}"  class="nav-link"><span class="las la-sign-out-alt"></span> Sign Out</a>
            </li>
        </ul>
    </div>
</div>
@endsection

@section('content')
<div class="main-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <span class="las la-building"></span> Edit Company
                    </div>
                    <div class="card-body">
                        <form action="{{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name">Company Name:</label>
                                <input type="text" name="name" class="form-control" value="{{ $company->name }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="photo">Photo:</label>
                                <input type="file" name="photo" class="form-control">
                                <img src="{{ asset('storage/' . $company->photo) }}" alt="Company Photo" width="100">
                            </div>
                            <div class="form-group mb-3">
                                <label for="city">City:</label>
                                <input type="text" name="city" class="form-control" value="{{ $company->city }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="country">Country:</label>
                                <input type="text" name="country" class="form-control" value="{{ $company->country }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Company</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
