@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    <div class="row m-0">
        <nav class="col-md-2 d-md-block bg-success sidebar" style="width: 250px; height: 100vh; margin-top:-2%">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="navbar-brand text-light" href="#">
                            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="company-logo" width="50" height="50">
                            Store Locator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><i class="fa fa-cog"></i> Manage Points</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><i class="fa fa-building"></i> Manage Store Types</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#"><i class="fa fa-tags"></i> Manage Tags</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i> Account Settings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="accountDropdown">
                            <a class="dropdown-item" href="#"><i class="fa fa-building"></i> Company Profile</a>
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Personal Profile</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="col-md-10 d-flex align-items-center justify-content-center">
            <h1>Main Content</h1>
        </div>
    </div>
</div>
@endsection

