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
                <a href="{{ route('orders.index') }}" class="nav-link"><span class="las la-shopping-cart"></span> Orders</a>
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
   <!-- Main Content -->
   <div class="main-content">
    <div class="container-fluid mt-5">
        <div class="row">
            <!-- ## welcome dashboard ##  -->
            <div class="col-md-6">
                <div class="card-welcome mb-4">
                    <div class="welcome-container">
                        Welcome to the Dashboard  Mr {{  auth()->user()->name}}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- ## recent user ##  -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <span class="las la-user"></span>Customers
                    </div>
                    <div class="card-body">
                        <h3>480</h3>
                    </div>
                </div>
            </div>
            <!-- ### recent company added ### -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <span class="las la-building"></span> Companies
                    </div>
                    <div class="card-body">
                        <h3>120</h3>
                    </div>
                </div>
            </div>
            <!-- ### recent Orders added ### -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <span  class="las la-shopping-bag"></span> Total Order
                    </div>
                    <div class="card-body">
                        <h3>120</h3>
                    </div>
                </div>
            </div>

            <!-- ### Recent Orders ## -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <span class="las la-cart-plus"></span> Recent Orders
                    </div>
                    <div class="card-body">
                        <h3>20</h3>
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
