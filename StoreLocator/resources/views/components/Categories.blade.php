<table class="table align-middle mb-0 bg-white">
    @include('components.message')
    <thead class="bg-light">
        <tr>
            <th>Category Id</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($storetypes as $storetype)
            <tr>
                <td>
                    <p class="fw-normal mb-1">{{ $storetype->id }}</p>
                </td>
                <td>{{ $storetype->storeType }}</td>
                <td>
                    <form action="/storetypes/{{ $storetype->id }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <a href="/storetypes/{{ $storetype->id }}/edit" class="btn btn-primary">Edit</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
