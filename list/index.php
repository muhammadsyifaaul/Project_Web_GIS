<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM penyakit");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>List</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th style="width: 400px">Nama Lokasi | Alamat</th>
                  <th>Telepon</th>
                  <th>Link Map</th>
                  <th>Gambar</th>
                  <th style="width: 150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) :
                ?>
                  <tr>
                    <td><?= $data['id_penyakit'] ?></td>
                    <td><?= $data['nama_penyakit'] ?></td>
                    <td><?= $data['lat'] ?></td>
                    <td><?= $data['long'] ?></td>
                    <td><?= $data['gambar'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?id_penyakit=<?= $data['id_penyakit'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?id_penyakit=<?= $data['id_penyakit'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                    </td>
                  </tr>
                <?php
                endwhile;
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</section>