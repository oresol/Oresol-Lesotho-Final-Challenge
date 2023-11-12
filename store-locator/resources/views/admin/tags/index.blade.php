<div class="container" style="margin-top: 15%;">
<div class="panel-heading">
    <h4>Manage Tags</h4>
</div>
    <table class="table table-hover">
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
        <thead>
            <tr>
                <th>Tag ID</th>
                <th>Admin ID</th>
                <th>Tag Name</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->admin_id }}</td>
                    <td>{{ $tag->tag_name }}</td>
                    <td>{{ $tag->created_at }}</td>
                    <td>
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary" data-toggle="modal" data-target="#editTag{{ $tag->id }}">Edit</a>
                        <a href="#" class="btn btn-danger" data-action="{{ route('tags.destroy', $tag->id) }}" data-toggle="modal" data-target="#deleteTag{{ $tag->id }}">Delete</a> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
        {!! $tags->links('pagination::bootstrap-4') !!}
        </div> 
    </div>

@foreach ($tags as $tag)
    <div class="modal" id="editTag{{$tag->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Tag Details</h5>
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
                <form name="tag_data" id="tag_data" method="post" action="/tags/{{ $tag->id }}">
                {{csrf_field()}}  
                {{method_field('PUT')}}                                                  
                    <div class="form-group">
                    <label for="tag_name">Tag Name</label>
                    <input type="text" id="tag_name" name="tag_name"  value="{{$tag->tag_name}}" class="form-control" required="">
                    </div>
                    <button type="submit" class="btn btn-success">Update Tag</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endforeach

@foreach ($tags as $tag)
    <div class="modal" id="deleteTag{{$tag->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form method="post" action="/tags/{{ $tag->id }}">
            <div class="modal-header">
                <h5 class="modal-title">Delete Tag Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete Category details of {{$tag->tag_name}}?</p>
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