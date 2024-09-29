@extends('layouts.master')

@section('title')
Edit Discount
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
                        <span class="las la-building"></span> Update Discount
                    </div>
                    <div class="card-body">
                        <form action="{{ route('discount.update', $discount->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Percent Field -->
                            <div class="form-group mb-3">
                                <label for="percent" class="form-label">Percent:</label>
                                <input type="text" name="percent" id="percent" class="form-control" value="{{ $discount->percent }}" required>
                            </div>

                            <!-- Status Field -->
                            <div class="form-group mb-3">
                                <label for="status" class="form-label">Status:</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="available" {{ $discount->status == 'available' ? 'selected' : '' }}>Available</option>
                                    <option value="not available" {{ $discount->status == 'not available' ? 'selected' : '' }}>Not Available</option>
                                </select>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success">Edit Discount</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
