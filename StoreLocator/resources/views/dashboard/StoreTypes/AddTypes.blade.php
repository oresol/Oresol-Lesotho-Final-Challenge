@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Manage Store Types') }}</div>
                    <div class="card-body">
                        @include('components.message')
                        <form action="/storetypes" method="POST">
                            @csrf
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form6Example1">Category Name</label>
                                <input type="text" name="storeType" id="form6Example1"
                                    class="form-control @error('storeType') is-invalid @enderror"
                                    value="{{ old('storeType') }}" />
                                @error('storeType')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Add Category</button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
