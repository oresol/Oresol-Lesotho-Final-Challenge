@extends('layouts.default')

@section('content')

<div class="card me-4">
    <div class="card-body">
        <h3 class="card-title fw-bold py-4">Create new type:</h3>
        <form class="w-100" action="{{url('/type-store')}}" method="POST">
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

        </form>
        <ul class="list-group my-4">
            @foreach ($types as $type)
                <li class="list-group-item">
                    {{-- <form id="{{$type->typename.'fm'}}" class="w-100 my-2" style="display: none" action="{{route('edittype', $type->id)}}" method="POST">
                        @csrf
                        <div class="form-group d-flex justify-content-between">
                            <div style="width: 80%">
                                <input value="{{$type->typename}}" type="text" name="typename" class="@error('typename') is-invalid @enderror form-control">
                            </div>
                            <button style="width: 4.5rem;" type="submit" class="float-right btn btn-success">Save</button>
                        </div>
                    </form> --}}


                    <div id="{{$type->typename}}" class="d-flex justify-content-between">
                        <span>{{$type->typename}}</span> 
                        <span> 
                            <a  style="width: 4.5rem;" class="btn btn-info">Edit</a>
                            <form style="width: 4.5rem" class="d-inline-block" action="{{route('typedelete', $type->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button style="width: 4.5rem;" type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </span>
                    </div>
                </li>
            @endforeach 
        </ul>
    </div>
</div>  
@endsection