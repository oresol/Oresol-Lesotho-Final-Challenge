@extends('layouts.app')

@section('content')
    <div class="container">

        @foreach ($companies as $company)
            @if (!empty($companies) && $companies->count())
                <section class="vh-90">
                    <div class="container py-5 h-100">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-md-12 col-xl-4">

                                <div class="card" style="border-radius: 15px;">
                                    <div class="card-body text-center">
                                        <div class="mt-3 mb-4">
                                            <img src="{{ asset('storage/' . $company->companyLogo) }}"
                                                class="rounded-circle img-fluid" style="width: 100px;" />
                                        </div>
                                        <h4 class="mb-2">{{ Auth::user()->name }}</h4>
                                        <p class="text-muted mb-4">{{ $company->companyName }}<span class="mx-2">|</span>
                                            <a href="#!">{{ $company->website }}</a>
                                        </p>
                                        <div class="mb-4 pb-2">
                                            <button type="button" class="btn btn-outline-primary btn-floating">
                                                <i class="fab fa-facebook-f fa-lg"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-floating">
                                                <i class="fab fa-twitter fa-lg"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary btn-floating">
                                                <i class="fab fa-skype fa-lg"></i>
                                            </button>
                                        </div>
                                        <a type="button" href="/companies/{{ $company->id }}/edit"
                                            class="btn btn-primary btn-rounded btn-lg">
                                            Edit Profile
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            @else
                <div class="container mt-5">
                    <div class="card-header bg-light text-primary" style="margin-bottom:2em">
                        Manage User and Company Details
                    </div>
                    <div class="card-body">
                        <h5 class="card-title mb-3">Company Details</h5>
                        @include('components.message')
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="/companies" accept="image/*" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Company Name</label>
                                        <input type="text" name="companyName" id="form6Example1"
                                            class="form-control @error('companyName')  is-invalid @enderror"
                                            value="{{ old('companyName') }}" />
                                        @error('companyName')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label for="formFile" class="form-label">Company Logo</label>
                                        <input class="form-control @error('companyLogo')  is-invalid @enderror"
                                            name="companyLogo" type="file" value="{{ old('companyLogo') }}"
                                            id="formFile">
                                        @error('companyLogo')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example1">Phone</label>
                                        <input type="text" name="telePhoneNumber"
                                            class="form-control @error('telePhoneNumber')  is-invalid @enderror"
                                            id="form6Example1" value="{{ old('telePhoneNumber') }}" />
                                        @error('telePhoneNumber')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form6Example2">Website</label>
                                        <input type="link" name="website"
                                            class="form-control @error('website')  is-invalid @enderror" id="form6Example2"
                                            value="{{ old('website') }}" />
                                        @error('website')
                                            <span class="text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-outline">
                                    <input type="link" name="user_id"
                                        class="form-control invisible @error('user_id')  is-invalid @enderror"
                                        id="form6Example2" value="{{ auth()->user()->id }}" />
                                    @error('user_id')
                                        <span class="text-danger invisible">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Save Company</button>
                        </form>
                    </div>
            @endif
        @endforeach

    </div>
@endsection
