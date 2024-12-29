<table class="table mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Photo</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($locations as $location)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $location->name }}</td>
                <td>{{ $location->address }}</td>
                <td>
                    @if ($location->photo)
                        <img src="{{ asset('storage/' . $location->photo) }}" alt="{{ $location->name }}" width="100">
                    @else
                        No Photo
                    @endif
                </td>
                <td>{{ $location->latitude }}</td>
                <td>{{ $location->longitude }}</td>
                <td>
                    <a href="{{ route('locations.edit', $location->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this location?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
