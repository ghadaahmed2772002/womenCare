@extends('layouts.master')

@section('title')
Add Product
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
        <div class="card mb-4">
            <div class="card-header">
                <span class="las la-box"></span> Add New Product
            </div>
            <div class="card-body">
                <form action="{{ route('orders.store') }}" method="POST" >
                    @csrf
                    <div class="form-group mb-3">
                        <label for="total_price" class="form-label">Total Price:</label>
                        <input type="text" name="total_price" id="total_price" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="user_id" class="form-label">User ID:</label>
                        <select name="user_id" id="user_id" class="form-control" required>
                            <option value="">Select Name</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="shipping_address_id " class="form-label">Shipping Addresses:</label>
                        <select name="shipping_address_id " id="shipping_address_id " class="form-control" required>
                            <option value="">select</option>
                            @foreach ($shippingAddresses as $shippingAddress)
                                <option value="{{ $shippingAddress->id }}">{{ $shippingAddress->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="shipping_price" class="form-label">Shipping Price:</label>
                        <input type="number" step="0.01" name="shipping_price" id="shipping_price" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="" selected >select</option>
                            <option value="" >pending</option>
                            <option value="" >shipped</option>
                            <option value="" >delivered</option>
                            <option value="" >canceled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Add Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
