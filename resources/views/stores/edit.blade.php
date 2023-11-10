@extends('layouts.default')

@section('content')



<div class="row">
    <div class="col-md-5">
        <div class="card my-2">
            <div class="card-body">
                <h3 class="card-title fw-bold py-4 rounded text-center" style="background: #e5e4e2">Edit store:</h3>
                @if ($errors->any())
                    <span class="text-danger fw-bold mb-1" style="margin-top: 5rem" >Some errors occured!! Check below</span>                                
                @endif     
                <form class="w-full" action="{{route('storeupdate', $store->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-3">
                            <label for="name" class="fw-bold">name</label>
                            <input value="{{ $store->name }}" class="form-control @error('name') is-invalid @enderror " type="text" placeholder="Enter store name" name="name" class="form-control">
                    </div>
                    @error('name')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror
                    <div class="form-group my-3">
                        <label for="telephone" class="fw-bold">telephone</label>
                        <input value="{{ $store->telephone }}" class="form-control @error('telephone') is-invalid @enderror " type="text" placeholder="Enter telephone number" name="telephone" class="form-control">
                    </div>
                    @error('telephone')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror
                    <div class="form-group my-3">
                        <label for="longitude" class="fw-bold">longitude</label>
                        <input readonly value="{{ $store->longitude }}" class="form-control @error('longitude') is-invalid @enderror " type="text" placeholder="Click on the map to select longitude" id="longitude" name="longitude" class="form-control">
                    </div>
                    @error('longitude')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror

                    <div class="form-group my-3">
                        <label for="latitude" class="fw-bold">latitude</label>
                        <input readonly value="{{ $store->latitude }}" class="form-control @error('latitude') is-invalid @enderror " type="text" placeholder="Click on the map to select latitude" id="latitude" name="latitude" class="form-control">
                    </div>
                    @error('latitude')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror

                    <div class="form-group my-3">
                        <label for="address" class="fw-bold">address</label>
                        <input value="{{ $store->address }}" class="form-control @error('address') is-invalid @enderror " type="text" placeholder="Enter address" name="address" class="form-control">
                    </div>
                    @error('address')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror

                    <div class="form-group my-3">
                        <label for="tags" class="fw-bold">tags</label>
                        <input value="{{ $tags }}" class="form-control @error('tags') is-invalid @enderror " type="text" placeholder="Enter tags, Comma seperated" name="tags" class="form-control">
                    </div>
                    @error('tags')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror

                    <div class="form-group my-3">
                        <label class="fw-bold">Select Type:</label>
                        <select value= "" class="form-control" name="typename" id="type">
                            <option value="">Choose here</option>
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->typename}}</option>
                            @endforeach
                        </select>
                        @error('typename')
                            <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group my-3">
                        <label class="fw-bold">Photo</label>
                        <input type="file"  name="image" class="@error('image') is-invalid @enderror form-control" accept="image/*">
                        @error('image')
                            <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="col-md-6">
        @include('components.map')
        @if(Session::has('success'))
            <div class="alert alert-success mt-2" >{{Session::get('success')}}</div>
        @endif
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('js/maps.js') }}"></script>
@endsection