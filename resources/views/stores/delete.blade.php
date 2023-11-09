@extends('layouts.default')

@section('content')



<div class="row d-flex justify-content-center">
    <div class="col-md-11">
        <div class="card my-2">
            <div class="card-body">
                <h3 class="card-title fw-bold py-4">Delete store:</h3>
                <form class="w-full" action="{{route('storedelete', $store->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                    <div class="form-group my-3">
                            <label for="name" class="fw-bold">name</label>
                            <input readonly value="{{ $store->name }}" class="form-control" type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group my-3">
                        <label for="longitude" class="fw-bold">longitude</label>
                        <input readonly value="{{ $store->longitude }}" class="form-control" type="text" id="longitude" name="longitude" class="form-control">
                    </div>

                    <div class="form-group my-3">
                        <label for="latitude" class="fw-bold">latitude</label>
                        <input readonly value="{{ $store->latitude }}" class="form-control" type="text" id="latitude" name="latitude" class="form-control">
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
    {{-- <div class="col-md-6">
        @include('components.map')
        @if(Session::has('success'))
            <div class="alert alert-success mt-2" >{{Session::get('success')}}</div>
        @endif
    </div> --}}
</div>

@endsection

{{-- @section('script')
    <script src="{{ asset('js/maps.js') }}"></script>
@endsection --}}