@extends('layouts.default')

@section('content')
    <div class="card me-4">
        @include('components.map')
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/maps.js') }}"></script>
@endsection