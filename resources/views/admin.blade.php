<!doctype html>
<html lang="en">
<!-- Test merge -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar">
        <div class="logo">
            <img src='/images/logo.png' alt="Logo">
        </div>
        <div class="menu">
            <a href="#">Beranda</a>
            <a href="#">Info Penting</a>
            <a href="#">Infografis</a>
            <a href="#">Wisata</a>
            <a href="#">Kontak</a>
        </div>
        <div class="hero">
            <h1>Daftar Informasi Kelurahan Di Kota Semarang</h1>
        </div>
    </nav>
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        
        <!-- Kartu Statistik -->
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                <i class="fas fa-seedling"></i> <!-- Ikon Tanaman -->
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Lokasi</h4>
                </div>
                <div class="card-body">
                    <!-- <?= $penyakit ?> -->
                </div>
                </div>
            </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                <i class="fas fa-diagnoses"></i> <!-- Ikon Gejala -->
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total No Telepon</h4>
                </div>
                <div class="card-body">
                    <?= $gejala ?>
                </div>
                </div>
            </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-info">
                <i class="fas fa-prescription-bottle-alt"></i> <!-- Ikon Obat -->
                </div>
                <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Foto</h4>
                </div>
                <div class="card-body">
                    <?= $obat ?>
                </div>
                </div>
            </div>
            </div>
        </div>
        
        <!-- Tabel Ringkasan -->
        <div class="row mt-4">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h4>Ringkasan Data</h4>
                </div>
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Total Lokasi</td>
                        <td><?= $penyakit ?></td>
                    </tr>
                    <tr>
                        <td>Total No Telepon</td>
                        <td><?= $gejala ?></td>
                    </tr>
                    <tr>
                        <td>Total Gambar</td>
                        <td><?= $obat ?></td>
                    </tr>
                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </section>

    <div class="container mt-5">
        <div class="row custom-table mt-5 rounded-3">
            <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-12 custom-container">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center gap-2">
                                <label for="entries" class="form-label mb-0">Show</label>
                                <select name="entries" id="entries" class="form-select form-select-sm"
                                    style="width: auto;">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span>entries</span>
                            </div>
                            <div class="d-flex align-items-center gap-2 search-input">
                                <label for="search" class="form-label mb-0">Search:</label>
                                <input type="search" id="search" class="form-control" placeholder="Cari Data...">
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
                        <tr class="border-rad bg-primary !important mb-3">
                            <td scope="row">1</td>
                            <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt, fuga?</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td><img src="image1.jpg" alt="Image 1" class="img-fluid"></td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>Jamal</td>
                            <td>tdornton</td>
                            <td>@fat</td>
                            <td><img src="image2.jpg" alt="Image 2" class="img-fluid"></td>
                        </tr>
                        <tr>
                            <td scope="row">3</td>
                            <td>Larry the Bird</td>
                            <td>@twitter</td>
                            <td>tdornton</td>
                            <td><img src="image3.jpg" alt="Image 3" class="img-fluid"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>