<?php
session_start();
require_once '../helper/connection.php';

$id_penyakit = $_POST['id_penyakit'];
$nama_penyakit = $_POST['nama_penyakit'];

$query = mysqli_query($connection, "UPDATE penyakit SET nama_penyakit = '$nama_penyakit' WHERE id_penyakit = '$id_penyakit'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
