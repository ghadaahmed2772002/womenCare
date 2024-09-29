@extends('layouts.master')

@section('title')
    Dashboard Design
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
                <a href="{{ route('products.index') }}" class="nav-link"><span class="las la-shopping-bag"></span> Products</a>
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
                <a href="{{ route('category_childs.index') }}" class="nav-link"><span class="las la-list-ul"></span> Sub Categories</a>
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
        <div class="card mb-4">
            <div class="card-header">
                <span class="las la-box"></span> Product Details
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $product->id }}</p>
                <p><strong>Name:</strong> {{ $product->name }}</p>
                <p><strong>Category:</strong> {{ $product->categoryChild->name ?? 'N/A' }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Quantity in Stock:</strong> {{ $product->quantity_in_stock }}</p>
                <p><strong>Status:</strong> {{ $product->status }}</p>
                <p><strong>Discount:</strong> {{ $product->discount->name ?? 'None' }}</p>
                <p><strong>Company:</strong> {{ $product->company->name }}</p>
                @if ($product->photo)
                    <p><strong>Photo:</strong></p>
                    <img src="{{ asset('storage/' . $product->photo) }}" alt="Product Photo" class="img-thumbnail" style="max-width: 300px;">
                @endif
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
            </div>
        </div>
    </div>
</div>
@endsection
