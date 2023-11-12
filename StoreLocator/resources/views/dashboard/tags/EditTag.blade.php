@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Tag') }}</div>
                    <div class="card-body">
                        @include('components.message')
                        <form action="/tags/{{ $tag->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-outline mb-3">
                                <label class="form-label" for="form6Example1">Tag Name</label>
                                <input type="text" name="tagName" id="form6Example1" value="{{ $tag->tagName }}"
                                    class="form-control @error('tagName') is-invalid @enderror" />
                                @error('tagName')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Edit Tag</button>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
