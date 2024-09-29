@extends('layouts.master')

@section('title', 'Shipping Addresses List')

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
        <h2>Shipping Addresses</h2>
        <a href="{{ route('shipping_addresses.create') }}" class="btn btn-success mb-3">Add New Address</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Address Line 1</th>
                    <th>Address Line 2</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Postal Code</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->user_id }}</td>
                        <td>{{ $address->address_line_1 }}</td>
                        <td>{{ $address->address_line_2 }}</td>
                        <td>{{ $address->city }}</td>
                        <td>{{ $address->state }}</td>
                        <td>{{ $address->country }}</td>
                        <td>{{ $address->postal_code }}</td>
                        <td>
                            <a href="{{ route('shipping_addresses.show', $address->id) }}" class="btn btn-secondary">Show</a>
                            <a href="{{ route('shipping_addresses.edit', $address->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('shipping_addresses.destroy', $address->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
