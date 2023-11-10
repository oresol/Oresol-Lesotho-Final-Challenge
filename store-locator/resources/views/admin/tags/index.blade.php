<div class="container" style="margin-top: 15%;">
<div class="panel-heading">
    <h4>Manage Tags</h4>
</div>
    <table class="table table-hover">
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
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="">Edit</a>
                        <a href="#" class="btn btn-danger" data-action="" data-toggle="modal" data-target="">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex">
    
    </div>
</div>