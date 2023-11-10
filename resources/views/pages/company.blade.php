@extends('layouts.default')

@section('content')

<div class="row d-flex justify-content-center" style="margin-top: 5rem">
    <div class="col-md-8">
        <div class="card me-4">
            <div class="card-body">
                <h3 class="card-title fw-bold py-2 text-center text-center rounded" style="background: #e5e4e2;font-size: 2rem">Company Details</h3>
                <div class="d-flex justify-content-center mb-2">
                    <img src="{{asset('logo1.png')}}" alt="logo" height="120px" width="120px">
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Company Name</p><span>:</span></div>
                    <div class="col-md-6 h3">Locator</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Official webside</p><span>:</span></div>
                    <div class="col-md-6 h3"><a href="">https://locator.com</a> </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Telephone</p><span>:</span></div>
                    <div class="col-md-6 h3">+2778383939</div>
                </div>
            </div>
        </div>  

    </div>
</div>

@endsection
