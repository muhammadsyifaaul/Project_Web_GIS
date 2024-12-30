<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .custom-table th, .custom-table td {
            text-align: center; 
            vertical-align: middle; 
        }
        .custom-table img {
            width: 80px; 
            height: auto;
        }
        .custom-table {
            margin-bottom: 30px; 
            border-spacing: 0; 
            border-radius: 10px;
            padding: 0.5rem;
        }
        .custom-container {
            width: 100%; 
        }
        .btn {
            margin-right: 5px;
        }
        .header-title {
            margin-bottom: 20px;
            color: #4a4a4a;
        }
        .container-fluid {
            padding: 0 15px; /* Menghilangkan jarak kiri dan kanan */
        }
        /* Menambahkan border-radius hanya untuk kolom action */
        .custom-table tbody tr:first-child td:last-child,
        .custom-table tbody tr:last-child td:last-child {
            border-top-right-radius: 15px; /* Border-radius untuk ujung kanan atas */
            border-bottom-right-radius: 15px; /* Border-radius untuk ujung kanan bawah */
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar-brand {
            font-weight: bold;
            color: #4a4a4a;
        }
        .navbar-nav .nav-link {
            color: #4a4a4a;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        /* Pagination styling */
        .pagination {
            justify-content: center; /* Center the pagination */
            margin-top: 20px; /* Add space above the pagination */
        }
        .pagination .page-item.active .page-link {
            background-color: #4a4a4a;
            border-color: #4a4a4a;
            color: #fff;
        }
        .pagination .page-link {
            color: #4a4a4a;
        }
        .pagination .page-link:hover {
            background-color: #f0f0f0;
            color: #4a4a4a;
        }
        /* Responsiveness */
        @media (max-width: 576px) {
            .pagination {
                flex-wrap: wrap;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('locations.create') }}">Create Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center custom-table mt-5">
            <div class="col-12">
                <h2 class="header-title">Daftar Lokasi</h2>
                <table class="table custom-table table-hover mt-4">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 35%;">Address</th>
                            <th style="width: 10%;">Photo</th>
                            <th style="width: 8%;">Latitude</th>
                            <th style="width: 8%;">Longitude</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $locations->firstItem() + $loop->index }}</td>
                                <td><b>{{ $location->name }}</b></td>
                                <td>{{ $location->address }}</td>
                                <td>
                                    @if ($location->photo)
                                        <img src="{{ asset('storage/' . $location->photo) }}" alt="{{ $location->name }}">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>{{ $location->latitude }}</td>
                                <td>{{ $location->longitude }}</td>
                                <td class="rounded-end">
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

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div>
                        Showing {{ $locations->firstItem() }} to {{ $locations->lastItem() }} of {{ $locations->total() }} entries
                    </div>
                    <div>
                        {{ $locations->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></script>
</body>

</html>
