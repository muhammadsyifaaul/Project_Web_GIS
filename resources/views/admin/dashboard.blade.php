<table class="table mt-4">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Photo</th>
            <th>Latitude</th>
            <th>Longitude</th>
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
            </tr>
        @endforeach
    </tbody>
</table>
