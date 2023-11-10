@extends('layouts.default')

@section('content')

<div class="row d-flex justify-content-center">
    <div class="col-md-8">
        <div class="card me-4">
            <div class="card-body">
                <h3 class="card-title fw-bold py-4 text-center text-center rounded" style="background: #e5e4e2;font-size: 2rem">Personal Details</h3>
        
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Name</p><span>:</span></div>
                    <div class="col-md-6 h3">{{Auth::user()->name}}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Surname</p><span>:</span></div>
                    <div class="col-md-6 h3">{{Auth::user()->lastname}}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Position</p><span>:</span></div>
                    <div class="col-md-6 h3">{{Auth::user()->position}}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Gender</p><span>:</span></div>
                    <div class="col-md-6 h3">{{Auth::user()->gender}}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Email Address</p><span>:</span></div>
                    <div class="col-md-6 h3">{{Auth::user()->email}}</div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6 h3 d-flex justify-content-between"><p>Telephone</p><span>:</span></div>
                    <div class="col-md-6 h3">{{Auth::user()->telephone}}</div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <a href="{{url('/change-password')}}" style="width: 12rem;" class="btn btn-secondary m-3">Change Password</a>
            </div>
        </div>  
    </div>
</div>

@endsection
