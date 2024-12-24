<!-- resources/views/location.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Lokasi</title>
</head>
<body>
    <h1>Informasi Lokasi</h1>
    <!-- Menampilkan lokasi -->
    <p><strong>Lokasi Anda:</strong> {{ $location }}</p>
    
    <!-- Menampilkan jarak -->
    <p><strong>Jarak ke Tujuan:</strong> {{ number_format($distance, 2) }} km</p>
</body>
</html>
