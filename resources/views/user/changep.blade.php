@extends('layouts.default')

@section('content')

<div class="row d-flex justify-content-center " style="margin-top: 4.5rem">
    <div class="col-md-8">
        <div class="card my-2">
            <div class="card-body">
                <h3 class="card-title fw-bold py-4 rounded text-center" style="background: #e5e4e2">Change Password</h3>
                <form class="w-full" action="{{url('/update-password')}}" method="POST">
                    @csrf
                    <div class="form-group my-3">
                            <label class="fw-bold">Old Password</label>
                            <input class="form-control @error('old_password') is-invalid @enderror " type="password" name="old_password" class="form-control">
                    </div>
                    @error('old_password')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror

                    <div class="form-group my-3">
                        <label class="fw-bold">New Password</label>
                        <input class="form-control @error('new_password') is-invalid @enderror" type="password" name="new_password" class="form-control">
                    </div>
                    @error('new_password')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror
                    <div class="form-group my-3">
                        <label class="fw-bold">Comfirm Password</label>
                        <input class="form-control @error('confirm_password') is-invalid @enderror " type="password" name="confirm_password" class="form-control">
                    </div>
                    @error('confirm_password')
                        <span class="fw-bold text-danger" role="alert">{{ $message }}</span>
                    @enderror 

                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Update password</button>
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success mt-3" >{{Session::get('success')}}</div>
                    @endif
                </form>
            </div>
        </div>

    </div>
</div>
@endsection