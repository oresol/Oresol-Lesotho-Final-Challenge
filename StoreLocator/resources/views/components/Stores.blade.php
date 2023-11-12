<table class="table align-middle mb-0 bg-white">
    <thead class="bg-light">
        <tr>
            <th>Store Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Longitude</th>
            <th>Latitude</th>
            {{-- <th>Type</th> --}}
            <th>Company</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('storage/' . $store->storePhoto) }}" alt=""
                            style="width: 40px; height: 40px" class="rounded-circle" />
                        <div class="ms-3">
                            <p class="fw-bold mb-1">{{ $store->storeName }}</p>
                        </div>
                    </div>
                </td>
                <td>
                    {{ $store->storeAddress }}
                </td>
                <td>
                    {{ $store->telePhoneNumber }}
                </td>
                <td>
                    {{ $store->longitude }}
                </td>
                <td>
                    {{ $store->latitude }}
                </td>
                {{-- <td>

                    {{ $store->storetype->storeType }}

                </td> --}}
                <td>
                    {{ $store->company->companyName }}
                </td>
                <td>
                    <form action="/stores/{{ $store->id }} method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-xs btn-rounded">
                            Delete
                        </button>
                    </form>
                    <a href="/stores/{{ $store->id }}/edit" class="btn btn-primary btn-xsbtn-rounded">
                        Edit
                    </a>
                    <a href="/stores/{{ $store->id }}" class="btn btn-success btn-xs btn-rounded">
                        View
                    </a>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
