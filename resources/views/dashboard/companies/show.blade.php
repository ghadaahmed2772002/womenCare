@extends('layouts.master')

@section('title')
Company Details
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
                        <span class="las la-building"></span> Company Details
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $company->name }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $company->city }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $company->country }}</td>
                            </tr>
                            <tr>
                                <th>Photo</th>
                                <td><img src="{{ asset('storage/' . $company->photo) }}" alt="Photo" width="150"></td>
                            </tr>
                        </table>
                        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to Companies</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
