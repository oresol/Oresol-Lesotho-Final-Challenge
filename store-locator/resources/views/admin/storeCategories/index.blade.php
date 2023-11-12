<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Manage Categories</h4>       
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
                    
        <div class="container" style="margin-top: 7%;">
           
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Category ID</th>
                    <th>Admin ID</th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->admin_id }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#editCategory{{ $category->id }}">Edit</a>
                        <a href="#" class="btn btn-danger" data-action="{{ route('categories.destroy', $category->id) }}" data-toggle="modal" data-target="#deleteCategory{{ $category->id }}">Delete</a> 
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
            <div class="d-flex">
            </div> 


    @foreach ($categories as $category)
    <div class="modal" id="editCategory{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Category Details</h5>
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
                <form name="category_data" id="category_data" method="post" action="/categories/{{ $category->id }}">
                {{csrf_field()}}  
                {{method_field('PUT')}}                                                  
                    <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" id="category_name" name="category_name"  value="{{$category->category_name}}" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-success">Update Category</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endforeach


@foreach ($categories as $category)
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
@endforeach  



