@extends('layouts.default')

@section('content')

<div class="rdow d-flex justify-content-between">
    <div style="width: 15%;height: 35rem; position: relative">
        <h3 style="position: absolute;top:40%" class="fw-bold text-center">Select store from the Map:</h3>
    </div>
    <div class="me-4" style="width: 80%">
        @include('components.map')
    </div>
</div>

{{-- <form class="w-100" action="{{url('/type-store')}}" method="POST">
    @csrf
    <label class="fw-bold">Name</label>
    <div class="form-group d-flex justify-content-between">
            <div style="width: 80%">
                <input value="{{ old('typename') }}" class="form-control @error('typename') is-invalid @enderror " type="text" placeholder="Enter new type" name="typename" class="form-control">
                @error('typename')
                    <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                @enderror
            </div>
            <button style="width: 4.5rem; height:2.3rem" type="submit" class=" p-0 float-right btn btn-success">Save</button>
    </div>

</form> --}}


@endsection

@section('script')
    <script src="{{ asset('js/maps.js') }}"></script>
@endsection