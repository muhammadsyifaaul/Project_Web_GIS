<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .custom-table th, .custom-table td {
            text-align: center; /* Rata tengah untuk semua elemen tabel */
            vertical-align: middle; /* Rata tengah untuk vertikal */
        }
        .custom-table img {
            width: 80px; /* Ukuran gambar lebih kecil */
            height: auto;
        }
        .custom-table {
            margin-bottom: 30px; /* Jarak bagian bawah tabel */
            margin-left: 0.3rem;
        }
       
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src='/images/logosmg.png' alt="Logo">
        </div>
        <div class="menu">
            <a href="#">Beranda</a>
            <a href="#">Info Penting</a>
            <a href="#">Infografis</a>
            <a href="#">Wisata</a>
            <a href="#">Kontak</a>
        </div>
        <div class="container-fluid hero">
            <h1>Daftar Informasi Kelurahan Di Kota Semarang</h1>
        </div>
    </nav>

    <div class="container-fluid mt-5">
        <div class="row custom-table mt-5 rounded-3">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-4 mt-4">
                            <div class="d-flex align-items-center gap-2 nav-top">
                                <form method="GET" action="{{ route('dashboard') }}">
                                    <label for="entries" class="form-label mb-0">Show</label>
                                    <select name="entries" id="entries" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                                        <option value="10" {{ $entries == 10 ? 'selected' : '' }}>10</option>
                                        <option value="25" {{ $entries == 25 ? 'selected' : '' }}>25</option>
                                        <option value="50" {{ $entries == 50 ? 'selected' : '' }}>50</option>
                                        <option value="100" {{ $entries == 100 ? 'selected' : '' }}>100</option>
                                    </select>
                                    <span>entries</span>
                                </form>
                            </div>
                            <div class="d-flex align-items-center gap-2 search-input">
                                <form method="GET" action="{{ route('dashboard') }}">
                                    <label for="search" class="form-label mb-0">Search:</label>
                                    <input type="search" id="search" name="search" class="form-control" placeholder="Cari Data..." value="{{ $search }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table custom-table table-borderless">
                    <thead style="border: none;">
                        <tr>
                            <th scope="col" style="width: 5%;">NO</th>
                            <th scope="col" style="width: 40%;">NAMA LOKASI | ALAMAT</th>
                            <th scope="col" style="width: 15%;">TELEPON</th>
                            <th scope="col" style="width: 20%;">LINK MAP</th>
                            <th scope="col" style="width: 20%;">FOTO</th>
                        </tr>
                    </thead>
                    <tbody class="custom-table p-5">
                        @foreach($locations as $location)
                        <tr class="border-rad bg-primary !important mb-3">
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td><b>{{ $location->name }}</b> | {{ $location->address }}</td>
                            <td>-</td>
                            <td>
                                <a class="map-link" href="{{ route('location.getRoute', [
                                    'destination_latitude' => $location->latitude, 
                                    'destination_longitude' => $location->longitude
                                ]) }}" target="_blank">Link Map</a>
                            </td>
                            <td>
                                @if ($location->photo)
                                    <img src="{{ asset('storage/' . $location->photo) }}" alt="{{ $location->name }}" class="img-fluid">
                                @else
                                    No Photo
                                @endif
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
                        {{ $locations->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const userLatitude = position.coords.latitude;
                    const userLongitude = position.coords.longitude;

                    document.querySelectorAll('.map-link').forEach(link => {
                        const url = new URL(link.href);
                        url.searchParams.set('user_latitude', userLatitude);
                        url.searchParams.set('user_longitude', userLongitude);
                        link.href = url.href;
                    });
                });
            } else {
                console.warn("Geolocation is not supported by this browser.");
            }
        });
    </script>
</body>
</html>
