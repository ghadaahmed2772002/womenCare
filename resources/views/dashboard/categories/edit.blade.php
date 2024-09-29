@extends('layouts.master')

@section('title')
Edit Category
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
                        <span class="las la-building"></span> Update
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" name="name" id="name" class="form-control"  value="{{ $category->name }}">
                            </div>

                            <div class="form-group mb-3">
                                <label for="photo" class="form-label">Photo:</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                <img src="{{ asset('storage/' . $category->photo) }}" alt="category Photo" width="100">
                            </div>

                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Description:</label>
                                <textarea type="text" name="description" id="description"  cols="30" rows="10" class="form-control" required>{{ $category->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-success">Edit Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
