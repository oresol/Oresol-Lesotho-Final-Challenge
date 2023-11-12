@extends('layouts.app')

@section('content')
    <div class="container">
        <x-maps-leaflet></x-maps-leaflet>

        {{-- set the centerpoint of the map: --}}
        <x-maps-leaflet :centerPoint="['lat' => 52.16, 'long' => 5]"></x-maps-leaflet>

        {{-- set a zoomlevel: --}}
        <x-maps-leaflet :zoomLevel="6"></x-maps-leaflet>

        {{-- Set markers on the map: --}}
        <x-maps-leaflet :markers="[['lat' => 52.16444513293423, 'long' => 5.985622388024091]]"></x-maps-leaflet>
    </div>
@endsection
