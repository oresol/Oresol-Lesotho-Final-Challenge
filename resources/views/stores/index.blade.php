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


@endsection

@section('script')
    <script src="{{ asset('js/maps.js') }}"></script>
@endsection