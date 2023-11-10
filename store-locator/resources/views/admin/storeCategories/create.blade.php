
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Create Category
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
          <form method="POST" action="/categories">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" required>
            </div>
            @error('category_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror<br>

            <button type="submit" class="btn btn-success">Add Categories</button>
        </form>

        </div>
      </div>
    </div>
  </div>
</div>