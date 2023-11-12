
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Create a Tag
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
          <form method="POST" action="/tags">
            {{ csrf_field() }}
            
            <div class="form-group">
                <label for="tag_name">Tag Name</label>
                <input type="text" class="form-control" id = "tag_name"  name="tag_name" placeholder="Enter Tag Name" required>
            </div>
            @error('tag_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror<br>

            <button type="submit" class="btn btn-success">Add Tag</button>
        </form>

        </div>
      </div>
    </div>
  </div>
</div>