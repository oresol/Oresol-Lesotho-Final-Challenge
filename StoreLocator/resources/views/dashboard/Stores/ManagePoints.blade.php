@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border border-light">
            <div class="card-header d-flex p-2 justify-content-between">
                {{ __('Manage Points') }}
                <a href="/dashboard/addstores" class="btn btn-primary ">Add Store</a>
            </div>
            <div class="card-body">
                @include('components.Stores')
            </div>
        </div>
    @endsection
