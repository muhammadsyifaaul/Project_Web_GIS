<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
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
        .custom-table tr {
            margin-top: 1rem;
        }
        .custom-table {
            margin-bottom: 30px; /* Jarak bagian bawah tabel */
            margin-top: 1rem;
            margin-left: 0.3rem;
            border-spacing: 0; /* Menghilangkan spasi antar kolom */
        }
        .custom-container {
            width: 100%; /* Lebar penuh untuk container */
        }
        .header-title {
            margin-bottom: 20px;
            color: #4a4a4a;
        }
        .container-fluid {
            padding: 0 15px; /* Menghilangkan jarak kiri dan kanan */
            min-height: 100vh;
        }
        .td-link a {
            text-decoration: none;
            padding: 0.5rem 1rem;
            background-color: aqua;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
        }
        .distance {
            font-size: 0.9rem;
            color: #555;
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
                                <tr class="border-rad !important mb-3" style="margin-top: 1rem;">
                                    <td scope="row">{{ $locations->firstItem() + $loop->index }}</td>
                                    <td><b>{{ $location->name }}</b> | {{ $location->address }}</td>
                                    <td>-</td>
                                    <td class="td-link">
                                        <a class="map-link" data-latitude="{{ $location->latitude }}" data-longitude="{{ $location->longitude }}" href="{{ route('location.getRoute', [
                                            'destination_latitude' => $location->latitude, 
                                            'destination_longitude' => $location->longitude
                                        ]) }}" target="_blank">Link Map</a>
                                        <div class="distance" id="distance-{{ $loop->index }}"></div>
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
                    </div>
                </div>

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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    const userLatitude = position.coords.latitude;
                    const userLongitude = position.coords.longitude;

                    document.querySelectorAll('.map-link').forEach((link, index) => {
                        const destinationLatitude = link.getAttribute('data-latitude');
                        const destinationLongitude = link.getAttribute('data-longitude');
                        const distanceElement = document.getElementById(`distance-${index}`);

                        // Calculate distance
                        const distance = calculateDistance(userLatitude, userLongitude, destinationLatitude, destinationLongitude);
                        distanceElement.textContent = `Jarak: ${distance} km`;

                        // Update map link
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

        function calculateDistance(lat1, lon1, lat2, lon2) {
            const R = 6371; // Radius of the Earth in km
            const dLat = (lat2 - lat1) * (Math.PI / 180);
            const dLon = (lon2 - lon1) * (Math.PI / 180);
            const a = 
                Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
                Math.sin(dLon / 2) * Math.sin(dLon / 2);
            const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
            const distance = R * c; // Distance in km
            return distance.toFixed(2);
        }
    </script>
</body>
</html>
