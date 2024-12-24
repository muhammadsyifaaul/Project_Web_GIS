<?php
require_once '../layout/_top.php';
require_once '../layout/_sidenav.php';
// require_once '../helper/connection.php';

// $penyakit = mysqli_query($connection, "SELECT COUNT(*) FROM penyakit");
// $gejala = mysqli_query($connection, "SELECT COUNT(*) FROM gejala");
// $obat = mysqli_query($connection, "SELECT COUNT(*) FROM obat");

// $penyakit = mysqli_fetch_array($penyakit)[0];
// $gejala = mysqli_fetch_array($gejala)[0];
// $obat = mysqli_fetch_array($obat)[0];

// <?= $penyakit ?
// <?= $obat ?> 
<!-- //             $obat$penyakit$gejala  -->
<!-- $gejala ?> -->
?>

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
            <!--  -->
             Kelurahan
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
            <!-- -->
            No Telepon
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
            <!--  -->
            Foto
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
                <td>Total Kecamatan</td>
                <!-- <td></td> -->
                <td>Kecamatan</td>
              </tr>
              <tr>
                <td>Total Kelurahan</td>
                <!-- <td></td> -->
                <td>Kelurahan</td>
              </tr>
              <tr>
                <td>Total Gambar</td>
                <!-- <td></td> -->
                <td>Foto</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>