@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border border-light">
            <div class="card-header bg-light text-primary">
                Manage Points
            </div>
            <div class="card-body">
                <h5 class="card-title mb-3">Add Store</h5>
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
                <form method="POST" action="/stores" accept="image/*" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example11">Store Name</label>
                                <input type="text" name="storeName"
                                    class="form-control @error('storeName') is-invalid @enderror"
                                    value="{{ old('storeName') }}" id="form6Example11" />
                                @error('storeName')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example12">Address</label>
                                <input type="text" name="storeAddress" value="{{ old('storeAddress') }}"
                                    class="form-control @error('storeAddress') is-invalid @enderror" id="form6Example12" />
                                @error('storeAddress')
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
                                <label class="form-label" for="formExample0">Phone</label>
                                <input type="text" id="formExample0" name="telePhoneNumber"
                                    value="{{ old('telePhoneNumber') }}"
                                    class="form-control @error('telePhoneNumber') is-invalid @enderror" />
                                @error('telePhoneNumber')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="formExample1">Longitude</label>
                                <input type="text" id="formExample1" name="longitude" value="{{ old('longitude') }}"
                                    class="form-control @error('longitude') is-invalid @enderror" />
                                @error('longitude')
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
                                <label class="form-label" for="form6Example">Latitude</label>
                                <input type="text" id="form6Example" name="latitude" value="{{ old('latitude') }}"
                                    class="form-control @error('latitude') is-invalid @enderror" />
                                @error('latitude')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="formExample2">Store Type</label>
                                <select name="storeType_id" class="form-select" aria-label="Default select example">
                                    <option selected>Select Store Type</option>
                                    @foreach ($storetypes as $storetype)
                                        <option value="{{ $storetype->id }}">
                                            {{ $storetype->storeType }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="form6Example3">Company</label>
                                <select name="company_id" class="form-select" aria-label="Default select example">
                                    <option selected>Select Company</option>
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">
                                            {{ $company->companyName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label for="formFile" class="form-label">Company Photo</label>
                                <input type="file" id="formFile" name="storePhoto" value="{{ old('storePhoto') }}"
                                    class="form-control @error('storePhoto') is-invalid @enderror" />
                                @error('storePhoto')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col mb-4">
                        <div class="form-outline">
                            <div class="form-group">
                                <label for="tags">Tags:</label>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="tagsDropdown"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Select Tags
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="tagsDropdown">
                                        @foreach ($tags as $tag)
                                            <li>
                                                <input class="form-check-input" type="checkbox" name="tags[]"
                                                    value="{{ $tag->id }}" id="tag{{ $tag->id }}">
                                                <label class="form-check-label text-black" for="tag{{ $tag->id }}">
                                                    {{ $tag->tagName }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-4 mt-4">Add Store</button>
                </form>
            </div>
        </div>
    </div>
@endsection
