<table class="table">
    <thead>
        <tr>
            <th scope="col">Tag Id</th>
            <th scope="col">Tag Name</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
            <tr>
                <td>
                    <p class="fw-normal mb-1">{{ $tag->id }}</p>
                </td>
                <td>{{ $tag->tagName }}</td>
                <td>
                    <form action="/tags/{{ $tag->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="/edit-tag" class="btn btn-primary">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
