<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id_penyakit = $_GET['id_penyakit'];
$query = mysqli_query($connection, "SELECT * FROM penyakit WHERE id_penyakit='$id_penyakit'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Penyakit</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="id_penyakit" value="<?= $row['id_penyakit'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID</td>
                  <td><input class="form-control" type="text" name="id_penyakit" size="20" required value="<?= $row['id_penyakit'] ?>"></td>
                </tr>
                <tr>
                  <td>Nama Penyakit</td>
                  <td><input class="form-control" type="text" name="nama_penyakit" size="20" required value="<?= $row['nama_penyakit'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>