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
                <h4>User Profile</h4>
                <div class="d-flex">
                  <a href="" data-toggle="modal"  data-target="#profile" class="btn btn-light">Add User Details</a>
                 @foreach($user as $profile)
                  <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-light" data-toggle="modal" data-target="#editProfile{{ $profile->id }}" mr-2>Edit Profile</a>
                </div>
            </div>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <img src="https://creazilla-store.fra1.digitaloceanspaces.com/icons/7915728/user-icon-md.png" width="150" height="150" alt="Profile Picture" class="img-fluid rounded-circle">
            </div>
            <div class="col-md-8">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Name:</strong> {{ $profile->names }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $profile->email }}</li>
                    <li class="list-group-item"><strong>Gender:</strong> {{ $profile->gender }}</li>
                    <li class="list-group-item"><strong>Position:</strong> {{ $profile->position }}</li>
                    <li class="list-group-item"><strong>Telephone Number:</strong> {{ $profile->telephone }}</li>
                    <li class="list-group-item"><strong>Member Since:</strong> {{ $profile->created_at->format('F d, Y') }}</li>
                </ul>
            </div>
        </div>
        <hr>
    @endforeach
</div>

    </div>
</div>

    <div class="modal" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Profile Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="container mt-4">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                </div>
                <div class="card-body">
                <form method="POST" action="/profile">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="category_name">Names</label>
                        <input type="text" class="form-control" id="names" name="names" placeholder="Enter  Names" required>
                    </div>
                    @error('names')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <div class="form-group">
                        <label for="email_address">Email Address</label>
                        <input type="text" class="form-control" id="email_address" name="email" placeholder="Enter Email Address" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Enter Telephone" required>
                    </div>
                    @error('telephone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="Enter Position Name" required>
                    </div>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>

                    <button type="submit" class="btn btn-success">Add Your Profile</button>
                </form>

                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>


@foreach ($user as $profile)
    <div class="modal" id="editProfile{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Profile Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <div class="container mt-4">
            @if(session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                </div>
                <div class="card-body">
                <form method="POST" action="/profile/{{ $profile->id }}">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}  
                    <div class="form-group">
                        <label for="category_name">Names</label>
                        <input type="text" class="form-control" id="names" name="names" value="{{$profile->names}}" placeholder="Enter  Names" required>
                    </div>
                    @error('names')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <div class="form-group">
                        <label for="email_address">Email Address</label>
                        <input type="text" class="form-control" id="email_address" name="email" value="{{$profile->email}}" placeholder="Enter Email Address" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <select class="form-select" name="gender" aria-label="Default select example">
                        <option value="" {{ $profile->gender === '' ? 'selected' : '' }}>Select Gender</option>
                        <option value="male" {{ $profile->gender === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $profile->gender === 'female' ? 'selected' : '' }}>Female</option>
                    </select>

                    @error('gender')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <div class="form-group">
                        <label for="telephone">Telephone</label>
                        <input type="text" class="form-control" id="telephone" name="telephone"  value="{{$profile->telephone}}" placeholder="Enter Telephone" required>
                    </div>
                    @error('telephone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <div class="form-group">
                        <label for="position">Position</label>
                        <input type="text" class="form-control" id="position" name="position"  value="{{$profile->position}}" placeholder="Enter Position Name" required>
                    </div>
                    @error('position')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>

                    <button type="submit" class="btn btn-success">Update Your Profile</button>
                </form>

                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>

@endforeach   
