<div class="container mt-5">
    @if (Session::has('error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error') }}
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Company Profile</h4>

                <div class="d-flex">
                    @foreach ($company as $profile)
                        <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-light" data-toggle="modal"
                            data-target="#editProfile{{ $profile->id }}" mr-2>Edit Profile</a>
                    @endforeach
                    <a href="#" data-toggle="modal" data-target="#profile" class="btn btn-light">Add Company
                        Details</a>
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                 @foreach ($company as $profile)
                    <img src="{{ asset('storage/images/' . $profile->image_path) }}"
                        width="150" height="150" alt="Profile Picture" class="img-fluid rounded-circle">
                </div>
                <div class="col-md-8">
                    <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Name:</strong> {{ $profile->company_name }}</li>
                            <li class="list-group-item"><strong>Website:</strong> {{ $profile->website }}</li>
                            <li class="list-group-item"><strong>Telephone Number:</strong>
                                {{ $profile->telephone_number }}</li>
                            <li class="list-group-item"><strong>Member Since:</strong>
                                {{ $profile->created_at->format('F j, Y') }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <hr>
        </div>

    </div>
</div>

<div class="modal" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Company Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container mt-4">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/company" accept="image/*" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name"
                                    placeholder="Enter Company Name" required>
                            </div>
                            @error('company_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website" name="website"
                                    placeholder="Enter Website" required>
                            </div>
                            @error('website')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <label for="telephone_number">Telephone</label>
                                <input type="text" class="form-control" id="telephone_number" name="telephone_number"
                                    placeholder="Enter Telephone Number" required>
                            </div>
                            @error('telephone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <label for="image">Profile Image</label>
                                <input type="file" class="form-control-file" id="image" name="image_path">
                            </div>
                            @error('image_path')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-success">Add Company Profile</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



@foreach ($company as $profile)
    <div class="modal" id="editProfile{{ $profile->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Company Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container mt-4">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/company/{{ $profile->id }}"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}

                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" id="company_name" name="company_name"
                                        value="{{ $profile->company_name }}" placeholder="Enter Company Name"
                                        required>
                                    @error('company_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input type="text" class="form-control" id="website" name="website"
                                        value="{{ $profile->website }}" placeholder="Enter Website" required>
                                    @error('website')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="telephone_number">Telephone</label>
                                    <input type="text" class="form-control" id="telephone_number"
                                        name="telephone_number" value="{{ $profile->telephone_number }}"
                                        placeholder="Enter Telephone Number" required>
                                    @error('telephone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success">Update Company Profile</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endforeach
