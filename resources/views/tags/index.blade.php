@extends('layouts.default')

@section('content')

<div class="card me-4">
    <div class="card-body">
        <h3 class="card-title fw-bold py-4 text-center rounded" style="background: #e5e4e2">Create new tag:</h3>
        <form class="w-100" action="{{url('/tag-store')}}" method="POST">
            @csrf
            <label class="fw-bold">Name</label>
            <div class="form-group d-flex justify-content-between">
                    <div style="width: 80%">
                        <input value="{{ old('tagname') }}" class="form-control @error('tagname') is-invalid @enderror " type="text" placeholder="Enter new type" name="tagname" class="form-control">
                        @error('tagname')
                            <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <button style="width: 4.5rem; height:2.3rem" type="submit" class=" p-0 float-right btn btn-success">Save</button>
            </div>

        </form>
        <ul class="list-group my-4">
            @foreach ($tags as $tag)
                <li class="list-group-item">
                    <form id="{{$tag->tagname.'fm'}}" class="w-100 my-2" style="display: none" action="{{route('tagupdate', $tag->id)}}" method="POST">
                        @csrf
                        <div class="form-group d-flex justify-content-between">
                            <div style="width: 80%">
                                <input value="{{$tag->tagname}}" type="text" name="tagname" class="@error('tagname') is-invalid @enderror form-control">
                            </div>
                            <button style="width: 4.5rem;" type="submit" class="float-right btn btn-success">Save</button>
                        </div>
                        @error('tagname')
                            <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                        @enderror
                    </form>

                    <div id="{{$tag->tagname}}" class="d-flex justify-content-between">
                        <span>{{$tag->tagname}}</span> 
                        <span> 
                            <a onclick="editItem({{$tag->tagname}})" style="width: 4.5rem;" class="btn btn-info">Edit</a>
                            <form style="width: 4.5rem" class="d-inline-block" action="{{route('tagdelete', $tag->id)}}" method="post">
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

@section('script')
    <script src="{{ asset('js/types.js') }}"></script>
@endsection