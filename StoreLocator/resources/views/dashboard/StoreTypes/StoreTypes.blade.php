@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        </div>
        <div class="card">
            <div class="card-header d-flex p-2 justify-content-between">
                {{ __('Manage Store Types') }}
                <a href="/dashboard/add-store-stype" class="btn btn-primary ">Add Types</a>
            </div>
            <div class="card-body">
                <div class="mt-4">
                    @include('components.Categories')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
