@extends('layouts.default')

@section('content')

@if(Session::has('success'))
    {{-- @include('components.modal') --}}
@endif



<div class="row d-flex justify-content-center" style="margin-top: 8rem">
    <div class="col-md-6">
        <div class="card my-2 ">
            <div class="card-body">
                <h3 class="card-title fw-bold py-4 rounded text-center" style="background: #e5e4e2">Upload stores from file</h3>
                <form action="{{route('stores.read')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-3">
                        <label class="fw-bold">Select Xls file to read</label>
                        <input type="file"  name="file" class="@error('file') is-invalid @enderror form-control" accept=".xls,.xlsx">
                        @error('file')
                            <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3 d-flex justify-content-center">
                        <button type="submit" style="width: 15rem" class="btn btn-success">Read file</button>
                    </div>
                </form>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection