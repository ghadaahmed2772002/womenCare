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
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_id" class="form-label">Category:</label>
                        <select name="category_id" id="category_id" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="category_child_id" class="form-label">Subcategory:</label>
                        <select name="category_child_id" id="category_child_id" class="form-control" required>
                            <option value="">select</option>
                            @foreach ($categoryChildren as $categoryChild)
                                <option value="{{ $categoryChild->id }}">{{ $categoryChild->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="photo" class="form-label">Photo:</label>
                        <input type="file" name="photo" id="photo" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="quantity_in_stock" class="form-label">Quantity in Stock:</label>
                        <input type="number" name="quantity_in_stock" id="quantity_in_stock" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="discount_id" class="form-label">Discount:</label>
                        <select name="discount_id" id="discount_id" class="form-control">
                            <option value="" style="color:black;">select</option>
                                @foreach ($discounts as $discount)
                                     <option value="{{ $discount->id }}">{{ $discount->percent }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="available">Available</option>
                            <option value="not available">Not Available</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="company_id" class="form-label">Company:</label>
                        <select name="company_id" id="company_id" class="form-control" required>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
