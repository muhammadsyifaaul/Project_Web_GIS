<?php
session_start();
require_once '../helper/connection.php';

$id_penyakit = $_POST['id_penyakit'];
$nama_penyakit = $_POST['nama_penyakit'];

$query = mysqli_query($connection, "insert into penyakit(id_penyakit, nama_penyakit) value('$id_penyakit', '$nama_penyakit')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
