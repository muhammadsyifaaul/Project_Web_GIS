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
</head>
<!-- test -->
<body>
    <div class="container mt-5">
        <div class="row custom-table mt-5 rounded-3">
            <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-12 custom-container">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="d-flex align-items-center gap-2">
                                <label for="entries" class="form-label mb-0">Show</label>
                                <select name="entries" id="entries" class="form-select form-select-sm" style="width: auto;">
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
                            <td>Jacob</td>
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