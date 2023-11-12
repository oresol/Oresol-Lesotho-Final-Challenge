@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manage Store Types') }}</div>
                    <div class="card-body">
                        @include('components.message')
                        <form action="/storetypes/{{ $storetype->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form6Example1">Category Name</label>
                                <input type="text" id="form6Example1" name="storeType"
                                    class="form-control @error('storeType') is-invalid @enderror"
                                    value="{{ $storetype->storeType }}" />
                                @error('storeType')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Edit Category</button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
