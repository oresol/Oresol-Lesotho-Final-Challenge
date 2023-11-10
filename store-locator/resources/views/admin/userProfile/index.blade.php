<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-success text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h4>User Profile</h4>
                <div class="d-flex">
                    <a href=""  class="btn btn-light mr-2">Edit Profile</a>
                    <a href="" data-toggle="modal"  data-target="#profile" class="btn btn-light">Add User Details</a>
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
                        <li class="list-group-item"><strong>Name:</strong>Nosi Chefane</li>
                        <li class="list-group-item"><strong>Email:</strong> john.doe@example.com</li>
                        <li class="list-group-item"><strong>Gender:</strong>Male</li>
                        <li class="list-group-item"><strong>Position:</strong>Administrator</li>
                        <li class="list-group-item"><strong>Telephone Number:</strong>+26659146533</li>
                        <li class="list-group-item"><strong>Member Since:</strong> January 1, 2022</li>
                    </ul>
                </div>
            </div>
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
                <form method="POST" action="/categories">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label for="category_name">Names</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter  Names" required>
                    </div>
                    @error('names')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <div class="form-group">
                        <label for="email_address">Email Address</label>
                        <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Enter Email Address" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror<br>
                    <select class="form-select" aria-label="Default select example">
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


<!-- @foreach ($categories as $category)
    <div class="modal" id="deleteCategory{{$category->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="post" action="/categories/{{ $category->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Delete Category Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete Category details of {{$category->category_name}}?</p>
            </div>
            <div class="modal-footer">
                {{ method_field('delete') }}
                {{csrf_field()}}  
                <input class="btn btn-danger" type="submit" value="Delete" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
    </div>
@endforeach    -->
