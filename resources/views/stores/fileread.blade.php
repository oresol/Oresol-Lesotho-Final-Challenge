@extends('layouts.default')

@section('content')

@if(Session::has('success'))
    {{-- @include('components.modal') --}}
@endif



<div class="row d-flex justify-content-center" style="margin-top: 0rem">
    <div class="col-md-6">
        <div class="card my-2 ">
            <div class="card-body">
                <h3 class="card-title fw-bold py-4 rounded text-center" style="background: #e5e4e2">Upload stores from file</h3>

                <p class="fw-bold m-0">NB: Please ensure stores are stored in the format displayed in the example below</p>
                <p class="fw-bold mt-0 p-0">(n) infront of latitude stands for negative(-) sign</p>
                <img src="{{asset('images/assets/format.png')}}" width="550" alt="format" srcset="">
                <form action="{{route('stores.read')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-3">
                        <label class="fw-bold">Select file to read</label>
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
            @if ($errors->any('errors'))
                <span class="text-danger text-center ms-2 mb-2 fw-bold mb-1" >{{$errors->first('errors')}}</span>                                
            @endif 
            @if(Session::has('success'))
                <div class="alert text-center alert-success mt-2" >{{Session::get('success')}}</div>
            @endif
        </div>

    </div>
</div>
@endsection