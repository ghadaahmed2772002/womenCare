@extends('layouts.master')

@section('title', 'Edit Shipping Address')

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
                <a href="{{ route('user.index') }}" class="nav-link"><span class="las la-users"></span> Customers</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('companies.index') }}" class="nav-link"><span class="las la-building"></span> Companies</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link"><span class="las la-list-ul"></span> Categories</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('discount.index') }}" class="nav-link"><span class="las la-money-bill"></span> Discounts</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('shipping_addresses.index') }}" class="nav-link"><span class="las la-shipping-fast"></span> Shipping Addresses</a>
            </li>
            <li class="nav-item">
                <a href="companies.html" class="nav-link"><span class="las la-thumbs-up"></span> Reviews</a>
            </li>
            <li class="nav-item">
                <a href="salesreport.html" class="nav-link"><span class="las la-chart-bar"></span> Sales Report</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('messages.index') }}" class="nav-link"><span class="las la-comment-dots"></span> Messages</a>
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
        <h2>Edit Shipping Address</h2>

        <form action="{{ route('shipping_addresses.update', $address->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == $address->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="address_line_1" class="form-label">Address Line 1</label>
                <input type="text" name="address_line_1" id="address_line_1" class="form-control" value="{{ $address->address_line_1 }}" required>
            </div>

            <div class="mb-3">
                <label for="address_line_2" class="form-label">Address Line 2</label>
                <input type="text" name="address_line_2" id="address_line_2" class="form-control" value="{{ $address->address_line_2 }}">
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control" value="{{ $address->city }}" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" id="state" class="form-control" value="{{ $address->state }}" required>
            </div>

            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" id="country" class="form-control" value="{{ $address->country }}" required>
            </div>

            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $address->postal_code }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Address</button>
        </form>
    </div>
</div>
@endsection
