@extends('layouts.default')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
@endsection

@section('content')
    @guest
     <div class="card me-4">
         @include('components.map')
     </div>  
     @else
        <div class="row d-flex">
            <div style="width: 23%" class="">
                <div class="card me-4">
                    <div class="card-body">
                        <h3 class="card-title fw-bold py-4 border rounded text-center" style="background: #e5e4e2">Filters</h3>
                        {{-- <form class="w-full" method="get">
                            @csrf
                            <div class="form-group my-4">
                                    <label for="name" class="fw-bold my-2">Search Address</label>
                                    <input id="address" class="form-control" type="text" placeholder="Enter address" name="address" class="form-control">
                            </div>
                            <button type="submit" onclick="searchAddress()" class="btn btn-success w-100 p-1 " style="margin-top: -1.6rem">Search</button>
                        </form> --}}
                        <form>
                            <div class="form-group my-3">
                                <label class="fw-bold my-2">Filter by type:</label>
                                <select id="typeSelect" value= "" onchange="filterType()" class="form-control" name="typename" id="type">
                                    <option value="">All types</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->typename}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="me-1" style="width: 73%">
                @include('components.map')
            </div>
        </div>
    @endguest
@endsection

@section('script')
    @guest
        <script src="{{ asset('js/maps.js') }}"></script>
    @else
        <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
        <script src="{{ asset('js/maps.js') }}"></script>
    @endguest
@endsection