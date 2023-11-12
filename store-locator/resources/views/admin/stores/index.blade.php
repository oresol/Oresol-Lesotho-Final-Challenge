<div class="container">
<div class="container text-center">
    <h1>Registered Stores</h1>
</div>
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

    <div class="container mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Store Photo</th>
                <th>Store Name</th>
                <th>Store Type</th>
                <th>Address</th>
                <th>Telephone</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($stores as $store)
                <tr>
                    <td><img src="{{ asset('storage/images/' . $store->photo) }}" alt="Store Photo" width="100" height="75"></td>
                    <td>{{ $store->store_name }}</td>
                    <td>{{ $store->store_type }}</td>
                    <td>{{ $store->address }}</td>
                    <td>{{ $store->telephone }}</td>
                    <td>{{ $store->longitude }}</td>
                    <td>{{ $store->latitude }}</td>
                    <td>
                        <a href="{{ route('stores.edit', $store->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#editStore{{ $store->id }}">Edit</a>
                        <a href="#" class="btn btn-danger" data-action="{{ route('stores.destroy', $store->id) }}" data-toggle="modal" data-target="#deleteStore{{ $store->id }}">Delete</a> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</div>

@foreach ($stores as $store)
<div class="modal" id="editStore{{ $store->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Store Details</h5>
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
                        <form method="POST" action="/stores/{{ $store->id }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="form-group">
                                <label for="store_name">Store Name</label>
                                <input type="text" class="form-control" id="store_name" name="store_name"
                                value="{{ $store->store_name }}"  placeholder="Enter Store Name" required>
                            </div>
                            @error('store_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                value="{{ $store->address }}"   placeholder="Enter Address" required>
                            </div>
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <label for="telephone">Telephone</label>
                                <input type="text" class="form-control" id="telephone" name="telephone"
                                value="{{ $store->telephone}}" placeholder="Enter Telephone Number" required>
                            </div>
                            @error('telephone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" 
                                value="{{ $store->longitude }}"  placeholder="Enter Longitude">
                            </div>
                            @error('longitude')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" 
                                value="{{ $store->latitude }}"  placeholder="Enter Latitude">
                            </div>
                            @error('latitude')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <button type="submit" class="btn btn-success">Update Store</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endforeach


@foreach ($stores as $store)
    <div class="modal" id="deleteStore{{$store->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="post" action="/stores/{{ $store->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Delete Store Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete Store details of {{$store->store_name}}?</p>
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
@endforeach  
