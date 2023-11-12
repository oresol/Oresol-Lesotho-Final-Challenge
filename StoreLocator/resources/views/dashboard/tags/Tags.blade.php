@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex p-2 justify-content-between">
                {{ __('Manage Tags') }}
                <a href="/dashboard/addtaggs" class="btn btn-primary ">Add Tag</a>
            </div>
            <div class="mt-4">
                @include('components.Tags')
            </div>
        </div>
    </div>
    </div>
@endsection
