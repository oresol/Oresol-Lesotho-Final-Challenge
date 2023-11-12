
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Create a Store
        </div>
        <div class="card-body">
        @if(session('message'))
            <div class="alert alert-danger">
              {{ session('message') }}
            </div>
          @endif

          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif
          <form method="POST" action="/stores"  accept="image/*" enctype="multipart/form-data">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="store_name">Store Name</label>
                <input type="text" class="form-control" id = "store_name"  name="store_name" placeholder="Enter Store Name" required>
            </div>
            @error('store_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror<br>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id = "address"  name="address" placeholder="Enter Address" required>
            </div>
            @error('address')
                <span class="text-danger">{{ $message }}</span>
            @enderror<br>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" class="form-control" id = "telephone"  name="telephone" placeholder="telephone" required>
            </div>
            @error('telephone')
                <span class="text-danger">{{ $message }}</span>
            @enderror<br>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" class="form-control" id = "longitude"  name="longitude" placeholder="Enter Longitude" required>
            </div>
            @error('longitude')
                <span class="text-danger">{{ $message }}</span>
            @enderror<br>
            <div class="form-group">
                <label for="altitude">Latitude</label>
                <input type="text" class="form-control" id = "latitude"  name="latitude" placeholder="Enter latitude" required>
            </div>
            @error('latitude')
                <span class="text-danger">{{ $message }}</span>
            @enderror<br>
            <div class="form-group">
                <label for="store_type">Store Type</label>
                <select class="form-select" name="store_type" aria-label="Default select example">
                    <option selected>Select Store Type</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['category_name'] }}">{{ $category['category_name'] }}</option>
                    @endforeach
                </select>
            </div>
            @error('store_type')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
                <label for="tags">Tags</label>
                <select class="form-control" id="tags" name="tags[]" multiple>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                    @endforeach
                </select>
            </div>
            @error('tags')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <div class="form-group">
               <label for="photo">Store Photo</label>
                  <input type="file" class="form-control-file" id="photo" name="photo">
                </div>
            @error('photo')
              <span class="text-danger">{{ $message }}</span>
            @enderror

            <button type="submit" class="btn btn-success">Add Store</button>
        </form>

        </div>
      </div>
    </div>
  </div>
</div>