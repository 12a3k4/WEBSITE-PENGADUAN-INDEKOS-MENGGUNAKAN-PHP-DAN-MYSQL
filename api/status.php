<?php

  // Memanggil file koneksi.php untuk melakukan koneksi database
  include 'koneksi.php';

	// Membuat variabel untuk menampung data dari Formulir Tambah Pengaduan
  $id            = $_POST['id'];
  $tgl           = $_POST['tgl'];
  $pengaduan     = $_POST['pengaduan'];
  $stat          = $_POST['stat'];
  $keterangan = $_POST['keterangan'];

  // Menambahkan Pengaduan ke Database pada tabel LAPORAN
  $query  = "UPDATE laporan SET tgl = '$tgl', pengaduan = '$pengaduan', stat = '$stat', keterangan = '$keterangan' ";

  $query .= "WHERE id = '$id'";
  $result = mysqli_query($koneksi, $query);

  if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi));
  } else {
    // Tampil alert dan akan redirect ke halaman index.php
    echo "<script>window.location='admin.php';</script>";
  }

?>