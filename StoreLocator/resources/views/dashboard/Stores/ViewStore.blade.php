@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card-header mb-4">Business Profile</div>
        <div class="card mb-3">
            <img src="{{ asset('storage/' . $store->storePhoto) }}" class="card-img-top" style="height: 70vh;"
                alt="Wild Landscape" />
            <div class="card-body">
                <h5 class="card-title">{{ $store->storeName }}</h5>
                <div class="d-flex justify-content-between text-center mt-5 mb-2">
                    <div>
                        <p class="mb-2 h5">Address</p>
                        <p class="text-muted mb-0">{{ $store->storeAddress }}</p>
                    </div>
                    <div class="px-3">
                        <p class="mb-2 h5">Phone</p>
                        <p class="text-muted mb-0">{{ $store->telePhoneNumber }}</p>
                    </div>
                    <div>
                        <p class="mb-2 h5">Company</p>
                        <p class="text-muted mb-0">{{ $store->company->companyName }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
